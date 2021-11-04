<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Página comum</title>
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
            alert('Você não tem acesso!');window.location.href='Login.php';</script>"; // Recusa o acesso se o usuário não estiver logado
    }
    if (isset($_POST['busca'])) {
        $pesquisa = $_POST['busca']; // Variável de busca
    } else {
        $pesquisa = '';
    }

    include "conectar.php";

    $email = $_SESSION['email'];
    $sql = "SELECT id,nome,email,tipo,avatar FROM usuarios WHERE email LIKE '%" . $email . "%'"; // Busca pelo e-mail

    $dados = mysqli_query($conn, $sql);

    ?>

    <div class="container">

        <h1>Bem-vindo!</h1>
        <nav class="navbar navbar-light bg-light">
        </nav>
        <table class="table table-hover">

            <thead>
                <tr>
                    <th scope="col">Seu nome</th>
                    <th scope="col">Seu avatar</th>
                    <th scope="col">Excluir conta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($linha = mysqli_fetch_assoc($dados)) { // Preenchimento da tabela
                    echo "<tr>";
                    echo "<td>";
                    echo $linha['nome'];
                    echo "</td>";
                    echo "<td>";
                    echo "<img src='./avatares/" . $linha['avatar'] . "' style='max-height:40px'>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a class='btn btn-info' href='excluirCadastroComum.php?id=" . $linha['id'] . "'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-info btn-lg" href="logoff.php" role="button">Log-off</a>
    </div>

</body>

</html>