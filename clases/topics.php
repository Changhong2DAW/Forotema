<?php
Class topic{
    private $topic_id;
    private $topic_subject;
    private $topic_date;
    private $topic_cat;
    private $topic_by;

    function __construct($topic_subject,$topic_cat,$topic_by){
        $this->topic_subject=$topic_subject;
        $this->topic_cat=$topic_cat;
        $this->topic_by=$topic_by;
    }

    public function creartopic(){
        $msg="";
        $conexion=Conexion::conectarBD();
        $sql = "INSERT INTO 
        topics(topic_subject,
               topic_date,
               topic_cat,
               topic_by,topic_visitas)
        VALUES('" .$this->topic_subject. "',
               NOW(),
               " .$this->topic_cat. ",
               " .$this->topic_by. ",0
               )";
     
        if ($conexion->query($sql)){
           $id = mysqli_insert_id($conexion);
    }   
    else{
        $id=false;
    }
    
    Conexion::desconectarBD($conexion);
    return $id;
    }
    static function imprimir_topic($cuantos,$inicio,$user_id){
        $filas=array();
        $conexion=Conexion::conectarBD();
        $sql="SELECT * FROM topics where topic_by=$user_id ORDER BY topic_id  DESC limit $inicio,$cuantos";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[]=$fila;
        }
        $resultado->free(); 
        Conexion::desconectarBD($conexion);
        return $filas;
    }
    static function imprimir_topic_todos($cuantos,$inicio,$cat_id){
        $filas=array();
        $conexion=Conexion::conectarBD();
        $sql="SELECT topic_id,topic_by, topic_cat, topic_date, topic_subject,topic_visitas FROM topics where topic_cat=$cat_id ORDER BY topic_id  DESC limit $inicio,$cuantos";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[]=$fila;
        }
        $resultado->free(); 
        Conexion::desconectarBD($conexion);
        return $filas;
    }
    static function imprimir_topic_todos_novedades($cuantos,$inicio){
        $filas=array();
        $conexion=Conexion::conectarBD();
        $sql="SELECT topic_id,topic_by, topic_cat, topic_date, topic_subject, topic_visitas FROM topics ORDER BY topic_id  DESC limit $inicio,$cuantos";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[]=$fila;
        }
        $resultado->free(); 
        Conexion::desconectarBD($conexion);
        return $filas;
    }
    static function imprimir_topic_principal(){
        $filas=array();
        $conexion=Conexion::conectarBD();
        $sql="SELECT topic_id,topic_by, topic_cat, topic_date, topic_subject FROM topics ORDER BY topic_id  DESC limit 16";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[]=$fila;
        }
        $resultado->free(); 
        Conexion::desconectarBD($conexion);
        return $filas;
    }
    static function imprimir_topic_concreto($id_topic){
        $conexion=Conexion::conectarBD();
        $sql = "SELECT * FROM topics where topic_id=$id_topic";
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
    static function borrar_topic($topic_id){
        $conexion=Conexion::conectarBD();
        $sql ="DELETE FROM topics WHERE topic_id = $topic_id";
        $result=$conexion->query($sql);

    }

    static function mis_topic_totales($user_id){
		
        $conexion=Conexion::conectarBD();
        $sql="SELECT *  FROM topics where topic_by=$user_id";
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
   
    static function cat_topic_totales($cat_id){
		
        $conexion=Conexion::conectarBD();
        $sql="SELECT *  FROM topics where topic_cat=$cat_id";
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
    static function cat_topic_totales_todos(){
		
        $conexion=Conexion::conectarBD();
        $sql="SELECT *  FROM topics";
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
    static function addvisita_topic($id_topic,$numero){
        $conexion=Conexion::conectarBD();
        $sql = "UPDATE topics SET topic_visitas = $numero WHERE topic_id = $id_topic";
        $result=$conexion->query($sql);
        Conexion::desconectarBD($conexion); 
    }	
}
?>