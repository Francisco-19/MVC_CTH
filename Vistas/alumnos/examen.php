<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTH Examen</title>
    <link rel="stylesheet" href=".\css\quizz.css">
    <link rel="stylesheet" href=".\css\menu.css">
    <link rel="stylesheet" href=".\bootstrap\css\bootstrap.min.css">
    <link rel="icon" type="image/jpg" href=".\imgen\Logo_CTH_2021_PNG.png">
</head>

<body background=".\imgen\Hoja_CTH_PLANTILLA_P.jpg">

<form action="<?php echo constant('URL'); ?>/examen" method="POST">
    <header>
        <input type="checkbox" id="btn-menu">
        
        <label for="btn-menu"><img src=".\imgen\menu4.png" alt="">
            </label>
            <nav class="menu">
            <ul>
            <li><a href="<?php echo constant('URL'); ?>/alumnos">Inicio</a></li>
                <li><a href="<?php echo constant('URL'); ?>/examen">Examen</a></li>
                <li><a href="<?php echo constant('URL'); ?>/encuesta">Encuesta </a></li>

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
                                Nombre del Alumn@
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
        <h3>Bienvenid@! </h3> 
        <p>Alumn@</p>
        <p>Al centro Tecnologico de Hermosillo</p>
        <p>En esta pagina podras realizar examenes de manera facil.</p>
        <p>¡Empieza a navegar!</p>
    </div>
    </form>
    
</body>
</html>