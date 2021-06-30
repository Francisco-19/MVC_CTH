<?php
//Mensajes de error posibles
class ErrorMessages{
    //El nombre de la cartegoria ya no existe
    //Si el error es invocado el codigo asignado en un caso "000" aparecera en el URL
    const ERROR_SIGNUP_nuevoUsuario ="000";
    const ERROR_SIGNUP_nuevoUsuario_CAMPOSVACIOS="001";
    const ERROR_SIGNUP_nuevoUsuario_EXISTENTE ="0002";
    const ERROR_LOGIN_nuevoUsuario_Autentificarse_CAMPOSVACIOS="003";
    const ERROR_SIGNUP_nuevoUsuario_Autentificarse_CORREO_CONTRASEÑA="004";
    const ERROR_SIGNUP_nuevoUsuario_Autentificarse_SOLICITUD_FAILD="005";
   

    private $errorsList = [];

    public function __construct(){
        
        $this-> errorsList=[
            //significado del codigo
        ErrorMessages::ERROR_SIGNUP_nuevoUsuario=>"Hubo un error al procesar la solicitud, intetnte de nuevo.",
        ErrorMessages::ERROR_SIGNUP_nuevoUsuario_CAMPOSVACIOS=>"Obligatorio llenar todos los campos. ",
        ErrorMessages::ERROR_SIGNUP_nuevoUsuario_EXISTENTE=>"Este coreo ya existe, por favor de ingresar otro",
        ErrorMessages::ERROR_LOGIN_nuevoUsuario_Autentificarse_CAMPOSVACIOS=>"Obligatorio llenar los campos correo y contraseña",
        ErrorMessages::ERROR_SIGNUP_nuevoUsuario_Autentificarse_CORREO_CONTRASEÑA=>"Correo y/o contraseña son incorectos, intente de nuevo.",
        ErrorMessages::ERROR_SIGNUP_nuevoUsuario_Autentificarse_SOLICITUD_FAILD=>"La solicitud de ingreso fallo."
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