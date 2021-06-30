<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTH Encuesta</title>
    <link rel="stylesheet" href=".\css\quizz.css">
    <link rel="stylesheet" href=".\css\menu.css">
    <link rel="stylesheet" href=".\bootstrap\css\bootstrap.min.css">
    <link rel="icon" type="image/jpg" href=".\imgen\Logo_CTH_2021_PNG.png">
</head>

<body background=".\imgen\Hoja_CTH_PLANTILLA_P.jpg">

<form action="<?php echo constant('URL'); ?>/encuesta" method="POST">
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
    <h2>Examenes pendientes</h2>
    <h3>Instrucciones: </h3> 
        <p>Total de numero de preguntas: <span class="total-question"></span></p>
        <p>Numero de intentos: 0/3<span class="total-question"></span></p>
        <button type="button" class="btn">Empezar examen</button>
    </div>
    <div class="quiz-box custom-box">
 <h3> Calificaciones</h3>
               

                <div>
                <div id="contdeTablaCalif">
                <table class="table table-hover ">
                <thead >
                    <tr>
                    <th scope="col">Folio</th>
                    <th scope="col">Nombre Examen</th>
                    <th scope="col">Fecha</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Examen</td>
                    <td>22/02/21</td>
                    <td><a href="#" id="navbarDropdownMenuLink">
                                INFO+
                            </a>
                    
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Examen</td>
                    <td>23/02/21</td>
                    <td><a href="#" id="navbarDropdownMenuLink">
                                INFO+
                            </a>
                    
                    </td>
                    </tr>
                    
                </tbody>
                </table>

                </div>
                <div id="DesplegadorDeInfo">
                 <table class="table">
                
            <thead class="thead-dark">
            <h4>Desempeño en cada area  del examen</h4>
            <tr>
            <th scope="col">Area 1</th>
            <th scope="col">Area 2</th>
            <th scope="col">Area 3</th>
            <th scope="col">Area 4</th>
            <th scope="col">Area 5</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">0</th>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                </tr>
                
            </tbody>
            </table>

                </div>
                </div>
    </div>
     <script src="./bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"> </script>
    </div>
    </form>
    
</body>
</html>