<?php

include 'conectar.php';

// Recebendo dado via GET do link LISTAR.PHP

$id = $_GET['id'];

// Exclusão de arquivo primeiro

$dir = "avatares/"; // Cria uma variável com o caminho das imagens

$sql = "SELECT avatar FROM usuarios WHERE id = '$id'"; // Query de pesquisar avatar

$result = $conn->query($sql); // Executa a query

$avatar = mysqli_fetch_row($result); // Retorna o registro pesquisado

//echo $dir.$avatar[0]; // Retorna o valor desejado (avatar)

$arq = unlink($dir . $avatar[0]); // Executa a exclusão do arquivo

if($arq) { //$arq == true
    echo "Arquivo de avatar excluído com sucesso <br/>";
} else { //$arq == false
    echo "Arquivo de avatar não pôde ser excluído ou não existe!";
}


//Depois excluir o registro do banco

$sql = "DELETE FROM usuarios WHERE id = '$id'";

//Executa a query de exclusão e testa se deu certo
if (mysqli_query($conn, $sql)) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Usuário excluído com sucesso!');window.location.href='logoff.php';</script>";
    //Redireciona para paginaComum novamente
    //header("Location: paginaComum.php"); <-- HEADER PODE NÃO DAR CERTO AS VEZES
    exit();
}   else { 
    echo "Error: " . $sql . "" . mysqli_error($conn);
}

