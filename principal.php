<?php
$filas=topic::imprimir_topic_principal();
while(count($filas)%3!=0 &&count($filas)>3 ){

unset($filas[count($filas)-1]);

}
?>
<section>

            <div id="contenedor-inicio">
                <div class="cont-0">
                    <span class="titulo-cont0">Bienvenido</span>
                    <div class="contenedor">
        <div class="slider-contenedor">
            <section class="contenido-slider">
                <div>
                    <h2>Una pagina en la cual puedes ver, consultar, responder temas muy variado ya que tienes categoria de todo tipo, ideal para un dia tranquilo y ver hilos variados sobre temas diversos.</h2>
                    <a href="index.php?p=register">Registrate</a>
                </div>
                <img src="svgs/anima1.svg" alt="">

            </section>
            <section class="contenido-slider">
                               <img src="svgs/anima2.svg" alt="">
                <div>
                    <h2>Puedes conversar con gente de todas las partes del planeta y colaborar en tiempo real sobre diversos temas.</h2>
                    <a href="index.php?p=novedades">Novedades</a>
                </div>
 

            </section>
        <section class="contenido-slider">
            <div>
                <h2>¿Tienes una duda? Posteala en el apartado del foro y la gente tratara de ayudarte y reponder a las dudas que tengas. Recuerda divide y venceras.</h2>
                <a href="index.php?p=crear_entrada">Entradas</a>
            </div>
            <img src="svgs/anima3.svg" alt="">

        </section>
        <section class="contenido-slider">
            <img src="svgs/anima4.svg" alt="">
            <div>
                <h2>Se te creara un panel de tu propio perfil, en ella podras acceder a todas las entradas que has creado, borrarlas, cambiar la cuenta del usuario, contraseña, foto de perfil...</h2>
                <a href="index.php?p=perfil">Perfil</a>
            </div>


        </section>
        <section class="contenido-slider">
            <div>
                <h2>Una pagina en la cual puedes ver, consultar, responder temas muy variado ya que tienes categoria de todo tipo, ideal para un dia tranquilo y ver hilos variados sobre temas diversos.</h2>
                <a href="index.php?p=register">Registrate</a>
            </div>
            <img src="svgs/anima1.svg" alt="">

        </section>
    </div>
    </div>
</div>
              <div class="cont-1">
                <span class="titulo-cont"><span>Ultimos temas</span><button id="boton-ocultar" onclick="animacion()" value="ocultar"><i class="fa-solid fa-angle-down"></i></button></span>
<?php

foreach($filas as $fila){
    $user_img="";
    $user_name="";
    $topic_subject="";
    $topic_id="";
    $topic_date="";
    foreach($fila as $indice=>$valor){
        if($indice=="topic_subject"){
            $topic_subject=$valor;
        }
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
        if($indice=="topic_date"){
            $topic_date=$valor;
        }
        if($indice=="topic_id"){
            $topic_id=$valor;
        }
        if($indice=="topic_cat"){
            $topic_cat=$valor;
            $categoria =categorie::consultar_categoria($topic_cat);
            foreach($categoria as $indicecategoria =>$valorcategoria){
                if($indicecategoria=="cat_name"){
                    $cat_name=$valorcategoria;
                }
                if($indicecategoria=="cat_color"){
                    $cat_color=$valorcategoria;
                }
            }
        }
    }
    ?>
    <div class="tema">
    <a href="index.php?p=cat&e=<?php echo($topic_cat)?>"> <span class="categoria-entrada<?php echo($cat_color)?>"><?php echo($cat_name)?></span></a>
                    <span class="titulo-entrada"><a href="index.php?p=entrada&id_entrada=<?php echo($topic_id)?>" id="titulo-entrada"><?php echo($topic_subject) ?></a></span>
                </div>
    <?php

}
?>
               

              </div> 
              
              <div class="cont-2">
                  
                <span class="titulo-cont2">Categorias</span>
                <?php
                $filas=categorie::imprimircategoria();
                foreach($filas as $fila){
                   ?>
                   <div class="categorias" >
                       <?php
                    foreach($fila as $indice=>$valor){
                        
                        if($indice=="cat_icon"){
                            ?>
                            <span class="icono-categoria"><?php echo("&".$valor)?></span>
                            <?php
                        }
                        if($indice=="cat_id"){
                            ?>
                            <div class="titulo-categoria"><a href="<?php echo("?p=cat&e=".$valor)?>">
                            <?php
                        }

                        if($indice=="cat_name"){
                           ?>
                            <?php echo($valor)?></a></div>

                            <?php
                        }

                    }
                ?>
                </div>
                <?php
                }
                ?>
              </div> 
            </div>
        </section>
       