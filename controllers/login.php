 <?php
 class Login extends SesionController{
     function __construct()
     {
         parent::__construct();
         error_log('login::costruct-inicio de login');
     }

     function render(){
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->errorMessage = '';
        $this->view->render('login/index');
     }
 }
 ?>