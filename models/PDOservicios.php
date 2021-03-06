<?php
require_once 'models/generarExame.php';
//distintas consultas pra el funcionamiento
class PDOservicios extends Model{

    function __construct(){
        parent::__construct();
    }
    //generar listado de alumnos
    public function generarLista(){
        $listadoDeAlumnos =[];
        try{
           $sql = $this->query("SELECT * FROM usuarios E LEFT JOIN examen U ON E.idusuario=U.idusuario WHERE rol='user'");  
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
       
       private $listaDeFolioActivo=[];
       //generar listado de modulos existentes en la base de datos
       public function modulos(){
       $listadoDeModulos=[];
        try{
            $sqlModulo= $this->query("SELECT idModulo  FROM `modulos`");
            while($p=$sqlModulo->fetch(PDO::FETCH_ASSOC)){
                $listMod= new listadoDeAlumnos();
                $listMod->setidModulo($p['idModulo']);

                array_push($listadoDeModulos,$listMod);
            }
            
            return $listadoDeModulos;
        }catch(PDOException $e){
            error_log('modulos::generarLista->PDOException'.$e);
        }
    }
    //generar las las preguntas aleatorias
    public function PreguntaAleatoria($Nmodulos){
        try{
             $listPAleat=[];
             $nPregunta=10;
            foreach($Nmodulos as $valor){
                for($i=1; $i<=10; $i++){
                $sqlPgnAl=$this->query("SELECT idpregunta FROM preguntas_de_examen_alum WHERE idModulo=$valor ORDER BY rand()");
                while($p= $sqlPgnAl->fetch(PDO::FETCH_ASSOC)){
                $preguntaA=new listadoDeAlumnos();
                $preguntaA->setidpregunta($p['idpregunta']);
                
                array_push($listPAleat,$preguntaA); //var_dump($listPAleat); 
                }
                }
                return $listPAleat;       
            }

        }catch(PDOException $e){
            error_log('modulos::generarLista->PDOException'.$e);

        }
    }
    //verificar tanto la tabla usuarios y la tabla examen la relacion que hay y si aparece un campo nulo o no
    public function verificacarFlolioExist(){                    
        try{
           $sql = $this->prepare("SELECT * FROM usuarios E LEFT JOIN examen U ON E.idusuario=U.idusuario WHERE rol='user'");  
          
           $sql->execute();
           $sql->setFetchMode(PDO::FETCH_CLASS,'listadoDeAlumnos');
           return $sql->fetchAll();
        }catch(PDOException $e){
           error_log('listadoDeAlumnos::verificacarFlolioExist->PDOException'.$e);
        }

    }
    //genera los folios para los examenes de los alumnos
    public function GenerarFolio($idusuruios,$status){
        try{
                $query = $this->prepare("INSERT INTO `examen`(`idusuario`, `status`) 
            VALUES ($idusuruios,'$status')");
            $query->execute();
                return true;
        }catch(PDOException $e){
            error_log('modulos::GenerarFolioDeExamenTodos->PDOException'.$e);
//             var_dump($query);
            return false;
        }
    }
    //busca el id por medio del correo para poder genera el folio
    function buscarPorUsuarioCorreosVarios($correo){                    
        try{
            $coreosDetectados=[];
            foreach($correo as $val):
            $sqlX=$this->query("SELECT * FROM usuarios WHERE userCorreo='$val'");
            while($p=$sqlX->fetch(PDO::FETCH_ASSOC)){
                $listCorreo=new listadoDeAlumnos();
                $listCorreo->setid($p['idusuario']);     
                array_push($coreosDetectados,$listCorreo);
            }
            endforeach;
           return $coreosDetectados;
        }catch(PDOException $e){
            error_log('modulos::buscarPorUsuarioCorreo->PDOException'.$e);
        }
    }
    //genera un listado de los folios que estan activo para verificacion
    public function listadoDeFolioActivo(){
        try{
            $sql=$this->query("SELECT Folio FROM examen WHERE status='activo'");
            $sql->setFetchMode(PDO::FETCH_CLASS,'listadoDeAlumnos');
           return $sql->fetchAll();
        }catch(PDOException $e){
            error_log('modulos::GenerarFolioDeExamen->PDOException'.$e);
            return false;
        }
    }
    //genera la hojas de respuestas para el alumno
    public function generarHojaDeRespuestasAlum($folio, $preguntaAletoriaH){
        try{
            $sqlx=$this->prepare("INSERT INTO respuestas_del_alumno( Folio, idpregunta, respuesta)
             VALUES ($folio,$preguntaAletoriaH,null)");
             $sqlx->execute();
            return true;
            
        }catch(PDOException $e){
            error_log('modulos::generarHojaDeRespuestasAlum->PDOException'.$e);
            return false;
        }

    }
}
?>