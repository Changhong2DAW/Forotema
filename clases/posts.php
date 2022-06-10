<?php
Class post{
    private $post_id;
    private $post_content;
    private $post_date;
    private $post_topic;
    private $post_by;

    function __construct($post_content,$post_topic,$post_by){
        $this->post_content=$post_content;
        $this->post_topic=$post_topic;
        $this->post_by=$post_by;
    }
    public function crearpost(){
        $msg="";
        $conexion=Conexion::conectarBD();
        $sql = "INSERT INTO
                            posts(post_content,
                                  post_date,
                                  post_topic,
                                  post_by)
                        VALUES
                            ('" .$this->post_content . "',
                                  NOW(),
                                  " . $this->post_topic . ",
                                  " .  $this->post_by . "
                            )";
        if ($conexion->query($sql))
        $msg="<p>Entrada creada correctamente.</p>";
        
    else{
        $msg=false;
    }
    
    Conexion::desconectarBD($conexion);
    return $msg;
    }
    static function imprimir_post_concreto($id_topic,$inicio,$cuantos){
        $filas=array();
        $conexion=Conexion::conectarBD();
        $sql = "SELECT posts.post_topic, posts.post_content,posts.post_date, posts.post_by,users.user_id,users.user_name FROM posts
        LEFT JOIN
        users
        ON
        posts.post_by = users.user_id
        WHERE
        posts.post_topic =".$id_topic." ORDER BY post_id  ASC limit $inicio,$cuantos";
        $resultado = $conexion->query($sql);
        while($fila = $resultado->fetch_assoc()){ 
            $filas[]=$fila;
        }
        $resultado->free(); 
        Conexion::desconectarBD($conexion);
        return $filas;
    }

    static function consultar_respuestas($post_topic){
		
        $conexion=Conexion::conectarBD();
        $sql=" SELECT Count("."*) as respuestas FROM posts post_topic WHERE post_topic=$post_topic";
        $resultado = $conexion->query($sql);
        $resultado = $conexion->query($sql);
        $fila = $resultado->fetch_assoc();
        Conexion::desconectarBD($conexion);
        return $fila;
    }
    static function post_totales($post_topic){
		
        $conexion=Conexion::conectarBD();
        $sql="SELECT *  FROM posts where post_topic=$post_topic";
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
}

?>