<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Banco de Pesquisa</title>
</head>

<body>

    <?php
    if (session_status() !== PHP_SESSION_ACTIVE) { //Verificar se a sessão está aberta
        session_start();
    }

    if (isset($_SESSION['email']) == true) {
    } else {
        session_unset();
        session_destroy();
        echo "<script language='javascript' type='text/javascript'> 
            alert('Você não tem acesso!');window.location.href='Login.php';</script>"; // Recusa o acesso caso tentem acessar sem login
    }
    if (isset($_POST['busca'])) { 
        $pesquisa = $_POST['busca']; // Variável para pesquisar no banco
    } else {
        $pesquisa = '';
    }

    include "conectar.php"; // Inclusão do arquivo de conexão

    $sql = "SELECT id,nome,email,tipo,avatar FROM usuarios WHERE nome LIKE '%" . $pesquisa . "%'"; // Usando a variável com o MYSQL

    $dados = mysqli_query($conn, $sql);

    ?>

    <div class="container">

        <h1>Banco de Pesquisa</h1>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex" action="crud.php" method="POST"> <!-- Formulário para pesquisa -->
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" name="busca">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
        <table class="table table-hover">

            <thead>
                <tr> <!-- Campos da tabela -->
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($linha = mysqli_fetch_assoc($dados)) { // Preenchimento da tabela
                    echo "<tr>";
                    echo "<td>";
                    echo $linha['id'];
                    echo "</td>";
                    echo "<td>";
                    echo $linha['nome'];
                    echo "</td>";
                    echo "<td>";
                    echo $linha['email'];
                    echo "</td>";
                    echo "<td>";
                    echo $linha['tipo'];
                    echo "</td>";
                    echo "<td>";
                    echo "<img src='./avatares/" . $linha['avatar'] . "' style='max-height:16px'>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-info' href='excluirCadastro.php?id=" . $linha['id'] . "'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-info btn-lg" href="cadastro.php" role="button">Cadastrar novo usuário</a>
        <a class="btn btn-info btn-lg" href="logoff.php" role="button">Log-off</a> <!-- Botão para deslogar -->
    </div>

</body>

</html>