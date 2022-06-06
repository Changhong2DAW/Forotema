
<script>
function enviar_formulario(){
   document.login.submit()
}
  </script>
<?php
$errores = array();
$user="";
$password="";
$existe=false;
  if(isset($_POST["user"])){
    $user= $_POST["user"];
    if($user==""){
      array_push($errores,"Error 1"); 
    }
  }
  if(isset($_POST["password"])){
    $password= $_POST["password"];
    if($password==""){
      array_push($errores,"Error 2"); 
    }
  }
 
  if(count($errores)==0 && isset($_POST["user"]) && isset($_POST["password"])){
    $existe = user::loguear($user, $password);
    if($existe==false){
     $existe=false;
     array_push($errores,"Error 3"); 
    }
    else{
      foreach($existe as $indice=>$valor){
        if($indice=="user_email"){
          $user_email=$valor;
        }
          if($indice=="user_id"){
            $user_id=$valor;
          }
          if($indice=="user_name"){
            $user_name=$valor;
          }
          if($indice=="user_level"){
            $user_level=$valor;
          }
          if($indice=="user_pass"){
            $user_password=$valor;
          }
      }
      $existe=true;
    }
  }
  if($existe==true){
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_level'] = $user_level;
    $_SESSION['user_password'] = $user_password;
    $_SESSION['sesion'] = true;
    ?>
    <section class="login-section">
       <div class="login-box2">
        <h2>Inicio de sesión correcto</h2>
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
  }else{
    if(!isset($_SESSION["sesion"])){
?>
<section class="login-section">
       <div class="login-box">
        <h2>Login</h2>
        <?php 
             foreach($errores as $indice){
               if($indice=="Error 3"){
                 echo("<h2 class='error3'>No se ha encontrado ninguna cuenta con estos credenciales.</h2>");
               }
             }
              ?>
        <?php 
             foreach($errores as $indice){
               if($indice=="Error 1"){
                 echo("<div class='error2'>Usuario incorrecto.*</div>");
               }
             }
              ?>
        <form method="post" action="<?php echo($_SERVER["PHP_SELF"]."?p=login")?>" name="login">
          <div class="user-box">
            <input type="text" name="user" required="" <?php if($user!="")echo(" value='$user'")?>>
            <label>Usuario</label>
          </div>
          <?php 
             foreach($errores as $indice){
               if($indice=="Error 2"){
                 echo("<div class='error2'>Contraseñá incorrecta.*</div>");
               }
             }
              ?>
          <div class="user-box">
            <input type="password" name="password" required=""<?php if($password!="")echo(" value='$password'")?> >
            <label>Contraseña</label>
          </div>
          <a href="javascript:enviar_formulario()" id="loguear">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Login
          </a>
        </form>
      </div>
    </section>
            <?php
  }
else{
  ?>
   <section class="login-section">
       <div class="login-box2">
        <h2>Ya has iniciado sesión</h2>
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
  ?>