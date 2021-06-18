<?php
//controlador para cerrar la sesion
class Logout extends SesionController{

    function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->logout();

        $this->redirect('',[]);
    }
}

?>