<?php
if (!isset($_SESSION)) {
    session_start(); // Abre a sessão
}

include 'conectar.php';
$email = "$_POST[email]"; // Salva as credenciais colocadas no formulário de login
$senha = "$_POST[senha]";

$sql = "SELECT tipo FROM usuarios WHERE email LIKE '%$email%'"; // Busca o e-mail no banco
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
    while ($linha = mysqli_fetch_array($resultado)) {
        $tipo = $linha['tipo'];
    }
}


$tds = "SELECT * FROM usuarios WHERE email = '$email' and senha ='$senha'";

$testar = $conn->query($tds);

$cont = mysqli_num_rows($testar);

if ($cont == 1) {
    if (session_status() !== PHP_SESSION_ACTIVE) { //Verificar se a sessão está aberta
        session_start();
    }
    //Variáveis de sessão
    $_SESSION['email'] = $email;

    if ($tipo == "0") { //SE O TIPO DE USUÁRIO FOR 0 (ADMIN), É REDIRECIONADO AO CRUD
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='crud.php';</script>";
    } elseif ($tipo == "1") { // SE O TIPO DE USUÁRIO FOR 1 (COMUM), É REDIRECIONADO À PÁGINA COMUM
        echo "<script language='javascript' type='text/javascript'>
        window.location.href='paginaComum.php';</script>";
    }
} else {
    // Em caso de erro no login

    //Limpar sessões
    if (session_status() !== PHP_SESSION_ACTIVE) { //Verificar se a sessão está aberta
        session_start();
    }
    session_unset($_SESSION['email']);
    session_destroy(); // Destrói a sessão

    echo "<script language='javascript' type='text/javascript'>
                        alert('E-mail ou senha incorretos!');window.location.href='Login.php';</script>";
}



$conn->close();