<?php
/**implementar el  controladorm para porder registrar a los usuarios*/

class Signup extends sesionController{ 


    function __construct(){
        parent::__construct();
    }

    function render(){
        $this-> view->render('login/signup',[]);
        

    }
    function newUser(){
        if($this->existPOST(['correo','contraseña'])){

            $correo =$this->getPost('correo');
            $contraseña =$this->getPost('contraseña');

            if($correo == '' || empty($correo) || $contraseña==''|| empty($contraseña)){
                $this->redirect('signup',['erro'=>ErrorMessages::ERROR_SIGNUP_EMPTY]);
            }
            $user = new UserModel();
            $user->setcorreo($correo);
            $user->getContraseña($contraseña);
            $user->setrol('user');

            if($user->exists($correo)){
                $this->redirect('signup',['erro'=>ErrorMessages::ERROR_SIGNUP_NEWUSER_EXIST]);
            }else if($user->save()){
                $this->redirect('signup',['success'=>SuccessMessages::SUCCES_SIGNUP_NEWUSER]);
            }else{
                $this->redirect('signup',['error'=>ErrorMessages::ERROR_SIGNUP_NEWUSER]);
            }

            

        }else{
            $this->redirect('singup',['error'=> ErrorMessages::ERROR_SIGNUP_NEWUSER]);
        }
    }

}


?>