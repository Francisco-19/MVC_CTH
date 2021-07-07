 <?php
 //controlador para el inicio de sescion
    class Login extends SesionController
    {
        function __construct()
        {
            parent::__construct();
            error_log('login::costruct-inicio de login');
        }
            // carga lavista principal
        function render()
        {
            $this->view->render('login/index');
        }
        //verificar si exite el usuario
        function atuentificarse(){
            //si exite el post
            if ($this->existPOST(['correo', 'contraseña'])) {
                $userCorreo = $this->getPost('correo');
                $contraseña = $this->getPost('contraseña');
                //verificacion si estan vacios los campos
                if ($userCorreo == '' || empty($userCorreo) || $contraseña == '' || empty($contraseña)) {
                    $this->redirect('login', ['error' => ErrorMessages::ERROR_LOGIN_nuevoUsuario_Autentificarse_CAMPOSVACIOS]);
                }
                $user = $this->model->login($userCorreo, $contraseña);
                
                if ($user != NULL) {
                    //INCIALIZE
                    error_log('login::atuentificarse() pasaste');
                    $this->initialize($user);
                } else {
                    //error al registrar intente de nuevo
                    error_log('login::atuentificarse() el correo o la contraseña son incorectos');
                    $this->redirect('', ['error' => ErrorMessages::ERROR_SIGNUP_nuevoUsuario_Autentificarse_CORREO_CONTRASEÑA]);
                }
            } else {
                error_log('login::atuentificarse() error de parametros');
                $this->redirect('login', ['error' => ErrorMessages::ERROR_SIGNUP_nuevoUsuario_Autentificarse_SOLICITUD_FAILD]);
            }
        }
    }
    ?>