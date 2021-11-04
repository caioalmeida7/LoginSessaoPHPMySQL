<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Cadastro</title>
</head>

<body>
    <?php
    include "conectar.php"; // Inclusão do arquivo de conexão

    $nome = $_POST['nome']; //Variáveis que pegam os dados através do $_POST
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];

    if ($_FILES) { // Para salvar e mudar o nome do arquivo de avatar.
        if ($_FILES['avatar']) {
            $dir = './avatares/';
            $temp = $_FILES['avatar']['tmp_name'];
            $fileName = $_FILES['avatar']['name'];
            $separa = explode(".", $fileName);
            $separa = array_reverse($separa);
            $fileType = $separa[0];
            $avatar = $email . "." . $fileType;
            move_uploaded_file($temp, $dir . $avatar);
        }
    }

    $sql_insert = " INSERT INTO usuarios (nome,email,senha,tipo,avatar)
    VALUES('$nome','$email','$senha','$tipo','$avatar')"; // Inserta os dados dentro do MYSQL

    if (mysqli_query($conn, $sql_insert)) { // Caso o usuário seja cadastrado, alert para confirmar.
        echo "<script language='javascript' type='text/javascript'>
                        alert('Cadastrado com sucesso.');window.location
                        .href='crud.php';</script>";
    } else { // Caso contrário, mostra mensagem de erro.
        echo "<script language='javascript' type='text/javascript'>
                        alert('Usuário não cadastrado.');window.location
                        .href='crud.php';</script>";
    }
    ?>

    <a href="cadastro.html" class="btn btn-success">Voltar</a>

</body>

</html>