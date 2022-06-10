<?php
if(isset($_SESSION["sesion"])){
if($_SESSION["user_level"] ==0){

    if(isset($_GET['inicio'])){
        $inicio=$_GET['inicio'];
    }
    else{
    
        $inicio=0;
    }
    $cuantos=3;
      $totalFilas=user::user_totales();
      $filas=user::imprimir_users($cuantos,$inicio);
      $limite= $inicio+$cuantos;

      ?>
        <section class="login-section">
	    <div class="titulo-crear-cateogoria"><span class="titulo-cat">Usuarios</span>
	    <div class="mis-entradas">
		<h1>Usuarios</h1>
        <?php
        if(isset($_POST["modificaruser"]) || isset($_POST["cambiar_user"])){
          
            if(isset($_POST["userid"])){
                $user_id =$_POST["userid"];
            }
            if(isset($_POST["cambiar_user"])){
                $user2 = user::consultar_foto_user($user_id);
                foreach($user2 as $indiceuser=>$valoruser){
                    if($indiceuser=="user_name"){
                        $username2=$valoruser;
                    }
                }
                $errores = array();
                if(isset($_POST["userid"])){
                    $user_id =$_POST["userid"];
                }
                if(isset($_POST["user_name"])){
                    $user_name =$_POST["user_name"];
                    if($user_name=="")
                    array_push($errores,"Error 1");
                    if($username2!=$user_name){
                        if(user::comprobaruser($user_name))
                        array_push($errores,"Error 4");
                    }
                }
                if(isset($_POST["user_password"])){
                    $user_password =$_POST["user_password"];
                    
                    if($user_password=="")
                    array_push($errores,"Error 2");
                }
                if(isset($_POST["userlevel"])){
                    $user_level=$_POST["userlevel"];
                    if($user_level=="")
                    array_push($errores,"Error 3");
                }
            
                if(count($errores)==0){
                    user::editaruser($user_id,$user_name);
                    user::editarpassword($user_id,$user_password);
                    user::editarlevel($user_id,$user_level);
                    echo("<p class='error3'>Se han cambiado los datos correctamente.</p>");
                }
            }
            $user = user::imprimir_user_concreto($user_id);
            
            foreach($user as $indice=>$valor){
                if($indice=="user_id"){
                    $user_id=$valor;
                }
                if($indice=="user_name"){
                    $user_name=$valor;
                }
                if($indice=="user_pass"){
                    $user_pass=$valor;
                }
                if($indice=="user_email"){
                    $user_email=$valor;
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
            ?>
             <a  class='icono-back5' href="index.php?p=administrar_usuarios"><i class="fa-solid fa-angle-left"></i></a>
		    <div class="contenedor-usuarios">
            <form action="index.php?p=administrar_usuarios" method="post">
			    <div class="usuario-caja">
				<span class="img-usuario"><img src="<?php echo($user_img)?>" ></span>
				<div class="usuarios-datos">
                    <input type="hidden" name="userid" value="<?php echo($user_id)?>">

                 <span class="titulo-cambiouser">Usuario</span>
                 <?php
                if(isset($errores)){
                    foreach($errores as $indice=>$valor){
                        if($valor=="Error 1")
                        echo("<p class='error6'>El campo no puede estar vacio.</p>");
                    }
                    if($valor=="Error 4")
                        echo("<p class='error6'>Este usuario ya existe.</p>");
                    }
                
                 ?>
				<span class="username"><input type="text" name="user_name" value="<?php echo($user_name)?>"></span>
				<span class="titulo-cambiouser">Nivel de usuario</span>
                <?php

                ?>
				<span class="user_level">
                <select name="userlevel">
				<option value="0"<?php if($user_level==0) echo("selected")?>>Administrador</option>
				<option value="1"<?php if($user_level==1) echo("selected")?>>Usuario</option>
				</select>
				</span>
                <span class="titulo-cambiouser">Contraseña</span>
                <?php
                 if(isset($errores)){
                    foreach($errores as $indice=>$valor){
                        if($valor=="Error 2")
                        echo("<p class='error6'>El campo no puede estar vacio.</p>");
                    }
                }
                ?>
				<span class="user_password"><input type="password" name="user_password" value="<?php echo($user_pass)?>"></span>
				<span class="enviar"><input type="submit" value="Cambiar" name="cambiar_user"></span>
				</div>
			</div>
		    </form>
            </div>
            </div>
	</section>
            <?php





        }
        else{
?>
        <a  class='icono-back5' href="index.php?p=perfil"><i class="fa-solid fa-angle-left"></i></a>
<?php
       
    foreach($filas as $fila){
        foreach($fila as $indice=>$valor){
            if($indice=="user_id"){
                $user_id=$valor;
            }
            if($indice=="user_name"){
                $user_name=$valor;
            }
            if($indice=="user_pass"){
                $user_pass=$valor;
            }
            if($indice=="user_email"){
                $user_email=$valor;
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
        ?>
  
                <div class="contenedor-usuarios">
                <form action="index.php?p=administrar_usuarios" method="post">
			    <div class="usuario-caja">
				<span class="img-usuario"><img src="<?php echo($user_img)?>" ></span>
				<div class="usuarios-datos">
                <input type="hidden" name="userid" value="<?php echo($user_id)?>">
				<span class="titulo-cambiouser">Usuario</span>
				<span class="username"><?php echo($user_name)?></span>
				<span class="titulo-cambiouser">Nivel de usuario</span>
				<span class="user_level" name="userlevel">
                 <?php if($user_level==0)echo("Administrador")?>
                 <?php if($user_level==1) echo("Usuario")?>
				</span>
				<span class="enviar"><input type="submit" value="Cambiar" name="modificaruser"></span>
				</div>
			</div>

		</form>
        </div>
        <?php




    }
?>

	
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
          echo("<div class='botones-mis-entradas'>");
          if($inicio==0){
            }
            else{
                echo "<a href='".$_SERVER['PHP_SELF']."?p=administrar_usuarios&inicio=$anterior' >[←]</a>";
            }
         
            if($totalFilas-$inicio<=$cuantos){
            }
            else{
                echo "<a href='".$_SERVER['PHP_SELF']."?p=administrar_usuarios&inicio=$siguiente' >[→]</a>";
        }
          echo("</div>");
        }
          ?>
</div>
	</div>
	</section>
<?php
}
}
else{
    ?>
	<section class="login-section">
		   <div class="login-box2">
			<h2>No tiene los derechos para acceder a este apartado.</h2>
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
else{
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