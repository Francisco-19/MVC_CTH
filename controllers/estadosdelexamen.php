<?php
require_once 'models/generarExame.php';
require_once 'models/PDOservicios.php';

    class Estadosdelexamen extends SesionController
    {
        
        function __construct()
        {
           
            parent::__construct();
            $this->mExamen=new listadoDeAlumnos();
            $this->objPDO=new PDOservicios();
            error_log('Estadosdelexamen::costruct-inicio de estado del examen');
            
        }

        function render()
        {   
           
            error_log('Estadosdelexamen::render-inicio de login');
           
            
            $this->listadoDeAlumnos();
           
        }
        function listadoDeAlumnos(){
        
            
            $this->view->render('ListadoDelExamenEstado/listado',[
               'a'=> $this->mExamen =$this->objPDO-> generarLista()
            ]);

        }
        
       
    }
    ?>