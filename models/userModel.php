<?php
class UserModel extends Model implements IModel{

    private $idusuario;
    private $nombre;
    private $rol;
    private $userCorreo;
    private $contraena;

    public function __construct(){

        parent::__construct();
        $this->idusuario=0;
        $this->nombre='';
        $this->rol='';
        $this->userCorreo='';
        $this->contraseña='';
    }
    public function save(){
        try{
            $query= $this->prepare('INSERT INTO `usuarios` ( `nombre`, `rol`, `userCorreo`, `contraseña`) VALUES (:nombre,:rol,:userCorreo,:contraseña)');
            $query->execute([
                'nombre'     => $this->nombre,
                'rol'        => $this->rol,
                'userCorreo' => $this->userCorreo,
                'contraseña' => $this->contraeña
            ]);

        }catch(PDOException $e){
            error_log('UserModel::save->PDOExeption'.$e);
            return false;
        }
    }
    public function getAll(){
        $items =[];
        try{
            $query = $this->query('SELECT * FROM usuarios');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item= new UserModel();
                $item->setid($p,['idusuario']);
                $item->setnombre($p,['nombre']);
                $item->setrol($p,['rol']);
                $item->setUserCorreo($p,['userCorreo']);
                $item->setcontraseña($p,['contraseña']);

                array_push($items,$item);
            }
            return $items;

        }catch(PDOException  $e){
            error_log('UserModel::getAll->PDOExeption');
        }

    }
    

    public function get($idusuario){
    
        try{
            $query = $this->prepare('SELECT * FROM usuarios WHERE idusuario= :idusuario ' );
            $query->execute(
                ['idusuario'=>$idusuario]
            );
            $user =$query->fetch(PDO::FETCH_ASSOC);
     
                $this->setid($user,['idusuario']);
                $this->setnombre($user,['nombre']);
                $this->setrol($user,['rol']);
                $this->setUserCorreo($user,['userCorreo']);
                $this->setcontraseña($user,['contraseña']);

           return $this;

        }catch(PDOException  $e){
            error_log('UserModel::getid->PDOExeption');
        }
    }
    public function delete($idusuario){
        try{
            $query = $this->prepare('DELETE * FROM usuarios WHERE idusuario= :idusuario' );
            $query->execute(
                ['idusuario'=>$idusuario]
            );
        

           return true;

        }catch(PDOException  $e){
            error_log('UserModel::DElELATE->PDOExeption');
            return false;
        }
    }
    public function update(){ 
        try{
        $query = $this->prepare('UPDATE usuarios SET  nombre= :nombre, rol=:rol, userCorreo= :userCorreo, contraseña =:contraseña    FROM  WHERE idusuario= :idusuario' );
        $query->execute(
            ['idusuario'=> $this->idusuario,
             'nombre'=>$this ->nombre,
             'rol'=>$this->rol,
             'userCorreo'=>$this->userCorreo,
             'contraseña'=>$this->contraseña
            ]);
       return true;

    }catch(PDOException  $e){
        error_log('UserModel::getid->PDOExeption');
        return false;
    } }
    public function from($array){
        $this->idusuario   =$array['idusuario'];
        $this->nombre      =$array['nombre'];
        $this->roles       =$array['roles'];
        $this->userCorreo  =$array['userCorreo'];
        $this->contraena   =$array['contraseña'];
    }
    public function exists($userCorreo){
        try {
            $query = $this->prepare('SELECT `userCorreo` FROM `usuarios` WHERE userCorreo= :userCorreo');
            $query->execute(['userCorreo'=> $userCorreo]);
            if($query->rowCount()>0){
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            error_log('UserModel::exist->PDOExeption'.$e);
            return false;
        }
    }
    public function compare($contraseña,$idusuario){
        try{
            $user= $this->get($idusuario);
            return password_verify($contraseña,$user->get_password());
        }catch (PDOException $e){
            error_log('UserModel::compare->PDOExeption'.$e);
            return false;
        }

    }

    private function gerHasetPaswold($contraseña){
            return password_hash($contraseña,PASSWORD_DEFAULT,['COST'=>2]);
        }
    public function setid($idusuario){
        $this->idusuario=$idusuario;
    }
    public function setnombre($nombre){         $this->	nombre=$nombre;}
    public function setrol($rol){               $this->	rol=$rol;}
    public function setUserCorreo($userCorreo){         $this->	userCorreo=$userCorreo;}
    public function setcontraseña($contraena){  
        $this->contraena= $this->gerHasetPaswold($contraena);
    }


    public function getidusuario (){                    return $this->idusuario; }
    public function getnombre(){                        return $this->nombre;}
    public function getrol(){                           return $this->rol;}
    public function getUserCorreo(){                    return $this->userCorreo; }
    public function getContraseña(){                    return $this->contraena;}
    public function get_password(){                     return $this->contraseña;}
}

?>