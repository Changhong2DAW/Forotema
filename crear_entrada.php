<?php
if(isset($_SESSION["sesion"])){
 $errores = array();
 $entrada_titulo="";
 $entrada_categoria="";
 $entrada_contenido="";
if(isset($_POST["crear-entrada"])){
    if(isset($_POST["entrada-titulo"])){
        $entrada_titulo = $_POST["entrada-titulo"];
        if($entrada_titulo==""){
            array_push($errores,"Error 1"); 
        }
    }
    if(isset($_POST["entrada-categoria"])){
        $entrada_categoria = $_POST["entrada-categoria"];
        if($entrada_categoria==""){
            array_push($errores,"Error 2"); 
        }
    }
    if(isset($_POST["entrada-contenido"])){
        $entrada_contenido = $_POST["entrada-contenido"];
        if($entrada_contenido==""){
            array_push($errores,"Error 3"); 
        }
    }



    if(count($errores)==0){

        $topic = new topic($entrada_titulo,$entrada_categoria,$_SESSION["user_id"]);
       $id= $topic->creartopic();
       if($id==false){
           echo("Ha ocurrido un error al crear la entrada.");
       }
       else{
           $post = new post($entrada_contenido,$id,$_SESSION["user_id"]);
           $post->crearpost();
           $exito="<p class='exito'>Se ha creado la entrada con exito.</p>";
       }
    }
}


?>




<section class="login-section">
<div class="titulo-crear-cateogoria"><span class="titulo-cat">Crear entrada</span>
    <form action="index.php?p=crear_entrada" method="post" class="crear-entrada">
    <a  class='icono-back4' href="index.php?p=mis_entradas"><i class="fa-solid fa-angle-left"></i></a>
    <?php if(isset($exito))echo($exito)?>
    <div class="entrada-div">
        <span class="entrada-span">Titulo del tema:</span>
        <?php 
             foreach($errores as $indice){
               if($indice=="Error 1"){
                 echo("<div class='error3'>Inserte titulo para la entrada.*</div>");
               }
             }
             ?>
        <input type="text" name="entrada-titulo" class="entrada-tema-input" <?php if(isset($entrada_titulo))echo(" value='$entrada_titulo'")?>>
    </div>
    <?php 
             foreach($errores as $indice){
               if($indice=="Error 2"){
                 echo("<div class='error3'>Inserte categoria para la entrada.*</div>");
               }
             }
             ?>
    <div class="entrada-div">
        <span class="entrada-span">Categoria del tema:</span>
    <select class="entrada-categoria" name="entrada-categoria">
        <?php
          $filas=categorie::imprimircategoria();
          foreach($filas as $fila){
              ?>
              
              <?php 
            foreach($fila as $indice=>$valor){
                if($indice=="cat_id"){
                    if($entrada_categoria==$valor){
                      echo("<option value='".$valor."' selected>");
                    }else{
                      echo("<option value='".$valor."'>");
                    }
                    
                }
                if($indice=="cat_name"){
                    echo("$valor");
                }
            }
            echo("</option>");
          }
        ?>
    </select>
    </div>
   
    <div class="entrada-div">
        <span class="entrada-span">Mensaje tema:</span>
        <?php 
             foreach($errores as $indice){
               if($indice=="Error 3"){
                 echo("<div class='error3'>Inserte un mensaje para el tema.*</div>");
               }
             }
             ?>
        <textarea name="entrada-contenido"><?php if(isset($entrada_contenido))echo($entrada_contenido)?></textarea>
    </div>
    <div class="input-box3 button">
	<input type=submit name='crear-entrada' value='Crear' class="input-editar3">
      </div>
    </form>
    
</section>
<?php
}else{
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
?>