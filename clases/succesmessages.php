<?php

class SuccessMessages{
         const Succes_ADMIN_NEWCATEGORY_EXOST="d716087af8f0722f2ed0f3ca3989a544";
         const SUCCES_SIGNUP_NEWUSER="100";

        private $successList = [];
    
       
        public function __construct(){
            
            $this-> successList=[
                SuccessMessages::Succes_ADMIN_NEWCATEGORY_EXOST=>'El nombre de la cartegoria ya no existe',
                SuccessMessages::SUCCES_SIGNUP_NEWUSER=>'El usuario se a registrado correctamente fabor de revisar su correo'

            ];
    
        }
        function get($hash){
            return $this->successList[$hash];
        }
    
        function existsKey($key){
            if(array_key_exists($key, $this->successList)){
                return true;
            }else{
                return false;
            }
        }
    
}
?>