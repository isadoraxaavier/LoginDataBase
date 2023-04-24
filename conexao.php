<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "isadora";

 try{
    // conexão sem a porta
     $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    // echo "Conexão com banco de dados realizada com sucesso!";
 }catch(PDOException $err){
    //echo "Erro: Conexão com banco de dados não realizada com sucesso. Erro gerado " . $err->getMessage();
 }

// $mysqli = new mysqli($host, $user, $pass, $dbname);
// if ($mysqli->connect_errno){
//     echo "falha ao conectar:(" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
// }else{
//     echo "Conectado ao banco de dados";
// }

 ?>