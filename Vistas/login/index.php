<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Este es el login</h1>
    <?PHP $this->showMessages();?>

    <form action="<?php echo constant('URL'); ?>login/atuentificarse" method="POST">
        <div></div>
       
            <h2>Acceso al sitema</h2>
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
                No tienes acceso porfavor registrase para las evaluación <a href="<?php echo constant('URL'); ?>signup">Registrarse</a>
            </p>
        </form>
</body>
</html>