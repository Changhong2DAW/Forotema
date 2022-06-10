<?php
if(isset($_GET["e"])){
    $id_cat=$_GET["e"];
    $linea = categorie::existe_cat($id_cat);
    if($linea==false){
        ?>
        <section class="login-section">
           <div class="login-box2">
            <h2>No existe esta categoria</h2>
            <p class="login-exito">Se esta redirigiendo a la pagina de inicio. Espere un momento.</p>
            <div class="loader"></div>
          </div>
        </section>
        <script>
          function r(){
            location.href="<?php echo($_SERVER["PHP_SELF"])?>"
          }
          setTimeout("r()",2000);
        </script>
        <?php
    }
    else{
        foreach($linea as $indice=>$valor){
            if($indice=="cat_icon"){
                $cat_icon=$valor;
            }
           if($indice=="cat_name"){
               $cat_name=$valor;
           }
        }
    }
    if($linea!=false){

    $cuantos=10;
if(isset($_GET['inicio'])){
	$inicio=$_GET['inicio'];
}
else{
	$inicio=0;
  $totalFilas=topic::cat_topic_totales($id_cat);
}

$filas=topic::imprimir_topic_todos($cuantos,$inicio,$id_cat);
$limite= $inicio+$cuantos;
?>





<section class="categoria-section">
        <div class="novedades">
            <span class="titulo-cont3"> <span class="icono-categoria"><?php echo("&".$cat_icon)?></span> <?php echo($cat_name)?></span>
            <?php
            if ($totalFilas==0){
                ?>
                
                <div class="no-hay-entradas">
                <h1>No hay entradas aún</h1>
                </div>
                <?php
            }
            ?>
            <?php
        foreach($filas as $fila){
            $user_img="";
            $user_name="";
            $cat_color="";
            $cat_name="";
            $topic_subject="";
            $topic_id="";
        foreach($fila as $indice=>$valor){
            if($indice=="topic_by"){
                $user = user::consultar_foto_user($valor);
                foreach($user as $indiceuser=>$valoruser){
                    if($indiceuser=="user_img"){
                   $user_img=$valoruser;
                    }
                    if($indiceuser=="user_name"){
                      $user_name=$valoruser;
                    }
                }
            }
            if($indice=="topic_cat"){
                $topic_cat=$valor;
                $cat= categorie::consultar_categoria($valor);
                foreach($cat as $indicecat=>$valorcat){
                    if($indicecat=="cat_color"){
                    $cat_color=$valorcat;
                    }
                    if($indicecat =="cat_name"){
                        $cat_name=$valorcat;
                       
                    }
                }
            }
            if($indice=="topic_subject"){
                $topic_subject=$valor;
            }
            if($indice=="topic_date"){
              $topic_date=$valor;
            }
            if($indice=="topic_id"){
                $topic_id=$valor;
                $respuestas =post::consultar_respuestas($valor);
               foreach($respuestas as $indicerespuestas=>$valorrespuestas){
                   if($indicerespuestas=="respuestas"){
                       $num_respuestas=$valorrespuestas;
                   }
               }
            }
            if($indice=="topic_visitas"){
                $topic_visitas=$valor;
            }
        }
        ?>
        <div class="entrada">
                <div class="usuario-foto">
                    <img src="<?php echo($user_img)?>" class='user-pic'>
                </div>
                <div class="descripcion-entrada">
                <a href="index.php?p=cat&e=<?php echo($topic_cat) ?>"><span class="categoria-entrada<?php echo($cat_color)?>"><?php echo($cat_name) ?></span></a>
                    <a href="index.php?p=entrada&id_entrada=<?php echo($topic_id)?>" class="titulo-entrada" id="titulo-entradanov"><?php echo($topic_subject)?></a>
                    <span class="user-entrada"><?php echo($user_name)?></span>
                    <span class="descripcion-tiempo"><?php echo($topic_date)?> ⋅ <?php echo($cat_name)?></span>
                </div>
               
                <div class="info-entrada">
                    <span class="respuesta-info-entrada">Respuestas: </span>
                    <span class="respuestas-entrada"><?php echo($num_respuestas-1)?></span>
                    <span class="visitas-info-entrada">Visitas: </span>
                    <span class="visitas-entrada"><?php echo($topic_visitas)?></span>
                </div>
                <div class="usuario-foto2">
                    <span class="tiempo-entrada"><?php echo($topic_date)?></span>
                    <span class="foto-perfil-entrada"><img src="<?php echo($user_img)?>"></span>
                    <span class="user-entrada"><?php echo($user_name)?></span>
                </div>
        </div>
        <?php
        }
       ?>

                    
            </div>
            <?php
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

            echo("<div class='botones-mis-entradas2'>");
            if($inicio==0){
            }else{

            
            echo "<a href='".$_SERVER['PHP_SELF']."?p=cat&e=$id_cat&inicio=$anterior' >[←]</a>";
        }
            if($totalFilas-$inicio<=$cuantos){

            }else{

            
            echo "<a href='".$_SERVER['PHP_SELF']."?p=cat&e=$id_cat&inicio=$siguiente' >[→]</a>";
        }
            echo("</div>");

            }
            ?>

        </section>
<?php
}
}
?>