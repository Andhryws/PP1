<?php
session_start();
//print_r($_REQUEST);
if(isset($_POST['submit']) && !empty($_POST['email'] && !empty($_POST['senha'])))
{
   //Acessa o sistema
   include_once('../backend/config.php');
   $email = $_POST['email'];
   $senha = $_POST['senha'];

   //print_r('Email: ' . $email);
   //print_r('<br>');
   //print_r('Senha: ' . $senha);

   $sql = "SELECT * FROM user WHERE email = '$email' and senha = '$senha'";
   $result = $conexao->query($sql);

   //print_r($result);

   if(mysqli_num_rows($result) < 1){
     unset($_SESSION['email']);
     unset($_SESSION['senha']);
     header('Location: ../frontend/index.html');
   }
   else{
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
     header('Location: ../frontend/sistema.php');
   }
}
else
{
   //não acessa
    header('Location: ../frontend/index.html');
}
?>