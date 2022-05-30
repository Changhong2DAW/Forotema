<?php
Class user{
    private $user_id;
    private $user_name;
    private $user_pass;
    private $user_email;
    private $user_date;
    private $user_level;

    function __construct($user_name,$user_pass,$user_email,$user_date,$user_level){
        $this->user_name=$user_name;
        $this->user_pass=$user_pass;
        $this->user_email=$user_email;
        $this->user_date=$user_date;
        $this->user_level=$user_level;
    }

    public function crearuser(){
        $msg="";
        $conexion=Conexion::conectarBD();
        $sql = "insert into users values(null,'".$this->user_name."','".$this->user_pass."','".$this->user_email."','".$this->user_date."','".$this->user_level."')";
        if ($conexion->query($sql))
        $msg="<p>Usuario creado correctamente.</p> </p>Puede iniciar sesión <a href='index.php?p=login'>aquí</a>.</p>";
        
    else{
        $msg="<p>Error al crear el usuario.</p>";
    }
    
    Conexion::desconectarBD($conexion);
    return $msg;
    }
    public  function comprobaruser(){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM users where user_name='".$this->user_name."'";
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
    public  function comprobaremail(){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM users where user_email='".$this->user_email."'";
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
        $sql = "SELECT user_name,user_pass FROM users where user_name='".$user."' AND user_pass='".$pass."'";
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