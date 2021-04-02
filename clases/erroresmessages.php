<?php

class ErrorMessages{
    //El nombre de la cartegoria ya no existe
    const Error_ADMIN_NEWCATEGORY_EXOST="d716087af8f0722f2ed0f3ca3989a544";
    const ERROR_SIGNUP_nuevoUsuario ="000";
    const ERROR_SIGNUP_nuevoUsuario_CAMPOSVACIOS="001";
    const ERROR_SIGNUP_nuevoUsuario_EXISTENTE ="0002";
   

    private $errorsList = [];

    public function __construct(){
        
        $this-> errorsList=[
        ErrorMessages::Error_ADMIN_NEWCATEGORY_EXOST=>'El nombre de la cartegoria ya no existe',
        ErrorMessages::ERROR_SIGNUP_nuevoUsuario=>"Hubo un error al interntar prosesar la solicitud",
        ErrorMessages::ERROR_SIGNUP_nuevoUsuario_CAMPOSVACIOS=>"llenar todos los campos todos los campos porfavor ",
        ErrorMessages::ERROR_SIGNUP_nuevoUsuario_EXISTENTE=>"EsL corro ya existe fabor de ingresar ortro",

        ];

    }
    function get($hash){
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }
}
?>