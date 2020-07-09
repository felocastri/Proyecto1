<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Iniciar Sesion</title>
</head>
<body>
   <div class="contenedor">
   
    <h1>Iniciar Sesion</h1>
    
    <hr class="border"> 

    <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" name="login" class="formulario" method="POST">

        <div class="form-group">

            <input type="text" name="correo" class="usuario" placeholder="Correo" id="">

        </div>
       
        <div class="form-group">

            <input type="password" name="password" class="password_btn" placeholder="Contraseña" id="">
            <i class="submit-btn fa fa_arrow-right" onclick="login.submit()">send</i>
        </div>
        
        <!-- Se ingresa código PHP para validar errores en los campos de registro -->
            <?php if (!empty($errores)): ?>

        <div class="error">

             <ul>
                 <?php echo $errores; ?>
            </ul>


        </div>
                <?php endif;       ?>

    </form>

    <p class="texto-registrate">

        ¿No tienes cuenta?
        <a href="registrate.php">Registrate</a>
    </p>

</body>
</html>