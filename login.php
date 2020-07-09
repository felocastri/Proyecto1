<?php session_start();


if(isset($_SESSION['correo'])){

    header('location:index.php');
}

/* Validando ingreso de datos */

$errores='';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $correo=filter_var(strtolower($_POST['correo']),FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    /* conectandonos a la base de datos */


    try {
        $conexion = new PDO('mysql:host=localhost;dbname=reto_evertec', 'root', '' );
        
    } catch (PDOExcepiton $e) {
        echo "Error: " . $e->getmessage();

        }


        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :correo AND pass = :password');

        $statement->execute(array(
            ':correo' => $correo,
            ':password' => $password

        ));

        $resultado = $statement->fetch();

        if($resultado !== false){

           $_SESSION['correo']=$correo;
           header('location: index.php');
         
          
        } else {

            $errores .= '<li> Olvidaste tu contraseña?</li>';


        }
        
    
  
}

require 'views/login.view.php';


?>