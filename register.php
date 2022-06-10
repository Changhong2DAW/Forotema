<?php
$errores = array();
$username="";
$email="";
$checkbox="false";
$pass1="";
$pass2="";
$msg="";
if(isset($_POST["user-name"])){

if(!isset($_POST["checkbox"])){
  array_push($errores,"Error 5"); 
  }
  else{
    $checkbox="true";
  }
if(isset($_POST["user-name"])){
  $username=$_POST["user-name"];
  if($username==""){
    array_push($errores,"Error 1"); 
  }
}
if(isset($_POST["email"])){
  $email=$_POST["email"];
  if($email==""){
    array_push($errores,"Error 2"); 
  }
} 
if(isset($_POST["password1"])){
  $pass1=$_POST["password1"];
  if($pass1==""){
    array_push($errores,"Error 3"); 
  }
}
if(isset($_POST["password2"])){
  $pass2=$_POST["password2"];
}
if($pass1!=$pass2){
  array_push($errores,"Error 4"); 
}     
}
if(count($errores)==0 && isset($_POST["user-name"])){
$user = new user($username,$pass1,$email,date("j-n-Y"),1,"icono/default.jpg");
$comprobacion1= user::comprobaruser($username);
$comprobacion2= user::comprobaremail($email);
if($comprobacion1==true){
  $msg.="<p>Ya existe este usuario.</p>";
}
if($comprobacion2==true){
  $msg.="<p>Ya existe este email.</p>";
}
if($comprobacion1==false && $comprobacion2==false){
  $msg=$user->crearuser();
}else{
  $msg.="<p>Prueba a <a href='index.php?p=register'>reintentarlo</a>.</p>";
}
?>
<section class="register-section">
<div id="register">
<h2>Registro</h2>
<form method="post" action="<?php echo($_SERVER["PHP_SELF"]."?p=register")?>">
<?php echo($msg)?>
</form>
<?php

}
else{
if(!isset($_SESSION["sesion"])){


?>

<section class="register-section">
         <div id="register">
           <h2>Registro</h2>
           <form method="post" name="register"  id="formularioregistro" action="<?php echo($_SERVER["PHP_SELF"]."?p=register")?>">
             <div class="input-box">
            <div class='error3' id="error1"></div>
               <input type="text" placeholder="Nombre de usuario" name="user-name" id="username" <?php if($username!="")echo(" value='$username'")?>>
             </div>
             <div class="input-box">
             <div class='error3' id="error2"></div>
              <input type="email" placeholder="Correo electroníco" name="email" id="email" <?php if($email!="")echo(" value='$email'")?>>

            </div>
            <div class='error3' id="error3"></div>
            <div class="input-box">
              
              <input type="password" placeholder="Inserta contraseña" name="password1" id="pass1" <?php if($pass1!="")echo("value='$pass1'")?>>

            </div>
            <div class='error3' id="error4"></div>
            <div class="input-box">
              <input type="password" placeholder="Repite la contraseña"  name="password2" id="pass2" <?php if($pass2!="")echo(" value='$pass2'")?>>
    
            </div>
            <?php 
             foreach($errores as $indice){
               if($indice=="Error 5"){
                 echo("<div class='error'>Debe aceptar los terminos y condiciones*</div>");
               }
             }
              ?>
            <div class="policy">
              <input type="checkbox" name="checkbox" <?php if($checkbox=="true")echo("checked")?>>
              <h3>Acepto todos los terminos y condiciones</h3>
            </div>
            <div class="input-box button">
              <input type="button" id="registrarse"value="Regitrarse" name="register" >
            </div>
            <div class="text">
              <h3>¿Ya tienes una cuenta? <a href="index.php?p=login">Inicia sesión ahora</a></h3>
            </div>
           </form>
         </div>
         <?php
}else{
  ?>
  <section class="login-section">
       <div class="login-box2">
        <h2>Ya has iniciado sesión</h2>
        <p class="login-exito">Se esta redirigiendo a la pagina de inicio. Espere un momento.</p>
        <div class="loader"></div>
      </div>
  
    <script>
      function r(){
        location.href="<?php echo($_SERVER["PHP_SELF"])?>"
      }
      setTimeout("r()",2000);
    </script>
  <?php
}
}
         ?>
       </section>