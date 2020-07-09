<?php session_start();


if(isset($_SESSION['correo'])){

require 'views/contenido.view.php';
} else{

    header('location: login.php');

}

    


?>