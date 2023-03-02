<?php
session_start();
//Si hay una session lo enviamos al index
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}

$errores='';

//Comprobamos si el usuario a enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario= strtolower($_POST['usuario']);
    $password= $_POST['password'];
    $password= hash('sha512',$password);

    //Conectamos a la base de datos
    try {
        $conexion= new PDO('mysql: host=localhost; dbname=curso_login','root','');
    } catch (PDOException $e) {
        echo 'Error:' . $e->getMessage();
    }

    $stratement= $conexion->prepare('SELECT * FROM usuarios WHERE usuario=:usuario AND pass=:password');
    $stratement->execute(array(':usuario'=>$usuario, ':password'=>$password));
    $resultado= $stratement->fetch();

    if ($resultado !== false) {
       $_SESSION['usuario']=$usuario;
       header('Location: index.php');
    }else{
        $errores.='<li>Datos Incorrectos</li>';
    }
}

require "Views/login.view.php";
?>