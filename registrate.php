<?php session_start();


if(isset($_SESSION['correo'])){

    header('location:index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

$correo =filter_var(strtolower( $_POST['correo']), FILTER_SANITIZE_STRING);
$password = $_POST['password'];
$password2 = $_POST['password2'];

/* Eco para imprimir validaciones */
echo   "$correo . $password . $password2";

$errores = '';


/* condicion para validar campos vacios */
if (empty($correo) or empty($password) or empty($password2)) {
    $errores .= '<li> por favor ingresa información</li>';
}

else {
    
/* Codigo para conectar a BD */

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=reto_evertec', 'root', '' );
        
    } catch (PDOExcepiton $e) {
        echo "Error: " . $e->getmessage();
    }

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE correo = :correo LIMIT 1');
    $statement->execute(array(':correo' => $correo));
    $resultado = $statement->fetch();


    /* condicion para validar registros repetidos */
    if ($resultado != false) {

        $errores .= '<li> El nombre de usuario ya existe</li>';      
    }
    
    /* codigo para validar contraseñas */

    if($password2 != $password){

        $errores .= '<li> Verifica contraseña</li>';


    }
}

/* Si no hay errores pasar a BD */

if ($errores =='') {
    $statement = $conexion->prepare('INSERT INTO usuarios (id, correo, pass) VALUES (null, :correo, :pass)');
    $statement->execute(array(
        
        ':correo'=>$correo,
        ':pass'=>$password
        
    ));

    header('location: login.php');
}



}


require 'views/registrate.view.php';



?>