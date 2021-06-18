<?php
require_once 'models/generarExame.php';
//modelo pora el manejor de los alumnos por parte del administrador
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

       
       
      
    
    
       
       

}
?>