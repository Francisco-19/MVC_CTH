<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R_EGISTRO</title>
</head>
<body>
     <?PHP $this->showMessages();?>

    <form action="<?php echo constant('URL'); ?>signup/nuevoUsuario" method="POST">
        <div></div>
       
            <h2>Registrarse</h2>
            
            <p>
                <label for="nombre">nombre</label>
                <input type="text" name="nombre" id="nombre">
            </p>
            <p>
                <label for="correo">correo</label>
                <input type="text" name="correo" id="correo">
            </p>
            <p>
                <label for="contraseña">contraseña</label>
                <input type="text" name="contraseña" id="contraseña">
            </p>
            <p>
                <input type="submit" value="Iniciar sesión" />
            </p>
            <p>
                ¿Tienes una cuenta? <a href="<?php echo constant('URL'); ?>/signup">Iniciar sesion</a>
            </p>
        </form>
</body>
</html>