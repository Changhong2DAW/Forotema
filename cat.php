<?php
if(isset($_GET["e"])){
    $id_cat=$_GET["e"];
    $linea = categorie::existe_cat($id_cat);
    if($linea==false){
        $error="Esta categoria no existe.";
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
}
?>






<section>
        <div class="novedades">
            <span class="titulo-cont3"> <span class="icono-categoria"><?php echo("&".$cat_icon)?></span> <?php echo($cat_name)?></span>
                <div class="entrada">
                <div class="usuario-foto">
                    <img src="icono/48341.jpg">
                </div>
                <div class="descripcion-entrada">
                    <span class="categoria-entrada">Tutorial</span>
                    <span class="titulo-entrada">Como configurar un Dominio en un VPS con CloudFlare</span>
                    <span class="user-entrada">Changhong</span>
                    <span class="descripcion-tiempo">hace 27 minutos ⋅ Tutoriales</span>
                </div>
                <div class="info-entrada">
                    <span class="respuesta-info-entrada">Respuestas: </span>
                    <span class="respuestas-entrada">0</span>
                    <span class="visitas-info-entrada">Visitas: </span>
                    <span class="visitas-entrada">1</span>
                </div>
                <div class="usuario-foto2">
                    <span class="tiempo-entrada">Hace 17 minutos</span>
                    <span class="foto-perfil-entrada"><img src="icono/48341.jpg"></span>
                    <span class="user-entrada">alimsoft</span>
                </div>
                </div>

                    
            </div>
        </section>