<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTH Admin</title>
    <link rel="stylesheet" href=".\css\quizz.css">
    <link rel="stylesheet" href=".\css\menu.css">
    <link rel="stylesheet" href=".\bootstrap\css\bootstrap.min.css">
    <link rel="icon" type="image/jpg" href=".\imgen\Logo_CTH_2021_PNG.png">
</head>

<body background=".\imgen\Hoja_CTH_PLANTILLA_P.jpg">

 <form action="<?php echo constant('URL'); ?>/crearadmin" method="POST">
    <header>
        <input type="checkbox" id="btn-menu">
        
        <label for="btn-menu"><img src=".\imgen\menu4.png" alt="">
            </label>
            <nav class="menu">
            <ul>
            <li><a href="<?php echo constant('URL'); ?>/admin">Inicio</a></li>
                <li><a href="<?php echo constant('URL'); ?>/crearadmin">Crear Admin</a></li>
                <li><a href="<?php echo constant('URL'); ?>/crearpregunta">Crear Preguntas </a></li>
                <li><a href="">Resultados Examen</a></li>
                <li><a href="<?php echo constant('URL'); ?>/soporte">Soporte</a></li>

                 <div class="DatosAlumIN">
                    
                        <nav class="navbar navbar-expand-lg navbar">
                            <div class="container-fluid">
                    
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Nombre del Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Mensajes</a></li>
                                <li><a class="dropdown-item" href="<?php echo constant('URL'); ?>logout">Salir</a></li>
                            </ul>
                            </li>
                            <li>
                    <img src=".\imgen\user_13230(1).ico" alt="" width="30" height="30" class="d-inline-block align-top">
                            </li>
                        </ul>
                        </div>
                    </div>
                    </nav>
                </div>

            </ul>    
            </nav>

    </header>


    <div class="home-box custom-box">
    <h2>Informacion del Maestro</h2>
            
            <label for="nombre">Ingrese su nombre: </label>
            <input type="text" placeholder="Nombre y apellido" name="nombre" id="nombre">
        
            <label for="correo">Su correo: </label>
            <input type="text" placeholder="Correo" name="correo" id="correo">
       
            <label for="contrase??a">Cree su contrase??a</label>
            <input type="text" placeholder="Contrase??a" name="contrase??a" id="contrase??a">
        <p>
            <button type="submit" value="Iniciar registro"> Enviar
    </button>
    </div>

    <?PHP $this->showMessages();?>
    <a href="<?php echo constant('URL'); ?>estadosdelexamen">Mostrar listado</a>
    </form>
</body>
</html>
    
    