<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro CTH</title>
    <link rel="stylesheet" href=".\css\styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="icon" type="image/jpg" href=".\imgen\Logo_CTH_2021_PNG.png">
</head>

<body background="./imgen/Hoja_CTH_PLANTILLA_P.jpg">
     <?PHP $this->showMessages();?>

    <form action="<?php echo constant('URL'); ?>signup/nuevoUsuario" class="form-box animated fadeInUp" class="col-12" th:action="@{/login}" method="POST">
        <div></div>
       
            <h2>Registrarse</h2>
            
                <label for="nombre">Ingresa tu nombre: </label>
                <input type="text" placeholder="Ingresa tu nombre y apellido." name="nombre" id="nombre">
            
                <label for="correo">Correo: </label>
                <input type="text" placeholder="Ingresa tu correo" name="correo" id="correo">
           
                <label for="contraseña">Crea tu contraseña</label>
                <input type="text" placeholder="Ingresa tu contraseña" name="contraseña" id="contraseña">
            <p>
                <button type="submit" value="Iniciar registro"> Enviar
        </button>
            </p>
            <a href="<?php echo constant('URL'); ?>logout">Regresar al Log in</a>
        </form>

</body>
</html>