<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Cadastro</title>
    <script>
        function uploadFile(target) {
            document.getElementById("file-name").innerHTML = target.files[0].name;
        }
    </script>
</head>

<body>
    <?php
    if (session_status() !== PHP_SESSION_ACTIVE) { //Verificar se a sessão está aberta
        session_start();
    }

    if (isset($_SESSION['email']) == true) {
    } else {
        session_unset($_SESSION['email']);
        session_destroy(); // Recusa a conexão se o usuário não estiver logado
        echo "<script language='javascript' type='text/javascript'>
            alert('Você não tem acesso!');window.location.href='login.php';</script>";
    }
    ?>
    <div class="container">
        <div class="">
            <div class="rol jumbotron">
                <h1>Cadastro</h1>
                <form method="POST" action="salvar.php" enctype="multipart/form-data"> <!-- Formulário para cadastro -->
                    <div class="form-group">
                        <label for="nome">Nome completo:</label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Admin</label>
                        <input type="radio" name="tipo" value="0" required> <!-- Admin será TIPO 0 -->
                    </div>
                    <div class="form-group">
                        <label for="tipo">Padrão</label>
                        <input type="radio" name="tipo" value="1" required> <!-- Usuário será TIPO 1 -->
                    </div>
                    <div class="form-group"></div>
                    <label for="upload-button" class="btn btn-success"> Avatar </label>
                    <input style="display: none" type="file" name="avatar" id="upload-button" onchange="uploadFile(this)" />
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Cadastrar">
                        <a href="crud.php" class="btn btn-primary">Voltar</a>
                    </div>
                    <span id="file-name"></span><br><br>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>