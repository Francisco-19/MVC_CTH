<?php
require_once 'models/generarExame.php';
class PDOservicios extends Model{

    function __construct(){
        parent::__construct();
    }

    public function generarLista(){
        $listadoDeAlumnos =[];
        try{
           $sql = $this->query("SELECT * FROM usuarios WHERE rol='user'");  
           while($p= $sql->fetch(PDO::FETCH_ASSOC)){
               $listado=new  listadoDeAlumnos();
               $listado->setid($p['idusuario']);
               
               $listado->setnombre($p['nombre']);
               $listado->setUserCorreo($p['userCorreo']);
              
               array_push($listadoDeAlumnos,$listado);
                
           }
            
        
               return $listadoDeAlumnos;

        }catch(PDOException $e){
           error_log('listadoDeAlumnos::generarLista->PDOException'.$e);
        }
       }

}
?>