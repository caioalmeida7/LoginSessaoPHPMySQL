<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css"> <!-- TODAS as classes usadas são do bootstrap -->

    <title>Login</title>
</head>

<body>
<h3>Caio Almeida</h3>
    <div class="container">
        <div class="row justify-content-center p-3">
            <div class="jumbotron d-flex "> 
                <form method="POST" action="salvarlogin.php" enctype="multipart/form-data"> <!-- Envia os dados para o salvarlogin.php -->
                <h1>Login</h1>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" required>
                    </div>
                    <div class="form-group"><br>
                        <input type="submit" class="btn btn-success btn-block" value="Fazer login" name="entrar">
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
