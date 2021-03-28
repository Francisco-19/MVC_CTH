<?php

class ErrorMessages{
    //El nombre de la cartegoria ya no existe
    const Error_ADMIN_NEWCATEGORY_EXOST="d716087af8f0722f2ed0f3ca3989a544";

    private $errorList = [];

    public function __construct(){
        
        $this-> errorList=[
             ErrorMessages::Error_ADMIN_NEWCATEGORY_EXOST=>'El nombre de la cartegoria ya no existe'

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