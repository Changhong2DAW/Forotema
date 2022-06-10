<?php
Class categorie{
    private $cat_id;
    private $cat_icon;
    private $cat_name;
    private $cat_description;
    private $cat_color;
    function __construct($cat_icon,$cat_name,$cat_description,$cat_color){
        $this->cat_icon=$cat_icon;
        $this->cat_name=$cat_name;
        $this->cat_description=$cat_description;
        $this->cat_color=$cat_color;
    }
    static function comprobarcat($cat_name){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM categories where cat_name='".$cat_name."'";
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
    public function crearcat(){
        $msg="";
        $conexion=Conexion::conectarBD();
        $sql = "insert into categories values('".$this->cat_icon."',null,'".$this->cat_name."','".$this->cat_description."',".$this->cat_color.")";
        if ($conexion->query($sql))
        $msg="<p>Categoria creada correctamente.</p>";
        
    else{
        $msg="<p>Error al crear la categoria.</p>";
    }
    
    Conexion::desconectarBD($conexion);
    return $msg;
    }


    static function imprimircategoria(){
        $filas=array();
        $conexion=Conexion::conectarBD();
        $sql="SELECT * FROM categories ORDER BY cat_id";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[]=$fila;
        }
        $resultado->free(); 
        Conexion::desconectarBD($conexion);
        return $filas;
    }
    static function consultar_categoria($cat_id){
        $conexion=Conexion::conectarBD();
        $sql="SELECT * FROM categories where cat_id=$cat_id";
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
    static function consultar_color_categoria($cat_id){
        $conexion=Conexion::conectarBD();
        $sql="SELECT cat_color FROM categories where cat_id=$cat_id";
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
    static function existe_cat($cat_id){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM categories where cat_id='".$cat_id."'";
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