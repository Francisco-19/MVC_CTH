<?php
require_once 'models/generarExame.php';
require_once 'models/PDOservicios.php';

class Estadosdelexamen extends SesionController
{

  function __construct()
  {

    parent::__construct();
    $this->mExamen = new listadoDeAlumnos();
    $this->PuebaExamen = new listadoDeAlumnos();
    $this->PruebaModulo = new listadoDeAlumnos();
    $this->objPDO = new PDOservicios();
    error_log('Estadosdelexamen::costruct-inicio de estado del examen');
  }
  public   $modulos = [];
  function render()
  {

    error_log('Estadosdelexamen::render-inicio de login');


    $this->listadoDeAlumnos();
  }
  function listadoDeAlumnos()
  {


    $this->view->render('ListadoDelExamenEstado/listado', [
      $a = 'a' => $this->mExamen = $this->objPDO->generarLista()
    ]);
    //  var_dump($this->mExamen);
  }
  function getModulos()
  {
    $modulos = [];
    $listM = $this->mExamen = $this->objPDO->modulos();
    foreach ($listM as $a) :
      array_push($modulos, $a->getModulo());
      
      reset($listM);
    endforeach;
var_dump($modulos);
    return $modulos;
  }
  function preguntasAleatorias()
  {
    $modulos = [];
    $listM = $this->mExamen = $this->objPDO->modulos();
    foreach ($listM as $a) :
      array_push($modulos, $a->getModulo());
    endforeach;

    $preguntasAX = [];
    $preguntas = $this->mExamen = $this->objPDO->PreguntaAleatoria($modulos);
    foreach ($preguntas as $px) :
      array_push($preguntasAX, $px->getidPregunta());

    endforeach;
    var_dump($preguntasAX);
  }
  /*generarFoliosTodos utilizada para crear folios del examen 1 folio por modulo en general*/
  function generarFoliosTodos()
  {   /*pasos para gnerar todos los folios
      paso 1 = "recorrer el pdoservicios pra ver que usuarios no tiene examen y obtener su correo".
      paso 2 ="verificar el id por medio del correo obtenido".
      paso 3="recorre los modulos existentes y crear los folios del pdo servicios->GenerarFolioDeExamenTodos(idusuario,status,modulo)
      */
//paso 1    
      /*Este recorrido sirvepara recorrer las2 tablas ala ves y si por casualidad hay un usuari
      que no apareca en la otra tabla ejemp 
      if(folio=== null and id usuario == null)
       genera los folios segugun el modulos peroPEROpero como es una consulta por dos tablas
       se ara una busqueda de manera que se extraera el correo para su posterior uso
       */
    $recorrido =$this->mExamen = $this->objPDO->verificacarFlolioExist();
    $CorreoDetectado=[];//se guardaran los correos detectados en este areglo
    foreach ($recorrido as $detectado) ://recorre el objeto con la informacion conseguida del PDOServicios->verificacarFlolioExist()
      if ($detectado->getidusuario() == null and $detectado->getFolio() == null) {
        array_push($CorreoDetectado,$detectado->getUserCorreo());//agrega los correos al array ya creado= $CorreoDetectado=[]
      } else {
      }
    endforeach;
//paso 2
    /*para obtener el id utilizando el areglo  $CorreoDetectado=[] donde se guardaron los correos con anterioridad
    ejecutamos el PDOservicios->buscarPorUsuarioCorreosVarios($CorreoDetectado)
    y lo guardamos de igual manera en el areglo IDdetectado[]$pfs->getidusuario()
    */
    $X = $this->PuebaExamen = $this->objPDO->buscarPorUsuarioCorreosVarios($CorreoDetectado); 
    $IDdetectado=[];//aqui se guardan los id que se detectaron el la busqueda
    foreach ($X as $pfs) :
      array_push($IDdetectado,$pfs->getidusuario());//agrega los correos al array ya creado=$IDdetectado=[]
    endforeach;
    var_dump($IDdetectado);
//paso <i class="fa fa-battery-3
$modulos = [];
    $listM = $this->mExamen = $this->objPDO->modulos();
    foreach ($listM as $a) :
      array_push($modulos, $a->getModulo());
    endforeach;

  }
  function busquedaporcorreo($ingresoCorreo)
  {
  }
}
