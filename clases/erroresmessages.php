<?php

class ErrorMessages{
    //El nombre de la cartegoria ya no existe
    const Error_ADMIN_NEWCATEGORY_EXOST="d716087af8f0722f2ed0f3ca3989a544";
    const ERROR_SIGNUP_NEWUSER ="0003";
    const ERROR_SIGNUP_EMPTY="0002";
    const ERROR_SIGNUP_NEWUSER_EXIST="0004";

    private $errorList = [];

    public function __construct(){
        
        $this-> errorList=[
             ErrorMessages::Error_ADMIN_NEWCATEGORY_EXOST=>'El nombre de la cartegoria ya no existe',
            ErrorMessages::ERROR_SIGNUP_NEWUSER=>"Hubo un error al interntar prosesar la solicitud",
            ErrorMessages::ERROR_SIGNUP_EMPTY=>"llenar lso campos de correo y pasworld",
            ErrorMessages::ERROR_SIGNUP_NEWUSER_EXIST=>"EL corro ya existe fabor de ingresar ortro"

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