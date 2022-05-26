<?php
require("lib/conexion.php");
require("lib/fecha.php");
require("clases/users.php");
require("clases/topics.php");
require("clases/categories.php");
require("clases/posts.php");
$pagina="principal";
$cuantos=5;
if(isset($_GET["p"])){
    $pagina=$_GET["p"];
}
require("header.php");

include($pagina.".php");



require("footer.php");

?>