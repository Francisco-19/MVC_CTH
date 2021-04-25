<?php 

    $listado= $this->d['a'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admi inicio</title>
</head>
<body>
    <div>
    
    <h1>Este es es el inicio de el desmadre</h1>
    <h1>Viista de los ADMINISTADORES PERRROS</h1>
    <?PHP $this->showMessages();?>
    <a href="<?php echo constant('URL'); ?>logout">logaut</a>
    <a href="<?php echo constant('URL'); ?>Estadosdelexamen/getModulos">generar Modulos</a>
    <a href="<?php echo constant('URL'); ?>Estadosdelexamen/preguntasAleatorias">Preguntas aleatorias</a>
    <a href="<?php echo constant('URL'); ?>Estadosdelexamen/generarFoliosTodos">generar el folio</a>
    <a href="<?php echo constant('URL'); ?>logout">listadoDeFolioActivo</a>
    <a href="<?php echo constant('URL'); ?>logout">generarHojaDeRespuestasAlum</a>
    <table class="table " >
                <thead class="thead-dark">
                    <tr>
                    <th scope="col"> id</th>
                    <th scope="col">nombre</th>
                    <th scope="col">correo</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
          $relistadoA =$listado;
                    
                 foreach ( $relistadoA as $regAlum):?>
                    <tr>
                        
                       
                        <td><?php echo $regAlum->getidusuario()?></td>
                        <td><?php echo $regAlum->getnombre()?></td>
                        <td><?php echo $regAlum->getUserCorreo()?></td>
                        
                    </tr>
                    
                </tbody>
                <?php endforeach;?>
             </table>
</div>
    
</body>
</html>