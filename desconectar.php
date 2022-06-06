<?php
session_destroy();
?>
  <section class="login-section">
       <div class="login-box2">
        <h2>Se ha desconectado de su sesión correctamente.</h2>
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