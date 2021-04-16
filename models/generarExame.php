<?php
require_once 'models/generarExame.php';

class listadoDeAlumnos extends Model{

    //tabla usuarios
    private $idusuario;
    private $nombre;
    private $userCorreo;
    //tabla de modulos
    private $idModulo;
    
    // //tabla de preguntas_de_examen_alum
    private $idpregunta;

    //tabla examen
    private $Folio;
    private $idRespuesta;
    private $status;
        
        public function __construct(){
            parent::__construct();
        }

        public function setid($idusuario){                  $this->idusuario=$idusuario;}
        public function setnombre($nombre){                 $this->	nombre=$nombre;}
        public function setUserCorreo($userCorreo){         $this->	userCorreo=$userCorreo;}

        public function setidModulo($idModulo){                  $this->idModulo =$idModulo;}
        public function setidpregunta($idpregunta){                  $this->idpregunta =$idpregunta;}
        public function setFolio($Folio){                  $this->Folio =$Folio;}
        public function setStatus($status){                  $this->status =$status;}

    
        public function getidusuario (){                    return $this->idusuario; }
        public function getnombre(){                        return $this->nombre;}
        public function getUserCorreo(){                    return $this->userCorreo; }
       
        public function getModulo(){                    return $this->idModulo; }
        public function getidPregunta(){                    return $this->idpregunta; }
        public function getFolio(){                    return $this->Folio; }
        public function getidRespuesta(){                    return $this->idRespuesta; }
        public function getStatus(){                    return $this->status; }

       
       
       private $listPAleat=[];
       private $listaDeFolioActivo=[];
    
    
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
        public function modulos (){
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
        public function PreguntaAleatoria(){
            try{
                
                foreach($this->modulos() as $valor){
                    $sqlPgnAl=$this->query("SELECT idpregunta FROM preguntas_de_examen_alum WHERE idModulo=$valor ORDER BY rand() LIMIT 5");
                    while($p= $sqlPgnAl->fetch(PDO::FETCH_ASSOC)){
                    $preguntaA=new listadoDeAlumnos();
                    $preguntaA->setidpregunta($p['idpregunta']);
                    
                    array_push($listPAleat,$preguntaA);
                    }
                    return $listPAleat;                  
                }

            }catch(PDOException $e){
                error_log('modulos::generarLista->PDOException'.$e);

            }
        }
        public function GenerarFolioDeExamen(){
            try{
                $query = $this->query("INSERT INTO `examen`(`idusuario`, `idRespuestas`, `status`)
                 VALUES (:idusuario, :idRespuestas, :status)");
                $query->execute([
                    'idusuario'=>$this->idusuario,
                    'idRespuestas'=>$this->idRespuestas,
                    'status'=>$this->status
                ]);
                    return true;
            }catch(PDOException $e){
                error_log('modulos::GenerarFolioDeExamen->PDOException'.$e);
                return false;
            }
        }
        public function listadoDeFolioActivo(){
            try{
                $sql=$this->query("SELECT Folio FROM examen WHERE status='activo'");
                while($p= $sql->fetch(PDO::FETCH_ASSOC)){
                    $listFOlio= new listadoDeAlumnos();
                    $listFOlio->setFolio($p['Folio']);
                    array_push($listaDeFolioActivo,$listFOlio);
                }
                return $listaDeFolioActivo;
            }catch(PDOException $e){
                error_log('modulos::GenerarFolioDeExamen->PDOException'.$e);
                return false;
            }
        }
        public function generarHojaDeRespuestasAlum(){
            try{
                $sqlx=$this->query("INSERT INTO `respuestas_del_alumno`(`Folio`, `idpregunta`, `respuesta`)
                 VALUES (:Folio,:idRespuestas,'null')");
                foreach ($this->listaDeFolioActivo as $valor){
                $sqlx->execute([
                    'Folio'=>$this->valor,
                    'idrespuestas'=>$this->PreguntaAleatoria(),
                ]);
                    return true;
                }
                
            }catch(PDOException $e){
                error_log('modulos::generarHojaDeRespuestasAlum->PDOException'.$e);
                return false;
            }

        }

}
?>