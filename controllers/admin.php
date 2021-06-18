<?php
    class Admin extends SesionController
    //controlador para la vista de admin principal
    {
        function __construct()
        {
            parent::__construct();
            error_log('admin::costruct-inicio de login');
        }

        function render()
        {
            error_log('alumnos::render-inicio de login');

            $this->view->render('admin/index');
        }

        
    }
    ?>