<?php
if(isset($_SESSION["sesion"])){
if($_SESSION["user_level"] ==0){
	$errores = array();
	if(isset($_POST["crear-cat"])){

	
if(isset($_POST["icono"])){
	$cat_icono=$_POST["icono"];
	if($cat_icono==""){
		array_push($errores,"Error 1"); 
	}
}
if(isset($_POST["cat-name"])){
	$cat_name=$_POST["cat-name"];
	if($cat_name==""){
		array_push($errores,"Error 2"); 
	}else{
		$comprobacion1= categorie::comprobarcat($cat_name);
		if($comprobacion1==true){
			array_push($errores,"Error 4"); 
		  }
	}
}
if(isset($_POST["cat-desc"])){
	$cat_des=$_POST["cat-desc"];
	if($cat_des==""){
		array_push($errores,"Error 3"); 
	}
}

}
if(count($errores)==0 && isset($_POST["crear-cat"])){
		$cat= new categorie($cat_icono,$cat_name,$cat_des,rand(1,6));
		$msg=$cat->crearcat();
?>
<section class="login-section">
       <div class="login-box2">
        <h2>Se ha creado la categoria correctamente</h2>
        <p class="login-exito">Se esta redirigiendo a la pagina de inicio. Espere un momento.</p>
        <div class="loader"></div>
      </div>
    </section>
	<script>
      function r(){
        location.href="<?php echo($_SERVER["PHP_SELF"])?>"
      }
      setTimeout("r()",3000);
    </script>
<?php
}
else{
?>









<section class="section-perfil">
<div class="titulo-crear-cateogoria"><span class="titulo-cat">Crear categoria</span>
    <div class="crear-categoria">
	<a  class='icono-back2' href="index.php?p=perfil"><i class="fa-solid fa-angle-left"></i></a>
	<?php 
             foreach($errores as $indice){
               if($indice=="Error 4"){
                 echo("<div class='error3'>Esta categoria ya existe.*</div>");
               }
             }
              ?>
    <form action="index.php?p=crear_categoria" method="post">
<div class="cat-div"><span class="pregunta-cat">Elige un icono:</span>
<select name="icono" class="select-cat">
     	<option value='#xf26e'>&#xf26e;</option>
		<option value='#xf2b9'>&#xf2b9;</option>
		<option value='#xf2ba'>&#xf2ba;</option>
		<option value='#xf2bb'>&#xf2bb;</option>
		<option value='#xf2bc'>&#xf2bc;</option>
		<option value='#xf042'>&#xf042;</option>
		<option value='#xf170'>&#xf170;</option>
		<option value='#xf037'>&#xf037;</option>
		<option value='#xf039'>&#xf039;</option>
		<option value='#xf036'>&#xf036;</option>
		<option value='#xf038'>&#xf038;</option>
		<option value='#xf270'>&#xf270;</option>
		<option value='#xf0f9'>&#xf0f9;</option>
		<option value='#xf2a3'>&#xf2a3;</option>
		<option value='#xf13d'>&#xf13d;</option>
		<option value='#xf17b'>&#xf17b;</option>
		<option value='#xf209'>&#xf209;</option>
		<option value='#xf103'>&#xf103;</option>
		<option value='#xf100'>&#xf100;</option>
		<option value='#xf101'>&#xf101;</option>
		<option value='#xf102'>&#xf102;</option>
		<option value='#xf107'>&#xf107;</option>
		<option value='#xf104'>&#xf104;</option>
		<option value='#xf105'>&#xf105;</option>
		<option value='#xf106'>&#xf106;</option>
		<option value='#xf179'>&#xf179;</option>
		<option value='#xf187'>&#xf187;</option>
		<option value='#xf1fe'>&#xf1fe;</option>
		<option value='#xf0a'>&#xf0ab;</option>
		<option value='#xf0a8'>&#xf0a8;</option>
		<option value='#xf01a'>&#xf01a;</option>
		<option value='#xf190'>&#xf190;</option>
		<option value='#xf18e'>&#xf18e;</option>
		<option value='#xf01b'>&#xf01b;</option>
		<option value='#xf0a9'>&#xf0a9;</option>
		<option value='#xf0aa'>&#xf0aa;</option>
		<option value='#xf063'>&#xf063;</option>
		<option value='#xf060'>&#xf060;</option>
		<option value='#xf061'>&#xf061;</option>
		<option value='#xf062'>&#xf062;</option>
		<option value='#xf047'>&#xf047;</option>
		<option value='#xf0b'>&#xf0b2;</option>
		<option value='#xf07e'>&#xf07e;</option>
		<option value='#xf07d'>&#xf07d;</option>
		<option value='#xf2a3'>&#xf2a3;</option>
		<option value='#xf2a2'>&#xf2a2;</option>
		<option value='#xf069'>&#xf069;</option>
		<option value='#xf1fa'>&#xf1fa;</option>
		<option value='#xf29e'>&#xf29e;</option>
		<option value='#xf1b9'>&#xf1b9;</option>
		<option value='#xf04a'>&#xf04a;</option>
		<option value='f#xf24e'>&#xf24e;</option>
		<option value='#xf05e'>&#xf05e;</option>
		<option value='#xf2d5'>&#xf2d5;</option>
		<option value='>&#xf19c'>&#xf19c;</option>
		<option value='#xf080'>&#xf080;</option>
		<option value='#xf080'>&#xf080;</option>
		<option value='#xf02a'>&#xf02a;</option>
		<option value='#xf0c9'>&#xf0c9;</option>
		<option value='#xf2cd'>&#xf2cd;</option>
		<option value='#xf2cd'>&#xf2cd;</option>
		<option value='#xf240'>&#xf240;</option>
		<option value='#xf244'>&#xf244;</option>
		<option value='#xf243'>&#xf243;</option>
		<option value='#xf242'>&#xf242;</option>
		<option value='#xf241'>&#xf241;</option>
		<option value='#xf240'>&#xf240;</option>
		<option value='#xf244'>&#xf244;</option>
		<option value='>&#xf240'>&#xf240;</option>
		<option value='#xf242'>&#xf242;</option>
		<option value='#xf243'>&#xf243;</option>
		<option value='#xf241'>&#xf241;</option>
		<option value='#xf236'>&#xf236;</option>
		<option value='#xf0fc'>&#xf0fc;</option>
		<option value='#xf1b4'>&#xf1b4;</option>
		<option value='#xf1b5'>&#xf1b5;</option>
		<option value='#xf0f3'>&#xf0f3;</option>
		<option value='#xf0a2'>&#xf0a2;</option>
		<option value='#xf1f6'>&#xf1f6;</option>
		<option value='#xf1f7'>&#xf1f7;</option>
		<option value='#xf206'>&#xf206;</option>
		<option value='#xf1e5'>&#xf1e5;</option>
		<option value='#xf1fd'>&#xf1fd;</option>
		<option value='#xf171'>&#xf171;</option>
		<option value='#xf172'>&#xf172;</option>
		<option value='#xf15a'>&#xf15a;</option>
		<option value='#xf27e'>&#xf27e;</option>
		<option value='#xf29d'>&#xf29d;</option>
		<option value='#xf293'>&#xf293;</option>
		<option value='#xf294'>&#xf294;</option>
		<option value='#xf032'>&#xf032;</option>
		<option value='#xf0e7'>&#xf0e7;</option>
		<option value='#xf1e2'>&#xf1e2;</option>
		<option value='#xf02d'>&#xf02d;</option>
		<option value='#xf02e'>&#xf02e;</option>
		<option value='#xf097'>&#xf097;</option>
		<option value='#xf2a1'>&#xf2a1;</option>
		<option value='#xf0b1'>&#xf0b1;</option>
		<option value='#xf15a'>&#xf15a;</option>
		<option value='#xf188'>&#xf188;</option>
		<option value='#xf1ad'>&#xf1ad;</option>
		<option value='#xf0f7'>&#xf0f7;</option>
		<option value='#xf0a1'>&#xf0a1;</option>
		<option value='#xf140'>&#xf140;</option>
		<option value='#xf207'>&#xf207;</option>
		<option value='#xf20d'>&#xf20d;</option>
		<option value='#xf1ba'>&#xf1ba;</option>
		<option value='#xf1ec'>&#xf1ec;</option>
		<option value='#xf073'>&#xf073;</option>
		<option value='#xf274'>&#xf274;</option>
		<option value='#xf272'>&#xf272;</option>
		<option value='#xf133'>&#xf133;</option>
		<option value='#xf271'>&#xf271;</option>
		<option value='#xf273'>&#xf273;</option>
		<option value='#xf030'>&#xf030;</option>
		<option value='#xf083'>&#xf083;</option>
		<option value='#xf1b9'>&#xf1b9;</option>
		<option value='#xf0d7'>&#xf0d7;</option>
		<option value='#xf0d9'>&#xf0d9;</option>
		<option value='#xf0da'>&#xf0da;</option>
		<option value='#xf150'>&#xf150;</option>
		<option value='#xf191'>&#xf191;</option>
		<option value='#xf152'>&#xf152;</option>
		<option value='#xf151'>&#xf151;</option>
		<option value='#xf0d8'>&#xf0d8;</option>
		<option value='#xf218'>&#xf218;</option>
		<option value='#xf217'>&#xf217;</option>
		<option value='#xf20a'>&#xf20a;</option>
		<option value='#xf1f3'>&#xf1f3;</option>
		<option value='#xf24c'>&#xf24c;</option>
		<option value='#xf1f2'>&#xf1f2;</option>
		<option value='#xf24b'>&#xf24b;</option>
		<option value='#xf1f1'>&#xf1f1;</option>
		<option value='#xf1f4'>&#xf1f4;</option>
		<option value='#xf1f5'>&#xf1f5;</option>
		<option value='#xf1f0'>&#xf1f0;</option>
		<option value='#xf0a3'>&#xf0a3;</option>
		<option value='#xf0c1'>&#xf0c1;</option>
		<option value='#xf127'>&#xf127;</option>
		<option value='#xf00c'>&#xf00c;</option>
		<option value='#xf058'>&#xf058;</option>
		<option value='#xf05d'>&#xf05d;</option>
		<option value='#xf14a'>&#xf14a;</option>
		<option value='#xf046'>&#xf046;</option>
		<option value='#xf13a'>&#xf13a;</option>
		<option value='#xf137'>&#xf137;</option>
		<option value='#xf138'>&#xf138;</option>
		<option value='#xf139'>&#xf139;</option>
		<option value='#xf078'>&#xf078;</option>
		<option value='#xf053'>&#xf053;</option>
		<option value='#xf054'>&#xf054;</option>
		<option value='#xf077'>&#xf077;</option>
		<option value='#xf1ae'>&#xf1ae;</option>
		<option value='#xf268'>&#xf268;</option>
		<option value='#xf111'>&#xf111;</option>
		<option value='#xf10c'>&#xf10c;</option>
		<option value='#xf1ce'>&#xf1ce;</option>
		<option value='#xf1db'>&#xf1db;</option>
		<option value='#xf0ea'>&#xf0ea;</option>
		<option value='#xf017'>&#xf017;</option>
		<option value='#xf24d'>&#xf24d;</option>
		<option value='#xf00d'>&#xf00d;</option>
		<option value='#xf0c2'>&#xf0c2;</option>
		<option value='#xf0ed'>&#xf0ed;</option>
		<option value='#xf0ee'>&#xf0ee;</option>
		<option value='#xf157'>&#xf157;</option>
		<option value='#xf121'>&#xf121;</option>
		<option value='#xf126'>&#xf126;</option>
		<option value='#xf1cb'>&#xf1cb;</option>
		<option value='#xf284'>&#xf284;</option>
		<option value='#xf0f4'>&#xf0f4;</option>
		<option value='#xf013'>&#xf013;</option>
		<option value='#xf085'>&#xf085;</option>
		<option value='#xf0db'>&#xf0db;</option>
		<option value='#xf075'>&#xf075;</option>
		<option value='#xf0e5'>&#xf0e5;</option>
		<option value='#xf27a'>&#xf27a;</option>
		<option value='#xf27b'>&#xf27b;</option>
		<option value='#xf086'>&#xf086;</option>
		<option value='#xf0e6'>&#xf0e6;</option>
		<option value='#xf14e'>&#xf14e;</option>
		<option value='#xf066'>&#xf066;</option>
		<option value='#xf20'>&#xf20e;</option>
		<option value='#xf26d'>&#xf26d;</option>
		<option value='#xf0c5y'>&#xf0c5;</option>
		<option value='#xf1f'>&#xf1f9;</option>
		<option value='#xf25e'>&#xf25e;</option>
		<option value='#xf09d'>&#xf09d;</option>
		<option value='#xf283'>&#xf283;</option>
		<option value='#xf125'>&#xf125;</option>
		<option value='#xf05b'>&#xf05b;</option>
		<option value='#xf13c'>&#xf13c;</option>
		<option value='#xf1b2'>&#xf1b2;</option>
		<option value='#xf1b3'>&#xf1b3;</option>
		<option value='#xf0c4'>&#xf0c4;</option>
		<option value='#xf0f5'>&#xf0f5;</option>
		<option value='#xf0e4'>&#xf0e4;</option>
		<option value='#xf210'>&#xf210;</option>
		<option value='#xf1c0'>&#xf1c0;</option>
		<option value='#xf2a4'>&#xf2a4;</option>
		<option value='#xf2a4'>&#xf2a4;</option>
		<option value='#xf03b'>&#xf03b;</option>
		<option value='#xf1a5'>&#xf1a5;</option>
		<option value='#xf108'>&#xf108;</option>
		<option value='#xf1bd'>&#xf1bd;</option>
		<option value='#xf219'>&#xf219;</option>
		<option value='#xf1a6'>&#xf1a6;</option>
		<option value='#xf155'>&#xf155;</option>
		<option value='#xf192'>&#xf192;</option>
		<option value='#xf019'>&#xf019;</option>
		<option value='#xf17d'>&#xf17d;</option>
		<option value='#xf2c2'>&#xf2c2;</option>
		<option value='#xf2c3'>&#xf2c3;</option>
		<option value='#xf16'>&#xf16b;</option>
		<option value='#xf1a9'>&#xf1a9;</option>
		<option value='#xf282'>&#xf282;</option>
		<option value='#xf044'>&#xf044;</option>
		<option value='#xf2da'>&#xf2da;</option>
		<option value='#xf052'>&#xf052;</option>
		<option value='#xf141'>&#xf141;</option>
		<option value='#xf142'>&#xf142;</option>
		<option value='#xf1d1'>&#xf1d1;</option>
		<option value='#xf0e0'>&#xf0e0;</option>
		<option value='#xf003'>&#xf003;</option>
		<option value='#xf2b6'>&#xf2b6;</option>
		<option value='#xf2b7'>&#xf2b7;</option>
		<option value='#xf199'>&#xf199;</option>
		<option value='#xf299'>&#xf299;</option>
		<option value='#xf12d'>&#xf12d;</option>
		<option value='#xf2d7'>&#xf2d7;</option>
		<option value='#xf153'>&#xf153;</option>
		<option value='#xf153'>&#xf153;</option>
		<option value='#xf0ec'>&#xf0ec;</option>
		<option value='#xf12'>&#xf12a;</option>
		<option value='#xf06a'>&#xf06a;</option>
		<option value='#xf071'>&#xf071;</option>
		<option value='#xf065'>&#xf065;</option>
		<option value='#xf23e'>&#xf23e;</option>
		<option value='#xf08e'>&#xf08e;</option>
		<option value='#xf14c'>&#xf14c;</option>
		<option value='#xf06e'>&#xf06e;</option>
		<option value='#xf070'>&#xf070;</option>
		<option value='#xf1fb'>&#xf1fb;</option>
		<option value='#xf2b4'>&#xf2b4;</option>
		<option value='#xf09a'>&#xf09a;</option>
		<option value='#xf09a'>&#xf09a;</option>
		<option value='#xf230'>&#xf230;</option>
		<option value='#xf082'>&#xf082;</option>
		<option value='#xf049'>&#xf049;</option>
		<option value='#xf050'>&#xf050;</option>
		<option value='#xf1ac'>&#xf1ac;</option>
		<option value='#xf09e'>&#xf09e;</option>
		<option value='#xf182'>&#xf182;</option>
		<option value='#xf0fb'>&#xf0fb;</option>
		<option value='#xf15b'>&#xf15b;</option>
		<option value='#xf1c6'>&#xf1c6;</option>
		<option value='#xf1c7'>&#xf1c7;</option>
		<option value='#xf1c9'>&#xf1c9;</option>
		<option value='#xf1c3'>&#xf1c3;</option>
		<option value='#xf1c'>&#xf1c5;</option>
		<option value='#xf1c8'>&#xf1c8;</option>
		<option value='#xf016'>&#xf016;</option>
		<option value='#xf1c1'>&#xf1c1;</option>
		<option value='#xf1c5'>&#xf1c5;</option>
		<option value='#xf1c5'>&#xf1c5;</option>
		<option value='#xf1c4'>&#xf1c4;</option>
		<option value='#xf1c7'>&#xf1c7;</option>
		<option value='#xf15c'>&#xf15c;</option>
		<option value='#xf0f6'>&#xf0f6;</option>
		<option value='#xf1c8'>&#xf1c8;</option>
		<option value='#xf1c2'>&#xf1c2;</option>
		<option value='#xf1c6'>&#xf1c6;</option>
		<option value='#xf0c5'>&#xf0c5;</option>
		<option value='#xf008'>&#xf008;</option>
		<option value='#xf0b0'>&#xf0b0;</option>
		<option value='#xf06d'>&#xf06d;</option>
		<option value='#xf134'>&#xf134;</option>
		<option value='#xf269'>&#xf269;</option>
		<option value='#xf2b0'>&#xf2b0;</option>
		<option value='#xf024'>&#xf024;</option>
		<option value='#xf11e'>&#xf11e;</option>
		<option value='#xf11d'>&#xf11d;</option>
		<option value='#xf0e7'>&#xf0e7;</option>
		<option value='#xf0c3'>&#xf0c3;</option>
		<option value='#xf16e'>&#xf16e;</option>
		<option value='#xf0c7'>&#xf0c7;</option>
		<option value='#xf07b'>&#xf07b;</option>
		<option value='#xf114'>&#xf114;</option>
		<option value='#xf07c'>&#xf07c;</option>
		<option value='#xf115'>&#xf115;</option>
		<option value='#xf031'>&#xf031;</option>
		<option value='#xf2b4'>&#xf2b4;</option>
		<option value='#xf280'>&#xf280;</option>
		<option value='#xf286'>&#xf286;</option>
		<option value='#xf211'>&#xf211;</option>
		<option value='#xf04e'>&#xf04e;</option>
		<option value='#xf180'>&#xf180;</option>
		<option value='#xf2c5'>&#xf2c5;</option>
		<option value='#xf119'>&#xf119;</option>
		<option value='#xf1e3'>&#xf1e3;</option>
		<option value='#xf11b'>&#xf11b;</option>
		<option value='#xf0e3'>&#xf0e3;</option>
		<option value='#xf154'>&#xf154;</option>
		<option value='#xf1d1'>&#xf1d1;</option>
		<option value='#xf013'>&#xf013;</option>
		<option value='#xf085'>&#xf085;</option>
		<option value='#xf22d'>&#xf22d;</option>
		<option value='#xf265'>&#xf265;</option>
		<option value='#xf260'>&#xf260;</option>
		<option value='#xf261'>&#xf261;</option>
		<option value='#xf06b'>&#xf06b;</option>
		<option value='#xf1d3'>&#xf1d3;</option>
		<option value='#xf1d2'>&#xf1d2;</option>
		<option value='#xf09b'>&#xf09b;</option>
		<option value='#xf113'>&#xf113;</option>
		<option value='#xf092'>&#xf092;</option>
		<option value='#xf296'>&#xf296;</option>
		<option value='#xf184'>&#xf184;</option>
		<option value='#xf000'>&#xf000;</option>
		<option value='#xf2a5'>&#xf2a5;</option>
		<option value='#xf2a6'>&#xf2a6;</option>
		<option value='#xf0ac'>&#xf0ac;</option>
		<option value='#xf1a0'>&#xf1a0;</option>
		<option value='#xf0d5'>&#xf0d5;</option>
		<option value='#xf2b3'>&#xf2b3;</option>
		<option value='#xf2b3'>&#xf2b3;</option>
		<option value='#xf0d4'>&#xf0d4;</option>
		<option value='#xf1ee'>&#xf1ee;</option>
		<option value='#xf19d'>&#xf19d;</option>
		<option value='#xf184'>&#xf184;</option>
		<option value='#xf2d6'>&#xf2d6;</option>
		<option value='#xf0c0'>&#xf0c0;</option>
		<option value='#xf0fd'>&#xf0fd;</option>
		<option value='#xf1d4'>&#xf1d4;</option>
		<option value='#xf255'>&#xf255;</option>
		<option value='#xf258'>&#xf258;</option>
		<option value='#xf0a7'>&#xf0a7;</option>
		<option value='#xf0a5'>&#xf0a5;</option>
		<option value='#xf0a4'>&#xf0a4;</option>
		<option value='#xf0a6'>&#xf0a6;</option>
		<option value='#xf256'>&#xf256;</option>
		<option value='#xf25b'>&#xf25b;</option>
		<option value='#xf25a'>&#xf25a;</option>
		<option value='#xf255'>&#xf255;</option>
		<option value='#xf257'>&#xf257;</option>
		<option value='#xf259'>&#xf259;</option>
		<option value='#xf256'>&#xf256;</option>
		<option value='#xf2b5'>&#xf2b5;</option>
		<option value='#xf2a4'>&#xf2a4;</option>
		<option value='#xf292'>&#xf292;</option>
		<option value='#xf0a0'>&#xf0a0;</option>
		<option value='#xf1dc'>&#xf1dc;</option>
		<option value='#xf025'>&#xf025;</option>
		<option value='#xf004'>&#xf004;</option>
		<option value='#xf08a'>&#xf08a;</option>
		<option value='#xf21e'>&#xf21e;</option>
		<option value='#xf1da'>&#xf1da;</option>
		<option value='#xf015'>&#xf015;</option>
		<option value='#xf0f8'>&#xf0f8;</option>
		<option value='#xf236'>&#xf236;</option>
		<option value='#xf254'>&#xf254;</option>
		<option value='#xf251'>&#xf251;</option>
		<option value='#xf252'>&#xf252;</option>
		<option value='#xf253'>&#xf253;</option>
		<option value='#xf253'>&#xf253;</option>
		<option value='#xf252'>&#xf252;</option>
		<option value='#xf250'>&#xf250;</option>
		<option value='#xf251'>&#xf251;</option>
		<option value='#xf27c'>&#xf27c;</option>
		<option value='#xf13b'>&#xf13b;</option>
		<option value='#xf246'>&#xf246;</option>
		<option value='#xf2c1'>&#xf2c1;</option>
		<option value='#xf2c2'>&#xf2c2;</option>
		<option value='#xf2c3'>&#xf2c3;</option>
		<option value='#xf20b'>&#xf20b;</option>
		<option value='#xf03e'>&#xf03e;</option>
		<option value='#xf2d8'>&#xf2d8;</option>
		<option value='#xf01c'>&#xf01c;</option>
		<option value='#xf03c'>&#xf03c;</option>
		<option value='#xf275'>&#xf275;</option>
		<option value='#xf129'>&#xf129;</option>
		<option value='#xf05a'>&#xf05a;</option>
		<option value='#xf156'>&#xf156;</option>
		<option value='#xf16d'>&#xf16d;</option>
		<option value='#xf19c'>&#xf19c;</option>
		<option value='#xf26b'>&#xf26b;</option>
		<option value='#xf224'>&#xf224;</option>
		<option value='#xf208'>&#xf208;</option>
		<option value='#xf033'>&#xf033;</option>
		<option value='#xf1aa'>&#xf1aa;</option>
		<option value='#xf157'>&#xf157;</option>
		<option value='#xf1cc'>&#xf1cc;</option>
		<option value='#xf084'>&#xf084;</option>
		<option value='#xf11c'>&#xf11c;</option>
		<option value='#xf159'>&#xf159;</option>
		<option value='#xf1ab'>&#xf1ab;</option>
		<option value='#xf109'>&#xf109;</option>
		<option value='#xf202'>&#xf202;</option>
		<option value='#xf203'>&#xf203;</option>
		<option value='#xf06c'>&#xf06c;</option>
		<option value='#xf212'>&#xf212;</option>
		<option value='#xf0e3'>&#xf0e3;</option>
		<option value='#xf094'>&#xf094;</option>
		<option value='#xf149'>&#xf149;</option>
		<option value='#xf148'>&#xf148;</option>
		<option value='#xf1cd'>&#xf1cd;</option>
		<option value='#xf1cd'>&#xf1cd;</option>
		<option value='#xf1cd'>&#xf1cd;</option>
		<option value='#xf1cd'>&#xf1cd;</option>
		<option value='#xf0eb'>&#xf0eb;</option>
		<option value='#xf201'>&#xf201;</option>
		<option value='#xf0c1'>&#xf0c1;</option>
		<option value='#xf0e1'>&#xf0e1;</option>
		<option value='#xf08c'>&#xf08c;</option>
		<option value='#xf2b8'>&#xf2b8;</option>
		<option value='#xf17c'>&#xf17c;</option>
		<option value='#xf03a'>&#xf03a;</option>
		<option value='#xf022'>&#xf022;</option>
		<option value='#xf0cb'>&#xf0cb;</option>
		<option value='#xf0ca'>&#xf0ca;</option>
		<option value='#xf124'>&#xf124;</option>
		<option value='#xf023'>&#xf023;</option>
		<option value='#xf175'>&#xf175;</option>
		<option value='#xf177'>&#xf177;</option>
		<option value='#xf178'>&#xf178;</option>
		<option value='#xf176'>&#xf176;</option>
		<option value='#xf2a8'>&#xf2a8;</option>
		<option value='#xf0d0'>&#xf0d0;</option>
		<option value='#xf076'>&#xf076;</option>
		<option value='#xf064'>&#xf064;</option>
		<option value='#xf112'>&#xf112;</option>
		<option value='#xf122'>&#xf122;</option>
		<option value='#xf183'>&#xf183;</option>
		<option value='#xf279'>&#xf279;</option>
		<option value='#xf041'>&#xf041;</option>
		<option value='#xf278'>&#xf278;</option>
		<option value='#xf276'>&#xf276;</option>
		<option value='#xf277'>&#xf277;</option>
		<option value='#xf222'>&#xf222;</option>
		<option value='#xf227'>&#xf227;</option>
		<option value='#xf229'>&#xf229;</option>
		<option value='#xf22b'>&#xf22b;</option>
		<option value='#xf22a'>&#xf22a;</option>
		<option value='#xf136'>&#xf136;</option>
		<option value='#xf20c'>&#xf20c;</option>
		<option value='#xf23a'>&#xf23a;</option>
		<option value='#xf0fa'>&#xf0fa;</option>
		<option value='#xf2e0'>&#xf2e0;</option>
		<option value='#xf11a'>&#xf11a;</option>
		<option value='#xf223'>&#xf223;</option>
		<option value='#xf2db'>&#xf2db;</option>
		<option value='#xf130'>&#xf130;</option>
		<option value='#xf131h'>&#xf131;</option>
		<option value='#xf068'>&#xf068;</option>
		<option value='#xf056'>&#xf056;</option>
		<option value='#xf146'>&#xf146;</option>
		<option value='#xf147'>&#xf147;</option>
		<option value='#xf289'>&#xf289;</option>
		<option value='#xf10b'>&#xf10b;</option>
		<option value='#xf285'>&#xf285;</option>
		<option value='#xf0d6'>&#xf0d6;</option>
		<option value='#xf186'>&#xf186;</option>
		<option value='#xf19d'>&#xf19d;</option>
		<option value='#xf21c'>&#xf21c;</option>
		<option value='#xf245'>&#xf245;</option>
		<option value='#xf001'>&#xf001;</option>
		<option value='#xf0c9'>&#xf0c9;</option>
		<option value='#xf22c'>&#xf22c;</option>
		<option value='#xf1ea'>&#xf1ea;</option>
		<option value='#xf247'>&#xf247;</option>
		<option value='#xf248'>&#xf248;</option>
		<option value='#xf263'>&#xf263;</option>
		<option value='#xf264'>&#xf264;</option>
		<option value='#xf23d'>&#xf23d;</option>
		<option value='#xf19b'>&#xf19b;</option>
		<option value='#xf26a'>&#xf26a;</option>
		<option value='#xf23c'>&#xf23c;</option>
		<option value='#xf03'>&#xf03b;</option>
		<option value='#xf18c'>&#xf18c;</option>
		<option value='#xf1fc'>&#xf1fc;</option>
		<option value='#xf1d8'>&#xf1d8;</option>
		<option value='#xf1d9'>&#xf1d9;</option>
		<option value='#xf0c6'>&#xf0c6;</option>
		<option value='#xf1dd'>&#xf1dd;</option>
		<option value='#xf0ea'>&#xf0ea;</option>
		<option value='#xf04c'>&#xf04c;</option>
		<option value='#xf28b'>&#xf28b;</option>
		<option value='#xf28c'>&#xf28c;</option>
		<option value='#xf1b0'>&#xf1b0;</option>
		<option value='#xf1ed'>&#xf1ed;</option>
		<option value='#xf040'>&#xf040;</option>
		<option value='#xf14b'>&#xf14b;</option>
		<option value='#xf044'>&#xf044;</option>
		<option value='#xf295'>&#xf295;</option>
		<option value='#xf095'>&#xf095;</option>
		<option value='#xf098'>&#xf098;</option>
		<option value='#xf03e'>&#xf03e;</option>
		<option value='#xf03e'>&#xf03e;</option>
		<option value='#xf200'>&#xf200;</option>
		<option value='#xf2ae'>&#xf2ae;</option>
		<option value='#xf1a8'>&#xf1a8;</option>
		<option value='#xf1a7'>&#xf1a7;</option>
		<option value='#xf0d2'>&#xf0d2;</option>
		<option value='#xf231'>&#xf231;</option>
		<option value='#xf0d3'>&#xf0d3;</option>
		<option value='#xf072'>&#xf072;</option>
		<option value='#xf04b'>&#xf04b;</option>
		<option value='#xf144'>&#xf144;</option>
		<option value='#xf01d'>&#xf01d;</option>
		<option value='#xf1e6'>&#xf1e6;</option>
		<option value='#xf067'>&#xf067;</option>
		<option value='#xf055'>&#xf055;</option>
		<option value='#xf0fe'>&#xf0fe;</option>
		<option value='#xf196'>&#xf196;</option>
		<option value='#xf2ce'>&#xf2ce;</option>
		<option value='#xf011'>&#xf011;</option>
		<option value='#xf02f'>&#xf02f;</option>
		<option value='#xf288'>&#xf288;</option>
		<option value='#xf12e'>&#xf12e;</option>
		<option value='#xf1d6'>&#xf1d6;</option>
		<option value='#xf029'>&#xf029;</option>
		<option value='#xf128'>&#xf128;</option>
		<option value='#xf059'>&#xf059;</option>
		<option value='#xf29c'>&#xf29c;</option>
		<option value='#xf2c4'>&#xf2c4;</option>
		<option value='#xf10d'>&#xf10d;</option>
		<option value='#xf10e'>&#xf10e;</option>
		<option value='#xf1d0'>&#xf1d0;</option>
		<option value='#xf074'>&#xf074;</option>
		<option value='#xf2d9'>&#xf2d9;</option>
		<option value='#xf1d0'>&#xf1d0;</option>
		<option value='#xf1b8'>&#xf1b8;</option>
		<option value='#xf1a1'>&#xf1a1;</option>
		<option value='>&#xf281'>&#xf281;</option>
		<option value='#xf1a2'>&#xf1a2;</option>
		<option value='#xf021'>&#xf021;</option>
		<option value='#xf25d'>&#xf25d;</option>
		<option value='#xf00d'>&#xf00d;</option>
		<option value='#xf18b'>&#xf18b;</option>
		<option value='#xf0c9'>&#xf0c9;</option>
		<option value='#xf01e'>&#xf01e;</option>
		<option value='#xf112'>&#xf112;</option>
		<option value='#xf122'>&#xf122;</option>
		<option value='#xf1d0'>&#xf1d0;</option>
		<option value='#xf079'>&#xf079;</option>
		<option value='#xf157'>&#xf157;</option>
		<option value='#xf018'>&#xf018;</option>
		<option value='#xf135'>&#xf135;</option>
		<option value='#xf0e2'>&#xf0e2;</option>
		<option value='#xf01e'>&#xf01e;</option>
		<option value='#xf158'>&#xf158;</option>
		<option value='#xf09e'>&#xf09e;</option>
		<option value='#xf143'>&#xf143;</option>
		<option value='#xf156'>&#xf156;</option>
		<option value='#xf2cd'>&#xf2cd;</option>
		<option value='#xf267'>&#xf267;</option>
		<option value='#xf0c7'>&#xf0c7;</option>
		<option value='#xf0c4'>&#xf0c4;</option>
		<option value='#xf28a'>&#xf28a;</option>
		<option value='#xf002'>&#xf002;</option>
		<option value='#xf010'>&#xf010;</option>
		<option value='#xf00e'>&#xf00e;</option>
		<option value='#xf213'>&#xf213;</option>
		<option value='#xf1d8'>&#xf1d8;</option>
		<option value='#xf1d9'>&#xf1d9;</option>
		<option value='#xf233'>&#xf233;</option>
		<option value='#xf064'>&#xf064;</option>
		<option value='#xf1e0'>&#xf1e0;</option>
		<option value='#xf1e1'>&#xf1e1;</option>
		<option value='#xf14d'>&#xf14d;</option>
		<option value='#xf045'>&#xf045;</option>
		<option value='#xf20b'>&#xf20b;</option>
		<option value='#xf132'>&#xf132;</option>
		<option value='#xf21a'>&#xf21a;</option>
		<option value='#xf214'>&#xf214;</option>
		<option value='#xf290'>&#xf290;</option>
		<option value='#xf291'>&#xf291;</option>
		<option value='#xf07a'>&#xf07a;</option>
		<option value='#xf2cc'>&#xf2cc;</option>
		<option value='#xf090'>&#xf090;</option>
		<option value='#xf2a7'>&#xf2a7;</option>
		<option value='#xf08b'>&#xf08b;</option>
		<option value='#xf012'>&#xf012;</option>
		<option value='#xf2a7'>&#xf2a7;</option>
		<option value='#xf215'>&#xf215;</option>
		<option value='#xf0e8'>&#xf0e8;</option>
		<option value='#xf216'>&#xf216;</option>
		<option value='#xf17e'>&#xf17e;</option>
		<option value='#xf198'>&#xf198;</option>
		<option value='#xf1de'>&#xf1de;</option>
		<option value='#xf1e7'>&#xf1e7;</option>
		<option value='#xf118'>&#xf118;</option>
		<option value='#xf2ab'>&#xf2ab;</option>
		<option value='#xf2ac'>&#xf2ac;</option>
		<option value='#xf2ad'>&#xf2ad;</option>
		<option value='#xf2dc'>&#xf2dc;</option>
		<option value='#xf1e3'>&#xf1e3;</option>
		<option value='#xf0dc'>&#xf0dc;</option>
		<option value='#xf15d'>&#xf15d;</option>
		<option value='#xf15e'>&#xf15e;</option>
		<option value='#xf160'>&#xf160;</option>
		<option value='#xf161'>&#xf161;</option>
		<option value='#xf0de'>&#xf0de;</option>
		<option value='#xf0dd'>&#xf0dd;</option>
		<option value='#xf0dd'>&#xf0dd;</option>
		<option value='#xf162'>&#xf162;</option>
		<option value='#xf163'>&#xf163;</option>
		<option value='#xf0de'>&#xf0de;</option>
		<option value='#xf1be'>&#xf1be;</option>
		<option value='#xf197'>&#xf197;</option>
		<option value='#xf110'>&#xf110;</option>
		<option value='#xf1b1'>&#xf1b1;</option>
		<option value='#xf1bc'>&#xf1bc;</option>
		<option value='#xf0c8'>&#xf0c8;</option>
		<option value='#xf096'>&#xf096;</option>
		<option value='#xf18de'>&#xf18d;</option>
		<option value='#xf16c'>&#xf16c;</option>
		<option value='#xf005'>&#xf005;</option>
		<option value='#xf089'>&#xf089;</option>
		<option value='#xf123'>&#xf123;</option>
		<option value='#xf006'>&#xf006;</option>
		<option value='#xf1b6'>&#xf1b6;</option>
		<option value='#xf1b7'>&#xf1b7;</option>
		<option value='#xf048'>&#xf048;</option>
		<option value='#xf051'>&#xf051;</option>
		<option value='#xf0f1'>&#xf0f1;</option>
		<option value='#xf249'>&#xf249;</option>
		<option value='#xf24a'>&#xf24a;</option>
		<option value='#xf04d'>&#xf04d;</option>
		<option value='#xf28d'>&#xf28d;</option>
		<option value='#xf28e'>&#xf28e;</option>
		<option value='#xf21d'>&#xf21d;</option>
		<option value='#xf0cc'>&#xf0cc;</option>
		<option value='#xf1a4'>&#xf1a4;</option>
		<option value='#xf1a3'>&#xf1a3;</option>
		<option value='#xf12c'>&#xf12c;</option>
		<option value='#xf239'>&#xf239;</option>
		<option value='#xf0f2'>&#xf0f2;</option>
		<option value='#xf185'>&#xf185;</option>
		<option value='#xf2dd'>&#xf2dd;</option>
		<option value='#xf12b'>&#xf12b;</option>
		<option value='#xf1cd'>&#xf1cd;</option>
		<option value='#xf0ce'>&#xf0ce;</option>
		<option value='#xf10a'>&#xf10a;</option>
		<option value='#xf0e4'>&#xf0e4;</option>
		<option value='#xf02b'>&#xf02b;</option>
		<option value='#xf02c'>&#xf02c;</option>
		<option value='#xf0ae'>&#xf0ae;</option>
		<option value='#xf1ba'>&#xf1ba;</option>
		<option value='#xf2c6'>&#xf2c6;</option>
		<option value='#xf26c'>&#xf26c;</option>
		<option value='#xf1d5'>&#xf1d5;</option>
		<option value='#xf120'>&#xf120;</option>
		<option value='#xf034'>&#xf034;</option>
		<option value='#xf035'>&#xf035;</option>
		<option value='#xf00a'>&#xf00a;</option>
		<option value='#xf009'>&#xf009;</option>
		<option value='#xf00b'>&#xf00b;</option>
		<option value='#xf2b2'>&#xf2b2;</option>
		<option value='#xf2c7'>&#xf2c7;</option>
		<option value='#xf2cb'>&#xf2cb;</option>
		<option value='#xf2ca'>&#xf2ca;</option>
		<option value='#xf2c9;'>&#xf2c9;</option>
		<option value='#xf2c8'>&#xf2c8;</option>
		<option value='#xf2c7'>&#xf2c7;</option>
		<option value='#xf2cb'>&#xf2cb;</option>
		<option value='#xf2c7'>&#xf2c7;</option>
		<option value='#xf2c9'>&#xf2c9;</option>
		<option value='#xf2ca'>&#xf2ca;</option>
		<option value='#xf2c'>&#xf2c8;</option>
		<option value='#xf08d'>&#xf08d;</option>
		<option value='#xf165'>&#xf165;</option>
		<option value='#xf088'>&#xf088;</option>
		<option value='#xf087'>&#xf087;</option>
		<option value='#xf164'>&#xf164;</option>
		<option value='#xf145'>&#xf145;</option>
		<option value='#xf00d'>&#xf00d;</option>
		<option value='#xf057'>&#xf057;</option>
		<option value='#xf05c'>&#xf05c;</option>
		<option value='#xf2d3'>&#xf2d3;</option>
		<option value='#xf2d4'>&#xf2d4;</option>
		<option value='#xf043'>&#xf043;</option>
		<option value='#xf150'>&#xf150;</option>
		<option value='#xf191'>&#xf191;</option>
		<option value='#xf204'>&#xf204;</option>
		<option value='#xf205'>&#xf205;</option>
		<option value='#xf152'>&#xf152;</option>
		<option value='#xf151'>&#xf151;</option>
		<option value='#xf25c'>&#xf25c;</option>
		<option value='#xf238'>&#xf238;</option>
		<option value='#xf224'>&#xf224;</option>
		<option value='#xf225'>&#xf225;</option>
		<option value='#xf1f8'>&#xf1f8;</option>
		<option value='#xf014'>&#xf014;</option>
		<option value='#xf1bb'>&#xf1bb;</option>
		<option value='#xf181'>&#xf181;</option>
		<option value='#xf262'>&#xf262;</option>
		<option value='#xf091'>&#xf091;</option>
		<option value='#xf0d1'>&#xf0d1;</option>
		<option value='#xf195'>&#xf195;</option>
		<option value='#xf1e4'>&#xf1e4;</option>
		<option value='#xf173'>&#xf173;</option>
		<option value='#xf174'>&#xf174;</option>
		<option value='#xf195'>&#xf195;</option>
		<option value='#xf26c'>&#xf26c;</option>
		<option value='#xf1e8'>&#xf1e8;</option>
		<option value='#xf099'>&#xf099;</option>
		<option value='#xf081'>&#xf081;</option>
		<option value='#xf0e9'>&#xf0e9;</option>
		<option value='#xf0cd'>&#xf0cd;</option>
		<option value='#xf0e2'>&#xf0e2;</option>
		<option value='#xf29a'>&#xf29a;</option>
		<option value='#xf19c'>&#xf19c;</option>
		<option value='#xf127'>&#xf127;</option>
		<option value='#xf09c'>&#xf09c;</option>
		<option value='#xf13e'>&#xf13e;</option>
		<option value='#xf0dc'>&#xf0dc;</option>
		<option value='#xf093'>&#xf093;</option>
		<option value='#xf287'>&#xf287;</option>
		<option value='#xf155'>&#xf155;</option>
		<option value='#xf007'>&#xf007;</option>
		<option value='#xf2bd'>&#xf2bd;</option>
		<option value='#xf2be'>&#xf2be;</option>
		<option value='#xf0f'>&#xf0f0;</option>
		<option value='#xf2c0'>&#xf2c0;</option>
		<option value='#xf234'>&#xf234;</option>
		<option value='#xf21b'>&#xf21b;</option>
		<option value='#xf235'>&#xf235;</option>
		<option value='#xf0c0'>&#xf0c0;</option>
		<option value='#xf2bb'>&#xf2bb;</option>
		<option value='#xf2bc'>&#xf2bc;</option>
		<option value='#xf221'>&#xf221;</option>
		<option value='#xf226'>&#xf226;</option>
		<option value='#xf228'>&#xf228;</option>
		<option value='#xf23'>&#xf237;</option>
		<option value='#xf2a9'>&#xf2a9;</option>
		<option value='#xf2aa'>&#xf2aa;</option>
		<option value='#xf03d'>&#xf03d;</option>
		<option value='#xf27d'>&#xf27d;</option>
		<option value='#xf194'>&#xf194;</option>
		<option value='#xf1ca'>&#xf1ca;</option>
		<option value='#xf189'>&#xf189;</option>
		<option value='#xf2a0'>&#xf2a0;</option>
		<option value='#xf027'>&#xf027;</option>
		<option value='#xf026'>&#xf026;</option>
		<option value='#xf028'>&#xf028;</option>
		<option value='#xf071'>&#xf071;</option>
		<option value='#xf1d7'>&#xf1d7;</option>
		<option value='#xf18a'>&#xf18a;</option>
		<option value='#xf1d7'>&#xf1d7;</option>
		<option value='#xf232'>&#xf232;</option>
		<option value='#xf193'>&#xf193;</option>
		<option value='#xf29b'>&#xf29b;</option>
		<option value='#xf1eb'>&#xf1eb;</option>
		<option value='#xf266'>&#xf266;</option>
		<option value='#xf2d3'>&#xf2d3;</option>
		<option value='#xf2d4'>&#xf2d4;</option>
		<option value='#xf2d0'>&#xf2d0;</option>
		<option value='#xf2d1'>&#xf2d1;</option>
		<option value='#xf2d2'>&#xf2d2;</option>
		<option value='#xf17a'>&#xf17a;</option>
		<option value='#xf159'>&#xf159;</option>
		<option value='#xf19a'>&#xf19a;</option>
		<option value='#xf297'>&#xf297;</option>
		<option value='#xf2de'>&#xf2de;</option>
		<option value='#xf298'>&#xf298;</option>
		<option value='#xf0ad'>&#xf0ad;</option>
		<option value='#xf168'>&#xf168;</option>
		<option value='#xf169'>&#xf169;</option>
		<option value='#xf23b'>&#xf23b;</option>
		<option value='#xf1d4'>&#xf1d4;</option>
		<option value='#xf19e'>&#xf19e;</option>
		<option value='#xf23b'>&#xf23b;</option>
		<option value='#xf1d4'>&#xf1d4;</option>
		<option value='#xf1e9'>&#xf1e9;</option>
		<option value='#xf157'>&#xf157;</option>
		<option value='#xf2b1'>&#xf2b1;</option>
		<option value='#xf167'>&#xf167;</option>
		<option value='#xf16a'>&#xf16a;</option>
		<option value='#xf166'>&#xf166;</option>
</select>
</div>


        <div class="cat-div">
	
            <span class="pregunta-cat">Nombre de la categoria:</span>
			<?php 
             foreach($errores as $indice){
               if($indice=="Error 2"){
                 echo("<div class='error3'>Debe crear un nombre para la categoria.*</div>");
               }
             }
              ?>
        <input type="text" class="nombre-cat"name="cat-name" value="<?php if(isset($cat_name))echo($cat_name)?>">

        </div>
        <div class="cat-div">
	
            <span class="pregunta-cat">Descripción de la categoria:</span>
			<?php 
             foreach($errores as $indice){
               if($indice=="Error 3"){
                 echo("<div class='error3'>Debe crear una descripción.*</div>");
               }
             }
              ?>
        <textarea name="cat-desc" class="desc-cat"><?php if(isset($cat_des))echo($cat_des)?></textarea>
		<div class="input-box3 button">
	<input type=submit name='crear-cat' value='Crear' class="input-editar3">
      </div>
        </div>
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
}else{
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