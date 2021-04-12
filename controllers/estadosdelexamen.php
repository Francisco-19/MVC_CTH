<?php
require_once 'models/generarExame.php';

    class Estadosdelexamen extends SesionController
    {
        
        function __construct()
        {
            $this->listado= new listadoDeAlumnos();
            parent::__construct();
            error_log('Estadosdelexamen::costruct-inicio de estado del examen');
            
        }

        function render()
        {
            error_log('Estadosdelexamen::render-inicio de login');
         $this->listado=$this->listado->generarLista();
            $this->view->render('ListadoDelExamenEstado/listado');
        }
        function listadoDeAlumnos(){
       
        
        $this->view->render('ListadoDelExamenEstado/listado');

        }
        
       
    }
    ?>