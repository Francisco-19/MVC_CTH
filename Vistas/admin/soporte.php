<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Soporte</title>
    <link rel="stylesheet" href=".\css\contact.css">
    <link rel="stylesheet" href=".\css\menu.css">
        <link rel="stylesheet" href=".\bootstrap\css\bootstrap.min.css">
    <link rel="icon" type="image/jpg" href=".\imgen\Logo_CTH_2021_PNG.png">
    <!-- GOOGLE FONTs -->
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>

<body background=".\imgen\Hoja_CTH_PLANTILLA_P.jpg">

 <form action="<?php echo constant('URL'); ?>/soporte" method="POST">
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
    <div class="content">

        <h1 class="logo"><span>Contactanos</span></h1>

        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                <h3>Contactanos</h3>
                <form action="">
                    <p>
                        <label>Nombre completo</label>
                        <input type="text" name="fullname">
                    </p>
                    <p>
                        <label>Correo electronico</label>
                        <input type="email" name="email">
                    </p>
                    <p>
                        <label>Numero de telefono</label>
                        <input type="tel" name="phone">
                    </p>
                    <p>
                        <label>Asunto</label>
                        <input type="text" name="affair">
                    </p>
                    <p class="block">
                       <label>Mensaje</label> 
                        <textarea name="message" rows="3"></textarea>
                    </p>
                    <p class="block">
                        <button>
                            Enviar
                        </button>
                    </p>
                </form>
            </div>
            <div class="contact-info">
                <h4>Mas informacion.</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Para reportar algun error o update para el funcioamiento del programa.</li>
                    <p> </p>
                    <li><i class="fas fa-phone"></i>  (662) 386 44 60</li>
                    <li><i class="fas fa-envelope-open-text"></i> veramgro@gmail.com</li>
                </ul>
                <p>Somos un centro que promueve la Ciencia y la Tecnolog??a, y ofrecemos servicios de entrenamiento, consultor??a, cursos, asesor??a y capacitaci??n en las ??reas Tecnol??gicas, teniendo el compromiso de ofrecer una mejor atenci??n a nuestros clientes, ya que contamos con el personal id??neo para cumplir con las expectativas deseadas.</p>
                <p>Programadores emprendedores</p>
            </div>
        </div>

    </div>

    <p></p>
    <p></p>

</body>
</html>