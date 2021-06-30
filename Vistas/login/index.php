<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CTH</title>
    <link rel="stylesheet" href=".\css\styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="icon" type="image/jpg" href=".\imgen\Logo_CTH_2021_PNG.png">
</head>
<body background="./imgen/TESTLOG.png">


    <form action="<?php echo constant('URL'); ?>login/atuentificarse" class="form-box animated fadeInUp" class="col-12" th:action="@{/login}" method="POST">
        <div></div>
       
        <?PHP $this->showMessages();?>
        
        <h1 class="form-title">Inicio sesion</h1>
            
                <input type="text" placeholder="Ingresa correo" autofocus name="correo" id="correo">

                <input type="password" placeholder="Ingresa tu contraseña" name="contraseña" id="contraseña">
        
                <button type="submit" value="Iniciar sesión">  Enviar
        </button>

            <p>
            ¿No tines cuenta? <a href="<?php echo constant('URL'); ?>signup">Registrate</a>
            </p>
        </form>
</body>
</html>