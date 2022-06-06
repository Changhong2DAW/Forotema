
<section>
            <div id="contenedor-inicio">
                <div class="cont-0">
                    <span class="titulo-cont0">Bienvenido</span>
                    <div class="slider"></div>
                </div>
                
              <div class="cont-1">
                <span class="titulo-cont">Ultimos temas</span>

                <div class="tema">
                    <span class="titulo-tema">Ejemplo 1</span>
                    <div class="parrafo-tema">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
                    <div class="autor-tema">  <span class="imagen-user-tema"><img src="icono/48341.jpg"></span><span class="datos-tema"> Juanjose HACE 3 HORAS</span></div>
                </div>
                
                <div class="tema">
                    <span class="titulo-tema">Ejemplo 1</span>
                    <div class="parrafo-tema">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
                    <div class="autor-tema">  <span class="imagen-user-tema"><img src="icono/48341.jpg"></span><span class="datos-tema"> Juanjose HACE 3 HORAS</span></div>
                </div>
                <div class="tema">
                    <span class="titulo-tema">Ejemplo 1</span>
                    <div class="parrafo-tema">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
                    <div class="autor-tema">  <span class="imagen-user-tema"><img src="icono/48341.jpg"></span><span class="datos-tema"> Juanjose HACE 3 HORAS</span></div>
                </div>
                <div class="tema">
                    <span class="titulo-tema">Ejemplo 1</span>
                    <div class="parrafo-tema">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
                    <div class="autor-tema">  <span class="imagen-user-tema"><img src="icono/48341.jpg"></span><span class="datos-tema"> Juanjose HACE 3 HORAS</span></div>
                </div>
                <div class="tema">
                    <span class="titulo-tema">Ejemplo 1</span>
                    <div class="parrafo-tema">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
                    <div class="autor-tema">  <span class="imagen-user-tema"><img src="icono/48341.jpg"></span><span class="datos-tema"> Juanjose HACE 3 HORAS</span></div>
                </div>
                <div class="tema">
                    <span class="titulo-tema">Ejemplo 1</span>
                    <div class="parrafo-tema">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</div>
                    <div class="autor-tema">  <span class="imagen-user-tema"><img src="icono/48341.jpg"></span><span class="datos-tema"> Juanjose HACE 3 HORAS</span></div>
                </div>

              </div> 
              
              <div class="cont-2">
                  
                <span class="titulo-cont2">Categorias</span>
                <?php
                $filas=categorie::imprimircategoria();
                foreach($filas as $fila){
                   ?>
                   <div class="categorias">
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
                            <div class="ultimo-categoria">JUAJOSE HACE 3 HORAS</div>
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
    