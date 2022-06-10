
<?php
if($_GET["p"] == "entrada" && isset($_GET["id_entrada"])){
    $errores = array();
    if(isset($_GET["id_entrada"])){
        $id_entrada = $_GET["id_entrada"];
        if($id_entrada!=""){
            $topic = topic::imprimir_topic_concreto($id_entrada);
        }
        if($id_entrada==""){
            array_push($errores,"Error 1"); 
            echo("<p>No existe este topic vuelve a la pagina principal</p>");
        }
        if(isset($topic)){
            if($topic==false){
                array_push($errores,"Error 1"); 
                ?>
    <section class="login-section">
       <div class="login-box2">
        <h2>No existe esta entrada</h2>
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
        }
    }
    if(count($errores)==0){
        foreach($topic as $indice=>$valor){
            if($indice=="topic_visitas"){
                $numero=$valor;
            }
        }
        $valor++;
        topic::addvisita_topic($id_entrada,$valor);
        if(isset($_GET['inicio'])){
            $inicio=$_GET['inicio'];
        }
        else{
            $inicio=0;
        }
        ?>
        
        <section class="section-entrada">
        <div class="caja-topic">
        <?php
        $totalFilas=post::post_totales($id_entrada);
        $post = post::imprimir_post_concreto($id_entrada,$inicio,$cuantos);
        $limite= $inicio+$cuantos;
        $contador=0;
        foreach($post as $fila){
            foreach($fila as $indice=>$valor){
           if($indice=="post_topic"){
               
            $topic = topic::imprimir_topic_concreto($valor);
            foreach($topic as $indicetopic=>$valortopic){
                if($indicetopic=="topic_cat"){
                    $topic_cat=$valortopic;
                    $categoria=categorie::consultar_categoria($valortopic);
                    foreach($categoria as $indicecategoria=>$valorcategoria){
                        if($indicecategoria=="cat_name"){
                            $cat_name=$valorcategoria;
                        }
                        if($indicecategoria=="cat_color"){
                            $cat_color=$valorcategoria;
                        }
                      
                    }
                }
                if($indicetopic=="topic_subject"){
                    $topic_titulo=$valortopic;
                }
            }
           }
           if($indice=="user_name"){
               $user_name=$valor;
           }
           if($indice=="user_id"){
            $usuario= user::consultar_foto_user($valor);
            foreach($usuario as $indiceusaurio=>$valorfoto){
                if($indiceusaurio=="user_img"){
                    $user_img=$valorfoto;
                }
                if($indiceusaurio=="user_date"){
                    $user_date=$valorfoto;
                }
                if($indiceusaurio=="user_level"){
                    $user_level=$valorfoto;
                }
            }
        }
           if($indice=="post_date"){
            $post_date=$valor;
        }
        if($indice=="post_content"){
            $post_content=$valor;
        }

        }

        if($contador==0 && !isset($_GET["cab"])){
            ?>
            <div class="entrada-topic">
            <div class="topic-header"><a href="index.php?p=cat&e=<?php echo($topic_cat)?>"><span class="categoria-entrada<?php echo($cat_color) ?>"><?php echo($cat_name)?></span></a><span class="topic-titulo"><?php echo($topic_titulo)?></span></div>
            <div class="datos-topic"><span class="topic-username"><?php echo($user_name)?></span><span class="topic-hora"><?php echo($post_date) ?></span></div>
            <div class="topic-general">

            <div class="topic-user">
            <span class="topic-img-user"><img src="<?php echo($user_img)?>"></span>
            <span class="topic-user-name"><?php echo($user_name)?></span>
            <span>Desde:</span>  
            <span class="topic-user-unido"><?php echo($user_date)?></span>
            <span class="topic-user-rol"><?php if($user_level==0)echo("Administrador"); if($user_level==1)echo("Usuario"); ?></span>           
            </div>
            <div class="topic-contenido"><span class="hora-post"><?php echo($post_date)?></span><span>
                
        <?php
        echo($post_content);
        ?>
        </span>
 </div>       
</div>

</div>
        <?php
        }
        else{
            ?>
        <div class="topic-general">
        <div class="topic-user">
         <span class="topic-img-user"><img src="<?php echo($user_img)?>"></span>
         <span class="topic-user-name"><?php echo($user_name)?></span>
         <span>Desde:</span>  
         <span class="topic-user-unido"><?php echo($user_date)?></span>
         <span class="topic-user-rol"><?php if($user_level==0)echo("Administrador"); if($user_level==1)echo("Usuario"); ?></span>         
        </div>
        <div class="topic-contenido"><span class="hora-post"><?php echo($post_date)?></span><span>
        <?php
        echo($post_content);
        ?>
       </span>
        </div>       
       </div>
       
            <?php
        }
        $contador++;
    }
    if(isset($_SESSION["sesion"])){

?>      
       <div class="responder-div"><a href="index.php?p=responder&id_entrada=<?php echo($id_entrada)?>" class='link-res'><span>Responder</span></a></div>
       <?php
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

    echo("<div class='botones-mis-entradas2'>");
    if($inicio==0){

    }
    else{
    echo "<a href='".$_SERVER['PHP_SELF']."?p=entrada&id_entrada=$id_entrada&inicio=$anterior' >[←]</a>";
}
if($totalFilas-$inicio<=$cuantos){
}
else{
    echo "<a href='".$_SERVER['PHP_SELF']."?p=entrada&id_entrada=$id_entrada&inicio=$siguiente&cab=si' >[→]</a>";

    echo("</div>");

    }
}
    ?>



      


</div>


</section>

<?php

    }
}
else{
    ?>
    <section class="login-section">
       <div class="login-box2">
        <h2>No existe esta entrada</h2>
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
?>