<?php

if(isset($_SESSION['sesion'])){

$datos = user::datos_perfil($_SESSION["user_name"]);
foreach($datos as $indice=>$campo){
    
    if($indice=="user_name"){
        $user_name=$campo;
    }
    if($indice=="user_pass"){
        $user_pass=$campo;
    }
    if($indice=="user_email"){
        $user_email=$campo;
    }
    if($indice=="user_date"){
        $user_date=$campo;
    }
    if($indice=="user_level"){
        $user_level=$campo;
    }
    if($indice=="user_img"){
        $user_img=$campo;
    }
    $ruta="icono/";


}
$errores = array();
if(isset($_POST["editar-perfil"]) || isset($_POST["guardar"])){
    $msg="";
    $correcto=false;
    if(isset($_POST["guardar"])){
        if(isset($_POST["username"])){
            $user_name=$_POST["username"];
            if($user_name==""){
                if($user_name==""){
                    array_push($errores,"Error 1"); 
                  }
            }
        }
        if(isset($_POST["email"])){
            $user_email=$_POST["email"]; 
            if($user_email==""){
                if($user_email==""){
                    array_push($errores,"Error 2"); 
                  }
            }
        }
        if(isset($_POST["password"])){
            $user_pass=$_POST["password"]; 
            if($user_pass==""){
                if($user_pass==""){
                    array_push($errores,"Error 3"); 
                  }
            }
        }
        if($_FILES["foto"]["name"]!=""){
        if(isset($_FILES["foto"])){
          $tipos= array("image/jpeg","image/png","image/gif");
          foreach($tipos as $indice=>$valor){
              if($valor==$_FILES["foto"]["type"]){
                  $correcto=true;
              }
          }
          if($correcto==true){
            unlink($user_img);
            if(is_file($_FILES["foto"]["name"])){
          }
                if(is_uploaded_file($_FILES["foto"]["tmp_name"])){
                  $tmp=$_FILES["foto"]["tmp_name"];
                  $nombrearchivo = time().$_FILES["foto"]["name"];
                  if(move_uploaded_file($tmp,$ruta.'/'.$nombrearchivo)){
                   $user_img=$ruta.$nombrearchivo;
                   user::editarfoto($_SESSION["user_id"],$ruta.$nombrearchivo);
                   $msg.="<p class='error3'>Se ha actualizado tu foto de perfil.</p>";
              }
            }

        }
        
      }
          }
        if(count($errores)==0){
          if($_FILES["foto"]["name"]!="" && $correcto==false){
            array_push($errores,"Error 0"); 
        }
           if($user_name!=$_SESSION["user_name"]){
            $comprobacion1= user::comprobaruser($user_name);
            if($comprobacion1==true){
                $msg.="<p class='error3'>Ya existe este usuario.</p>";
              }else{
                user::editaruser($_SESSION["user_id"],$user_name);
                $_SESSION["user_name"] = $user_name;
                $msg.="<p class='error3'>Se ha actualizado el usuario correctamente.</p>";
              }
           }
           if($user_email!=$_SESSION["user_email"]){
            $comprobacion2= user::comprobaremail($user_email);
            if($comprobacion2==true){
                $msg.="<p class='error3'>Ya existe este email.</p>";
              }else{
                user::editaremail($_SESSION["user_id"],$user_email);
                $_SESSION["user_email"] = $user_email;
                $msg.="<p class='error3'>Se ha actualizado el email correctamente.</p>";
              }
            
            }
            if($user_pass!=$_SESSION["user_password"]){
               user::editarpassword($_SESSION["user_id"],$user_pass);
               $_SESSION["user_password"] = $user_pass;
               $msg.="<p class='error3'>Se ha actualizado la contraseña correctamente</p>";
            }
          
        }
    }
 
        ?>
<section class="section-perfil">
<div class="editar-perfil-titulo"><span>Mi perfil<span></div>
<div class="editar-perfil">
<a  class='icono-back' href="index.php?p=perfil"><i class="fa-solid fa-angle-left"></i></a>
<div class='editar-foto'><?php echo("<img src='$user_img' class='foto-editar'>") ?></div>
<?php 
             foreach($errores as $indice){
               if($indice=="Error 0"){
                 echo("<div class='error3'>El archivo subido no es una imagen.*</div>");
               }
             }
              ?>
<?php echo($msg)?>
<form action="index.php?p=perfil" method="post" enctype='multipart/form-data'>
<div class="editar-perfil-campo">
  <span>Foto</span>
<input type='file' name='foto' class="input-editar2">
</div>
<div class="editar-perfil-campo">
    <span>Usuario</span> <?php 
             foreach($errores as $indice){
               if($indice=="Error 1"){
                 echo("<div class='error3'>Debe crear un nombre de usuario*</div>");
               }
             }
              ?><input type="text" value="<?php echo($user_name)?>" class="input-editar" name="username">
</div>
<div class="editar-perfil-campo">

    <span>Email</span> <?php 
             foreach($errores as $indice){
               if($indice=="Error 2"){
                 echo("<div class='error3'>Debe introducir su correo electronico*</div>");
               }
             }
              ?><input type="email" value="<?php echo($user_email)?>" class="input-editar" name="email">
</div>
<div class="editar-perfil-campo">

    <span>Contraseña</span><?php 
             foreach($errores as $indice){
               if($indice=="Error 3"){
                 echo("<div class='error3'>Debe introducir una contraseña*</div>");
               }
             }
              ?> <input type="password" value="<?php echo($user_pass)?>" class="input-editar" name="password">
</div>
<div class="input-box3 button">
<input type=submit name='guardar' value='Guardar' class="input-editar" >
      </div>
</form>
</div>
</section>
<?php

}
else{

    $_SESSION["sinfallos"]=false;
?>

<section class="section-perfil">
    <h1 class="bienvenida-perfil"><i class="fa-solid fa-crown"></i> ¡BIENVENIDO <?php echo(strtoupper($_SESSION["user_name"]))?>! <i class="fa-solid fa-crown"></i></h1>
 <div class="perfil">
 <div class="perfil-titulo"><span>Mi perfil<span></div>
  <div class="perfil-foto">
      <?php echo("<img src='$user_img' class='perfil-icono'>") ?>
  <div class="div-perfil">
      <form action="index.php?p=perfil" method="post" class="botones-perfil">
      <div class="input-box2 button">
            <input type="submit" value="Editar perfil" name="editar-perfil"/>
      </div>
      <div class="input-box2 button">
            <input type="button" value="Crear una entrada" onclick="link_crear_entrada()" />
      </div>
      <?php
      if($user_level==0){
          ?>
             <div class="input-box2 button">
            <input type="button"  value="Crear categoria" onclick="link_crear_categoria()"/>
      </div>
      <div class="input-box2 button">
            <input type="button" value="Administrar usuarios" onclick="link_administrar_usuarios()"/>
      </div>
          <?php
      }
      ?>
        </form>
  </div>
</div>
<div class="perfil-datos">
  <div class="perfil-box"><span class="perfil-desc">Usuario:</span> <span><?php echo($user_name) ?></span></div>
  <div class="perfil-box"><span class="perfil-desc">Email:</span> <span><?php echo($user_email) ?></span></div>
  <div class="perfil-box"><span class="perfil-desc">Cuando te uniste:</span> <span> <?php echo($user_date) ?></span></div>
  <div class="perfil-box"><span class="perfil-desc">Nivel de usuario:</span> <span> <?php if($user_level=="1"){echo("Usuario");}else{echo("Administrador");} ?></span> </div>  
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