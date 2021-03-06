<?php
Class user{
    private $user_id;
    private $user_name;
    private $user_pass;
    private $user_email;
    private $user_date;
    private $user_level;
    private $user_img;

    function __construct($user_name,$user_pass,$user_email,$user_date,$user_level,$user_img){
        $this->user_name=$user_name;
        $this->user_pass=$user_pass;
        $this->user_email=$user_email;
        $this->user_date=$user_date;
        $this->user_level=$user_level;
        $this->user_img=$user_img;
    }

    public function crearuser(){
        $msg="";
        $conexion=Conexion::conectarBD();
        $sql = "insert into users values(null,'".$this->user_name."','".$this->user_pass."','".$this->user_email."','".$this->user_date."','".$this->user_level."','".$this->user_img."')";
        if ($conexion->query($sql))
        $msg="<p>Usuario creado correctamente.</p> </p>Puede iniciar sesión <a href='index.php?p=login'>aquí</a>.</p>";
        
    else{
        $msg="<p>Error al crear el usuario.</p>";
    }
    
    Conexion::desconectarBD($conexion);
    return $msg;
    }
    static function comprobaruser($user_name){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM users where user_name='".$user_name."'";
        $result=$conexion->query($sql);
        if ($result->num_rows > 0){
            $linea=$result->fetch_assoc();
        }
        else{
            $linea=false;
        }
        $result->free();
        Conexion::desconectarBD($conexion); 
        return $linea;
    }
    
    static function comprobaremail($user_email){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM users where user_email='".$user_email."'";
        $result=$conexion->query($sql);
        if ($result->num_rows > 0){
            $linea=$result->fetch_assoc();
        }
        else{
            $linea=false;
        }
        $result->free();
        Conexion::desconectarBD($conexion); 
        return $linea;
    }
    static function loguear($user, $pass){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM users where user_name='".$user."' AND user_pass='".$pass."'";
        $result=$conexion->query($sql);
        if ($result->num_rows > 0){
            $linea=$result->fetch_assoc();
        }
        else{
            $linea=false;
        }
        $result->free();
        Conexion::desconectarBD($conexion); 
        return $linea;
    }
    static function datos_perfil($user){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM users where user_name='".$user."'";
        $result=$conexion->query($sql);
        if ($result->num_rows > 0){
            $linea=$result->fetch_assoc();
        }
        else{
            $linea=false;
        }
        $result->free();
        Conexion::desconectarBD($conexion); 
        return $linea;
    }

    static function editaruser($user_id,$username){
        $conexion=Conexion::conectarBD();
        $sql = "UPDATE users SET user_name = '$username' WHERE users.user_id = '$user_id'";
        $result=$conexion->query($sql);
        Conexion::desconectarBD($conexion); 
    }
    static function editarpassword($user_id,$password){
        $conexion=Conexion::conectarBD();
        $sql = "UPDATE users SET user_pass = '$password' WHERE users.user_id = '$user_id'";
        $result=$conexion->query($sql);
        Conexion::desconectarBD($conexion); 
    }
    static function editarlevel($user_id,$userlevel){
        $conexion=Conexion::conectarBD();
        $sql = "UPDATE users SET user_level = '$userlevel' WHERE users.user_id = '$user_id'";
        $result=$conexion->query($sql);
        Conexion::desconectarBD($conexion); 
    }
    static function editaremail($user_id,$email){
        $conexion=Conexion::conectarBD();
        $sql = "UPDATE users SET user_email = '$email' WHERE users.user_id = '$user_id'";
        $result=$conexion->query($sql);
        Conexion::desconectarBD($conexion); 
    }
    static function editarfoto($user_id,$userimg){
        
        $conexion=Conexion::conectarBD();
        $sql = "UPDATE users SET user_img = '$userimg' WHERE users.user_id = '$user_id'";
        $result=$conexion->query($sql);
        Conexion::desconectarBD($conexion); 
    }
    static function consultar_foto_user($user_id){
        $conexion=Conexion::conectarBD();
        $sql="SELECT user_img,user_name,user_date,user_level FROM users where user_id=$user_id";
        $result=$conexion->query($sql);
        if ($result->num_rows > 0){
            $linea=$result->fetch_assoc();
        }
        else{
            $linea=false;
        }
        $result->free();
        Conexion::desconectarBD($conexion); 
        return $linea;
    }
    static function user_totales(){
		
        $conexion=Conexion::conectarBD();
        $sql="SELECT *  FROM users ";
        $resultado = $conexion->query($sql);
        if ($conexion->error!="") { 
            echo "Error: La ejecución de la consulta falló debido a: \n"; 
            echo "Query: " . $conexion . "\n"; 
            echo "Errno: " . $conexion->errno . "\n"; 
            echo "Error: " . $conexion->error . "\n"; 
            exit; 
        }
        $num_filas=$resultado->num_rows;
        $resultado->free();
        Conexion::desconectarBD($conexion);
        return $num_filas;
        
    }
    static function imprimir_users($cuantos,$inicio){
        $filas=array();
        $conexion=Conexion::conectarBD();
        $sql="SELECT * FROM users ORDER BY user_id ASC limit $inicio,$cuantos";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[]=$fila;
        }
        $resultado->free(); 
        Conexion::desconectarBD($conexion);
        return $filas;
    }
    static function imprimir_user_concreto($user_id){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM users where user_id=$user_id";
        $result=$conexion->query($sql);
        if ($result->num_rows > 0){
            $linea=$result->fetch_assoc();
        }
        else{
            $linea=false;
        }
        $result->free();
        Conexion::desconectarBD($conexion); 
        return $linea;
    }	
}
?>