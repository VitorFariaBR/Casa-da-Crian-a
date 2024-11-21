<?php 
   
    session_start();
    $_SESSION["username"] = "";
    $_SESSION["loggedin"] = false;

    include 'conect.php';

    $usuario = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE username='$usuario' AND password= '$pass'";
    $conn = conect::conectar();
    $result = $conn->query($sql);

    if($result->rowCount() > 0){
        $_SESSION["username"] = $usuario;
        $_SESSION["loggedin"] = true;
        header("Location: painel.php"); 
    }else{
        header("Location: index.php");
    }
?>