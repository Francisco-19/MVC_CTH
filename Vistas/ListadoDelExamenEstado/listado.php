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

    <table class="table " >
                <thead class="thead-dark">
                    <tr>
                    <th scope="col"><input type="checkbox" class="tableid" name="tableid" id="tableid" class="click"> Grupos <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
                     <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                    </svg></div> </th>
                    <th scope=""> Matricula<th>
                    <th scope="col">Alumnos</th>
                    <th scope="col">Folio</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($this-> $listado as $regAlum):?>
                    <tr>
                        <td><?php echo $regAlum-> getidusuario();?></td>
                        <td><?php echo $regAlum-> getidusuario();?></td>
                        <td><?php echo $regAlum-> getidusuario();?></td>

                        ;
                    </tr>
                    
                </tbody>
                <?php endforeach;?>
             </table>
</div>
    
</body>
</html>