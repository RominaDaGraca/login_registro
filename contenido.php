<?php
session_start();
//Comprobamos si la session esta seteada
if (isset($_SESSION['usuario'])) {
    require 'Views/contenido.view.php';
}else{
    header('Location: login.php');
}

 ?>