<?php
$errores = array();
$username="";
$email="";
$checkbox="false";
$pass1="";
$pass2="";
$msg="";
if(isset($_POST["register"])){
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
if(count($errores)==0 && isset($_POST["register"])){
$user = new user($username,$pass1,$email,date("j-n-Y"),1);
$comprobacion1= $user->comprobaruser();
$comprobacion2= $user->comprobaremail();
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



?>

<section class="register-section">
         <div id="register">
           <h2>Registro</h2>
           <form method="post" action="<?php echo($_SERVER["PHP_SELF"]."?p=register")?>">
             <div class="input-box">
               <?php
               ?>
               <input type="text" placeholder="Nombre de usuario" name="user-name" <?php if($username!="")echo(" value='$username'")?>>
               <?php 
             foreach($errores as $indice){
               if($indice=="Error 1"){
                 echo("<div class='error'>Debe crear un nombre de usuario*</div>");
               }
             }
              ?>
             </div>
             <div class="input-box">
              <input type="email" placeholder="Correo electroníco" name="email" <?php if($email!="")echo(" value='$email'")?>>
              <?php 
             foreach($errores as $indice){
               if($indice=="Error 2"){
                 echo("<div class='error'>Debe introducir su correo electronico*</div>");
               }
             }
              ?>
            </div>
            <div class="input-box">
              <input type="password" placeholder="Inserta contraseña" name="password1" <?php if($pass1!="")echo(" value='$pass1'")?>>
              <?php 
             foreach($errores as $indice){
               if($indice=="Error 3"){
                 echo("<div class='error'>Debe introducir una contraseña*</div>");
               }
             }
              ?>
            </div>
            <div class="input-box">
              <input type="password" placeholder="Repite la contraseña"  name="password2" <?php if($pass2!="")echo(" value='$pass2'")?>>
              <?php 
             foreach($errores as $indice){
               if($indice=="Error 4"){
                 echo("<div class='error'>Ambas contraseñas no coinciden*</div>");
               }
             }
              ?>
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
              <input type="submit" value="Regitrarse" name="register">
            </div>
            <div class="text">
              <h3>¿Ya tienes una cuenta? <a href="index.php?p=login">Inicia sesión ahora</a></h3>
            </div>
           </form>
         </div>
         <?php
}
         ?>
       </section>