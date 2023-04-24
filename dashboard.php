<?php
session_start();
ob_start();
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Redirecionamento</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style2.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1 class=form-heading>Login feito com sucesso!</h1>
    <a class= botto-text href="sair.php">SAIR</a>
    
</body>
</html>