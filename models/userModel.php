<?php
class UserModel extends Model implements IModel{

    private $id;
    private $nombre;
    private $rol;
    private $correo;
    private $contraena;

    public function __construct(){

        parent::__construct();
        $this->id=0;
        $this->nombre='';
        $this->rol='';
        $this->correo='';
        $this->contraena='';

        
    }
    public function save(){
        try{
            $query= $this->prepare('INSERT INTO `usuarios`(`idusuario`, `nombre`, `rol`, `correo`, `contraseña`) VALUES (:id,:nombre,:rol,:correo,:contraseña)');
            $query->execute([
                'id'         => $this->id,
                'nombre'     => $this->nombre,
                'rol'        => $this->rol,
                'correo'     => $this->correo,
                'contraseña' => $this->contraena
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
                $item->setid($p,['id']);
                $item->setnombre($p,['nombre']);
                $item->setrol($p,['rol']);
                $item->setcorreo($p,['correo']);
                $item->setcontraseña($p,['contraseña']);

                array_push($items,$item);
            }
            return $items;

        }catch(PDOException  $e){
            error_log('UserModel::getAll->PDOExeption');
        }

    }
    

    public function get($id){
    
        try{
            $query = $this->prepare('SELECT * FROM usuarios WHERE idusuario= :id' );
            $query->execute(
                ['id'=>$id]
            );
            $user =$query->fetch(PDO::FETCH_ASSOC);
     
                $this->setid($user,['id']);
                $this->setnombre($user,['nombre']);
                $this->setrol($user,['rol']);
                $this->setcorreo($user,['correo']);
                $this->setcontraseña($user,['contraseña']);

           return $this;

        }catch(PDOException  $e){
            error_log('UserModel::getid->PDOExeption');
        }
    }
    public function delete($id){
        try{
            $query = $this->prepare('DELETE * FROM usuarios WHERE idusuario= :id' );
            $query->execute(
                ['id'=>$id]
            );
        

           return true;

        }catch(PDOException  $e){
            error_log('UserModel::DElELATE->PDOExeption');
            return false;
        }
    }
    public function update(){ 
        try{
        $query = $this->prepare('UPDATE usuarios SET  nombre= :nombre, rol=:rol, correo= :correo, contraseña =:contraseña    FROM  WHERE idusuario= :id' );
        $query->execute(
            ['id'=> $this->id,
             'nombre'=>$this ->nombre,
             'rol'=>$this->rol,
             'correo'=>$this->correo,
             'contraseña'=>$this->correo
            ]);
       return true;

    }catch(PDOException  $e){
        error_log('UserModel::getid->PDOExeption');
        return false;
    } }
    public function from($array){
        $this-> id      =$array['idusuario'];
        $this->nombre   =$array['nombre'];
        $this->roles    =$array['roles'];
        $this->correo   =$array['correo'];
        $this->contraena=$array['contrasena'];
    }
    public function exists($correo){
        try {
            $query = $this->prepare('SELECT `correo` FROM `usuarios` WHERE correo= :correo');
            $query->execute(['correo'=> $correo]);
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
    public function compare($contraena,$id){
        try{
            $user= $this->get($id);
            return password_verify($contraena,$user->get_password());
        }catch (PDOException $e){
            error_log('UserModel::compare->PDOExeption'.$e);
            return false;
        }

    }

    private function gerHasetPaswold($contraena){
            return password_hash($contraena,PASSWORD_DEFAULT,['COST'=>2]);
        }
    public function setid($id){
        $this->idusuario=$id;
    }
    public function setnombre($nombre){         $this->	nombre=$nombre;}
    public function setrol($rol){               $this->	rol=$rol;}
    public function setcorreo($correo){         $this->	correo=$correo;}
    public function setcontraseña($contraena){  
        $this->contraena= $this->gerHasetPaswold($contraena);
    }


    public function getid(){                    return $this->idusuario; }
    public function getnombre(){                return $this->nombre;}
    public function getrol(){                   return $this->rol;}
    public function getcorreo(){                return $this->correo; }
    public function getContraseña(){            return $this->contraena;}
    public function get_password(){                   return $this->contraseña;}
}

?>