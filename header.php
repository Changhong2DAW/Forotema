<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoTema - Inicio</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="fontawesome-free-6.1.1-web/css/all.css" rel="stylesheet">
</head>
<body>
    <header>
     <span id="span-logo"><img src="Logo.png" id="logo"></span>
        <input type="checkbox" id="hamburguesa">
        <label for="hamburguesa" class="fa fa-bars" id="icono"></label>
        <?php
        if(isset($_SESSION["sesion"])){
          ?>
           <ul class="menu">
          <li <?php if($pagina=="principal") echo("class='current'");?>><i class="fa-solid fa-house" id="icono-5"></i> <a href="index.php">Foros</a></li>
          <li <?php if($pagina=="novedades") echo("class='current'");?>><i class="fa-solid fa-fire-flame-curved" id="icono-2"></i> <a href="index.php?p=novedades">Novedades</a></li>
          <li <?php if($pagina=="login") echo("class='current'");?>><i class="fa-solid fa-user" id="icono-3"></i> <a href="index.php?p=miperfil">Mi perfil</a></li>
          <li <?php if($pagina=="login") echo("class='current'");?>><i class="fa-solid fa-arrow-right-to-bracket" id="icono-1"></i> <a href="index.php?p=desconectar">Desconectar</a></li>
          <li><i class="fa-solid fa-magnifying-glass" id="icono-4"></i> Buscar</li>
        </ul>
          <?php
        }
        else{
        
        ?>
        <ul class="menu">
          <li <?php if($pagina=="principal") echo("class='current'");?>><i class="fa-solid fa-house" id="icono-5"></i> <a href="index.php">Foros</a></li>
          <li <?php if($pagina=="novedades") echo("class='current'");?>><i class="fa-solid fa-fire-flame-curved" id="icono-2"></i> <a href="index.php?p=novedades">Novedades</a></li>
          <li <?php if($pagina=="login") echo("class='current'");?>><i class="fa-solid fa-arrow-right-to-bracket" id="icono-1"></i> <a href="index.php?p=login">Acceder</a></li>
          <li <?php if($pagina=="register") echo("class='current'");?>><i class="fa-solid fa-user-plus" id="icono-3"></i> <a href="index.php?p=register">Registro</a></li>
          <li><i class="fa-solid fa-magnifying-glass" id="icono-4"></i> Buscar</li>
        </ul>
        <?php
        }
        ?>
    </header>