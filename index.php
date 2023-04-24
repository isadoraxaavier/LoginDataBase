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
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <script src='main.js'></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading"></h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">

    <?php
    //exemplo criptografar a senha
    //echo password_hash(123456, PASSWORD_DEFAULT);

    ?>

   <h2>Bem vindo!</h2>
   <p>O email e senha cadastrado no banco de dados são: isadora@gmail.com e 123456,
     tente colocar os dados errados para imprimir a mensagem de erro e os dados certos para ser redirecionado
     e imprimir login feito com sucesso.</p>
   </div>

<?php

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['SendLogin'])){
    //var_dump($dados);
    $query_usuario = "SELECT id, nome, usuario, senha_usuario 
            FROM usuarios 
            WHERE usuario =:usuario
            LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);

    $result_usuario->execute();

    if(($result_usuario) AND ($result_usuario->rowCount() !=0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_usuario);
        if(password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])){
            $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['nome'] = $row_usuario['nome'];
            header("Location: dashboard.php");
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";

        }
    }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
    }

}


if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>


    <form id="Login" method="POST" action="">

        <div class="form-group">
            <input type="email" name="usuario" class="form-control" id="inputEmail" placeholder="Email" value="<?php if(isset($dados
            ['usuario'])){echo $dados['usuario']; } ?>"><br></br>
        </div>

        <div class="form-group">
            <input type="password" name="senha_usuario" class="form-control" id="inputPassword" placeholder="Senha" value="<?php if(isset($dados
            ['senha_usuario'])){echo $dados['senha_usuario']; } ?>"><br></br>
        </div>

        <div class="forgot">
</div>
        <input type="submit" value="Acessar" name="SendLogin" class="btn btn-primary"></input>

    </form>
    </div>
<p class="botto-text"> &copy; Feito por Isadora Xavier</p>
</div></div></div>


</body>
</html>
