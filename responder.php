
<?php
if(isset($_GET["id_entrada"])){
    $errores = array();
    $id_entrada = $_GET["id_entrada"];
    if($id_entrada==""){
        array_push($errores,"Error 1"); 
    }
    if(isset($_SESSION["user_id"])==true){
        $id_user=$_SESSION["user_id"];
    }else{
        array_push($errores,"Error 2"); 
    }
}
if(count($errores)==0){
    $respuesta="";
    $user = user::consultar_foto_user($id_user);
    foreach($user as $indice=>$valor){
        if($indice=="user_name"){
            $user_name=$valor;
        }
        if($indice=="user_date"){
            $user_date=$valor;
        }
        if($indice=="user_level"){
            $user_level=$valor;
        }
        if($indice=="user_img"){
            $user_img=$valor;
        }
    }
if(isset($_POST["enviar"])){
    if(isset($_POST["respuesta"])){
        $respuesta=$_POST["respuesta"];
        if($respuesta==""){
            array_push($errores,"Error 3"); 
        }
    }
    if(count($errores)==0){
        $post = new post($respuesta,$id_entrada,$id_user);
        $post-> crearpost();
        array_push($errores,"Error 4"); 
    }
}

?>
 
<section class="section-entrada">
<a  class='icono-back5' href="index.php?p=entrada&id_entrada=<?php echo($id_entrada)?>"><i class="fa-solid fa-angle-left"></i></a>
<div class="topic-general">
    
        <div class="topic-user">
         <span class="topic-img-user"><img src="<?php echo($user_img)?>"></span>
         
         <span class="topic-user-name"><?php echo($user_name)?></span>
         <span>Desde:</span>  
         <span class="topic-user-unido"><?php echo($user_date)?></span>
         <span class="topic-user-rol"><?php if($user_level==0)echo("Administrador"); if($user_level==1) echo("Usuario")?></span>         
        </div>
        
        <form action="index.php?p=responder&id_entrada=<?php echo($id_entrada)?>" method="post">
        <div class="topic-contenido"><span class="hora-post"><span class="boton-respuesta">Responder:<input type="submit" name="enviar" class="link-res2"></span><?php 
          foreach($errores as $indice=>$valor){
            if($valor=="Error 3"){
                echo("<p class='error3'>El campo no puede estar vacio.</p>");
            }
            if($valor=="Error 4"){
                echo("<p class='error3'>Se ha introducido el comentario correctamente.</p>");
            }
          }
        
        
        ?></span><textarea name="respuesta" class="respuesta"><?php echo($respuesta) ?></textarea>
        </form>
        </div>       
       </div>
</section>
<?php
}else{
    foreach($errores as $indice=>$valor){
        if($valor=="Error 2"){
            ?>
            <section class="login-section">
		   <div class="login-box2">
			<h2>No se ha iniciado sesión</h2>
			<p class="login-exito">Se esta redirigiendo a la pagina de inicio. Espere un momento.</p>
			<div class="loader"></div>
		  </div>
		</section>
		<?php
		?>
		<script>
		  function r(){
			location.href="<?php echo($_SERVER["PHP_SELF"])?>"
		  }
		  setTimeout("r()",5000);
		</script>
            <?php
        }
        if($valor=="Error 1"){
            ?>
            <section class="login-section">
		   <div class="login-box2">
			<h2>Esta entrada no existe.</h2>
			<p class="login-exito">Se esta redirigiendo a la pagina de inicio. Espere un momento.</p>
			<div class="loader"></div>
		  </div>
		</section>
		<?php
		?>
		<script>
		  function r(){
			location.href="<?php echo($_SERVER["PHP_SELF"])?>"
		  }
		  setTimeout("r()",5000);
		</script>
            <?php
        }
    }
}
?>