<?php

class SuccessMessages{
         const Succes_ADMIN_NEWCATEGORY_EXOST="d716087af8f0722f2ed0f3ca3989a544";

        private $SusesList = [];
    
       
        public function __construct(){
            
            $this-> SusesList=[
                SuccessMessages::Succes_ADMIN_NEWCATEGORY_EXOST=>'El nombre de la cartegoria ya no existe'
    
            ];
    
        }
        function get($hash){
            return $this->susesList[$hash];
        }
    
        function existsKey($key){
            if(array_key_exists($key, $this->SusesList)){
                return true;
            }else{
                return false;
            }
        }
    
}
?>