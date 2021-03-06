<?php
    //controlador de sesiones

 require_once 'clases/sesion.php';
 require_once 'models/userModel.php';
class SesionController extends Controller{
    private $userSession;
    private $userCorreo;
    private $idusuario;

    private $session;
    private $sites;

    private $user;

    function __construct(){
        parent::__construct();
        $this->init();
    }
    public function getUserSession(){
        return $this->userSession;
    }

    public function getUserCorreo(){
        return $this->userCorreo;
    }

    public function getUserId(){
        return $this->idusuario;
    }




    private function init(){
        //se crea nueva sesión
        $this->session = new Session();
        //se carga el archivo json con la configuración de acceso
        $json = $this->getJSONFileConfig();
        // se asignan los sitios
        $this->sites = $json['sites'];
        // se asignan los sitios por default, los que cualquier rol tiene acceso
        $this->defaultSites = $json['default-sites'];
        // inicia el flujo de validación para determinar
        // el tipo de rol y permismos
        $this->validateSession();
    }
    //controlador de acceso archivo ubicado en config
    private function getJSONFileConfig(){
        $string = file_get_contents("config/acces.json");
        $json = json_decode($string, true);
        return $json;
    }
    //validacion de session
    function validateSession(){
        error_log('SessionController::validateSession()');
        //Si existe la sesión
        if($this->existsSession()){
            //guardar si existe un rol obtener la informacion
            $rol = $this->getUserSessionData()->getrol();
            error_log("sessionController::validateSession(): username:" . $this->user->getUserCorreo() . " - role: " . $this->user->getrol());
            //verificar si el rol es puvlico
            if($this->isPublic()){
                //redirige a acceso por default
                $this->redirectDefaultSiteByRole($rol);
                error_log( "SessionController::validateSession() => sitio público, redirige al main de cada rol" );
            }else{
                //si es privado en este 
                if($this->isAuthorized($rol)){
                    error_log( "SessionController::validateSession() => autorizado, lo deja pasar" );
                    //si el usuario está en una página de acuerdo
                    // a sus permisos termina el flujo
                }else{
                    error_log( "SessionController::validateSession() => no autorizado, redirige al main de cada rol" );
                    // si el usuario no tiene permiso para estar en
                    // esa página lo redirije a la página de inicio
                    $this->redirectDefaultSiteByRole($rol);
                }
            }
        }else{
            //No existe ninguna sesión
            //se valida si el acceso es público o no
            if($this->isPublic()){
                error_log('SessionController::validateSession() public page');
                //la pagina es publica
                //no pasa nada
            }else{
                //la página no es pública
                //redirect al login
                error_log('SessionController::validateSession() redirect al login');
                header('location: '. constant('URL') . '');
            }
        }
    }
    //si existe una sesion
    function existsSession(){
        if(!$this->session->exists()) return false;
        //obtiene la inforacion del usaruio
        if($this->session->getCurrentUser() == NULL) return false;

        $idusuario = $this->session->getCurrentUser();

        if($idusuario) return true;

        return false;
    }
    //obtiene la iinformacion del usuario de la Sesion
    function getUserSessionData(){
        $idusuario = $this->session-> getCurrentUser();
        $this->user = new UserModel();
        $this->user->get($idusuario);
        error_log("sessionController::getUserSessionData(): " . $this->user->getUserCorreo());
        return $this->user;
    }
    //si es pulico se dedica el URL
    private function isPublic(){
        $currentURL = $this->getCurrentPage();
        error_log("sessionController::isPublic(): currentURL => " . $currentURL);
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public'){
                return true;
            }
        }
        return false;
    }
    //obtener la pagina actual
    private function getCurrentPage(){        
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        error_log("sessionController::getCurrentPage(): actualLink =>" . $actual_link . ", url => " . $url[2]);
        return $url[2];
    }
    //redirigir el sitio predeterminado por función segun su controlador
    private function redirectDefaultSiteByRole($rol){
        $url = '';
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($this->sites[$i]['rol'] === $rol){
                $url = '/MVC_CTH/'.$this->sites[$i]['site'];
            break;
            }
         
        }
        header(constant('URL').$url);
        
    }
    //si es autoriza
    private function isAuthorized($rol){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info
        for($i = 0; $i < sizeof($this->sites); $i++){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['rol'] === $rol){
                return true;
            }
        }
        return false;
    }
    //inicializa
    public function initialize($user){
        error_log("sessionController::initialize(): user: " . $user->getUserCorreo());
        $this->session->setCurrentUser($user->getidusuario());
        $this->authorizeAccess($user->getrol());
    }
    //delimita el rol y ase la con sa seccion usada si es administrador o usuario
    function authorizeAccess($rol){
        error_log("sessionController::authorizeAccess(): role: $rol");
        switch($rol){
            case 'user':
                $this->redirect($this->defaultSites['user'],[]);
            break;
            case 'admin':
                $this->redirect($this->defaultSites['admin'],[]);
            
            break;
        
        }
    }
    //usado para serrar la seccion
    function logout() {
        $this->session->closeSession();
    }


}

?>