<?php
require("lib/conexion.php");
require("lib/fecha.php");
$pagina="principal";
$cuantos=5;
if(isset($_GET["p"])){
    $pagina=$_GET["p"];
}
require("header.php");

include($pagina.".php");



require("footer.php");

?>