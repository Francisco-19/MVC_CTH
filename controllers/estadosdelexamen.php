<?php
require_once 'models/generarExame.php';
require_once 'models/PDOservicios.php';
//controlador administrador para ver el estado de los examenes activos
class Estadosdelexamen extends SesionController
{
  function __construct()
  {

    parent::__construct();
    //objetos correspondiente a los modelos para recivir la informacion de las consultas
    $this->mExamen = new listadoDeAlumnos();
    $this->foliosActivos =new listadoDeAlumnos();
    $this->PuebaExamen = new listadoDeAlumnos();
    $this->PruebaModulo = new listadoDeAlumnos();
    $this->objPDO = new PDOservicios();
    error_log('Estadosdelexamen::costruct-inicio de estado del examen');
  }
  public   $modulos = [];
  function render()
  {
    //renderificar la vista principal
    error_log('Estadosdelexamen::render-inicio de login');
    $this->listadoDeAlumnos();
  }
  //funcion cargar la tabla de alumnos
  function listadoDeAlumnos()
  {
    //carga la vista y en los corchetes y envia la informacion
    $this->view->render('ListadoDelExamenEstado/listado', [
      $a = 'a' => $this->mExamen = $this->objPDO->generarLista()
    ]);
    //  var_dump($this->mExamen);
  }
  //obtener los modulos existentes en la base de datos
  function getModulos()
  {
    /*se utiliza un arreglo para guardar los modulos y se crea una bariable con el objero en este caso
    (mExamen) y se realiza la consulta */
    $modulos = [];
    $listM = $this->mExamen = $this->objPDO->modulos();
    foreach ($listM as $a) :
      array_push($modulos, $a->getModulo());
      reset($listM);
    endforeach;
    var_dump($modulos);
    return $modulos;
  }
  //creacion de preguntas aleatorias
  function preguntasAleatorias()
  {
     /*se utiliza un arreglo para guardar los modulos y se crea una bariable con el objero en este caso
    (mExamen) y se realiza la consulta */
    $modulos = [];
    $listM = $this->mExamen = $this->objPDO->modulos();
    foreach ($listM as $a) :
      array_push($modulos, $a->getModulo());
    endforeach;
    //al obrener los modulos se crean las preguntas aleatorias
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
      paso 3="recorre los modulos existentes guardar en areglo modulos[]
      paso 4 crear los folios del pdo servicios->GenerarFolioDeExamenTodos(idusuario,status,modulo) *post = folio por modulo*
      */
    //paso 1************************************************************************************************************************************    
    /*Este recorrido sirvepara recorrer las2 tablas ala ves y si por casualidad hay un usuari
      que no apareca en la otra tabla ejemp 
      if(folio=== null and id usuario == null)
       genera los folios segugun el modulos peroPEROpero como es una consulta por dos tablas
       se ara una busqueda de manera que se extraera el correo para su posterior uso
       */
    $recorrido = $this->mExamen = $this->objPDO->verificacarFlolioExist();
    $CorreoDetectado = []; //se guardaran los correos detectados en este areglo
    foreach ($recorrido as $detectado) : //recorre el objeto con la informacion conseguida del PDOServicios->verificacarFlolioExist()
      if ($detectado->getidusuario() == null and $detectado->getFolio() == null or $detectado->getFolio() == "finalizado") {
        array_push($CorreoDetectado, $detectado->getUserCorreo()); //agrega los correos al array ya creado= $CorreoDetectado=[]
      } else {
      }
    endforeach;
    //paso 2********************************************************************************************************************************
    /*para obtener el id utilizando el areglo  $CorreoDetectado=[] donde se guardaron los correos con anterioridad
    ejecutamos el PDOservicios->buscarPorUsuarioCorreosVarios($CorreoDetectado)
    y lo guardamos de igual manera en el areglo IDdetectado[]$pfs->getidusuario()
    */
    $X = $this->PuebaExamen = $this->objPDO->buscarPorUsuarioCorreosVarios($CorreoDetectado);
    $IDdetectado = []; //aqui se guardan los id que se detectaron el la busqueda
    foreach ($X as $pfs) :
      array_push($IDdetectado, $pfs->getidusuario()); //agrega los correos al array ya creado=$IDdetectado=[]
    endforeach;
    //paso 3********************************************************************************************************************************
    $modulos = [];
    $listM = $this->mExamen = $this->objPDO->modulos();
    foreach ($listM as $a) :
      array_push($modulos, $a->getModulo());
    endforeach;
    // var_dump($modulos);
    //paso 4************************************************************************************************************************************************
    if ($IDdetectado != null) {
      foreach ($IDdetectado as $s) :
          $this->objPDO->GenerarFolio($s, "activo");
      endforeach;
    } else {
      echo "Ya estan activos";
    }








    /**************** al generar los folios y creando la hoja de respuestas del alumnos no tiene manera
     * de detener la generacion de respuestas de examen **************************************/
    $arrayFloliosActivos=[];
    $listFoliosActivos = $this->foliosActivos=$this->objPDO-> listadoDeFolioActivo();
    foreach($listFoliosActivos as $valor):
      array_push($arrayFloliosActivos,$valor->getFolio());
    endforeach;
    $preguntas2 = [];
    $preguntas = $this->mExamen = $this->objPDO->PreguntaAleatoria($modulos);
    foreach ($preguntas as $px) :
      array_push($preguntas2, $px->getidPregunta());
    endforeach;
    if($arrayFloliosActivos != null){
      foreach($arrayFloliosActivos as $Valor):
        var_dump("$Valor");
               foreach($preguntas2 as $px2):
                 $this->objPDO->generarHojaDeRespuestasAlum($Valor, $px2);
              //   var_dump($px2);
               endforeach;
             endforeach;
        
    }else{
      echo"Ya se generaron las preguntas";
    }
    
  }
  function listadoFolioActivos(){
    
    // var_dump( $arrayFloliosActivos);
   //  $modulos = [];
   $modulos = [];
    $listM = $this->mExamen = $this->objPDO->modulos();
    foreach ($listM as $a) :
      array_push($modulos, $a->getModulo());
    endforeach;

    
  //  var_dump($preguntas2);

  /*    foreach($arrayFloliosActivos as $Valor):
 var_dump("$Valor");
        foreach($preguntas2 as $px2):
          $this->objPDO->generarHojaDeRespuestasAlum($Valor, $px2);
       //   var_dump($px2);
        endforeach;
      endforeach;*/
  }
}
