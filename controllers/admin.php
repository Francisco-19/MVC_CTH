<?php
    class Admin extends SesionController
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