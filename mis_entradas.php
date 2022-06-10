<?php
if(isset($_SESSION["sesion"])){
$cuantos=3;

  if(isset($_POST["borrarsi"])){
    topic::borrar_topic($_POST["id_borrado"]);
  }

if(isset($_GET['inicio'])){
	$inicio=$_GET['inicio'];
}
else{

	$inicio=0;
}
  $totalFilas=topic::mis_topic_totales($_SESSION["user_id"]);
 
$filas=topic::imprimir_topic($cuantos,$inicio,$_SESSION["user_id"]);
$limite= $inicio+$cuantos;


?>
<section class="login-section">
<div class="titulo-crear-cateogoria"><span class="titulo-cat">Entradas</span>
<div class="mis-entradas">

<?php
  if(isset($_POST["borrar"])){
    ?>
<a  class='icono-back3' href="index.php?p=mis_entradas"><i class="fa-solid fa-angle-left"></i></a>


<?php

    if(isset($_POST["id-topic-borrar"])){
      $id_borrar=$_POST["id-topic-borrar"];
      $topicborrar =topic::imprimir_topic_concreto($id_borrar);
      
      ?>
             <div class="mi-entrada">
               <?php
        foreach($topicborrar as $topindice=>$topvalor){
          if($topindice=="topic_id"){
           $topidbo=$topvalor;
          }
         if($topindice=="topic_subject"){
          $topic_subject=$topvalor;
          
         }
         if($topindice=="topic_cat"){
           $categoria=categorie::consultar_categoria($topvalor);
           foreach($categoria as $cat=>$valorcat){
            if($cat=="cat_id"){
              $topic_cat=$valorcat;
            }
             if($cat=="cat_name"){
              $cat_name=$valorcat;
             }
             if($cat=="cat_color"){
              $cat_color=$valorcat;
             }
            
           }
        }
      }
     
      ?>
      <span class='mi-entrada-titulo'><span><?php echo($topic_subject)?></span></span>
      <a href="index.php?p=cat&e=<?php echo($topic_cat)?>"><span class='mi-entrada-categoria'><span class="categoria-entrada<?php echo($cat_color)?>"><?php echo($cat_name)?></span></span></a>
 
      <h1>¿Estas seguro de querer eliminarlo?</h1>
      <form action="index.php?p=mis_entradas" method="post">
        <input type="hidden" value="<?php echo($topidbo)?>" name="id_borrado">
        <input type=submit value="SÍ" name="borrarsi" class="borrar-entrada">
        <input type=submit value="NO" name="borrarno" class="borrar-entrada">
    </form>
      </div>
      </div>
      <?php
    
  }
    ?>
    </section>
    <?php
    }else{
    ?>
    <a  class='icono-back3' href="index.php?p=perfil"><i class="fa-solid fa-angle-left"></i></a>
<h1>Mis entradas</h1>

<?php
 if(isset($_POST["borrarsi"])){
  echo("<p class='error3'>Se ha borrado correctamente.</p>");
 }
 if(isset($_POST["borrarno"])){
  echo("<p class='error3'>No se ha borrado.</p>");
 }
if ($totalFilas==0){
  echo "No ha publicado entradas aun.";
}
else{
if($limite>$totalFilas){
    echo("<p class='error3'>Mostrando las entradas  desde ".($inicio+1)." al ".($totalFilas)."</p>");
}
else{echo("<p class='error3'>Mostrando las entradas desde el ".($inicio+1)." al ".($inicio+$cuantos)."</p>");
}
}?>

  <?php
  foreach($filas as $fila){
    ?>
    <form action="index.php?p=mis_entradas" method="post">
    <div class="mi-entrada">
      <?php
      foreach($fila as $indice=>$valor){
        ?>
        <?php
         if($indice=="topic_id"){
          $topic_id=$valor;

         }
        if($indice=="topic_subject"){
          $topic_subject=$valor;
        }
        if($indice=="topic_cat"){
          $categoria=categorie::consultar_categoria($valor);
          foreach($categoria as $cat=>$valorcat){
            if($cat=="cat_id"){
              $topic_cat=$valorcat;
            }
            if($cat=="cat_name"){
              $cat_name=$valorcat;
            }
            if($cat="cat_color"){
              $cat_color=$valorcat;
            }
          }
         
        }
      }
      echo("<input type=hidden value=$topic_id name='id-topic-borrar'>");
      echo("<span class='mi-entrada-titulo'><span>$topic_subject</span></span>\n");
      ?>
      <a href="index.php?p=cat&e=<?php echo($topic_cat)?>"><span class='mi-entrada-categoria'><span class="categoria-entrada<?php echo($cat_color)?>"><?php echo($cat_name)?></span></span></a>
      <?php
      echo(" <span class='boton'><input type='submit' value='Borrar'name='borrar' class='borrar-entrada'>\n");
      echo("</div>\n");
      echo("</form>\n");
  }
  if ($totalFilas==0){

}else{


  if($inicio+$cuantos<$totalFilas)
	$siguiente=$inicio+$cuantos;
else
	$siguiente=$inicio;

if($inicio-$cuantos>=0)
	$anterior=$inicio-$cuantos;
else
	$anterior=$inicio;
  echo("<div class='botones-mis-entradas'>");
if($inicio==0){
}else{
    echo "<a href='".$_SERVER['PHP_SELF']."?p=mis_entradas&inicio=$anterior' >[←]</a>";
}
if($totalFilas-$inicio<=$cuantos){
}
else{

  echo "<a href='".$_SERVER['PHP_SELF']."?p=mis_entradas&inicio=$siguiente' >[→]</a>";
}
  echo("</div>");
}
  ?>
   

<div class="input-box3 button">
	<input type=button name='crear-cat' value='Crear entrada' class="input-editar3"  onclick="link_crear_entrada()" />
      </div>
    
</div>
</section>
<?php
}
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