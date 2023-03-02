<?php
session_start();
if (isset($_SESSION['usuario'])) {
    //se envia al index para que una vez que el usuario inicia 
    //no vuelva a los formularios
    header('Location: index.php ');
}
//si los metodos de envio el igual a post entonces los datos si se enviaron
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $usuario=strtolower($_POST['usuario']); //strtolower convierte un string a miniscula
    $password=$_POST['password'];
    $password2=$_POST['password2'];

    $errores='';
    //comprobamos que ningun campo este vacio
    if (empty($usuario) || empty($password) || empty($password2)) {
        $errores.= '<li>Por favor rellena todos los campos</li>';
    }else{
        //hacemos la coneccion
        try {
            $conexion= new PDO('mysql: host=localhost; dbname=curso_login','root','');
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }

        $statement= $conexion->prepare('SELECT * FROM usuarios WHERE usuario=:usuario LIMIT 1');
        $statement->execute (array(':usuario'=> $usuario));
        $resultado= $statement->fetch();

        if ($resultado != false) {
            $errores .='<li>El usuario ya existe</li>';
        }

        //Protegemos la contraseña
        $password=hash('sha512',$password);
        $password2=hash('sha512',$password2);

        if ($password != $password2) {
           $errores.='<li>Las contraseñas no son iguales</li>';
        }
    }

    if ($errores == '') {
        $statement= $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null,:usuario,:pass)');
        $statement->execute(array(':usuario' =>$usuario, ':pass'=>$password ));

        header ('Location: login.php ');
    }
}
require "Views/register.view.php";

?>