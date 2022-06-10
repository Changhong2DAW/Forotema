

  $("#registrarse").click(usuario);
function animacion(){
  if($("#boton-ocultar").val() == "ocultar"){
    $(".tema").slideDown(300,function(){
      $("#boton-ocultar").val("mostrar");
    })
  }else{
    $(".tema").slideUp(300,function(){
      $("#boton-ocultar").val("ocultar");
    }
)}
};

var container = document.querySelectorAll('#titulo-entrada');

for(var i=0; i<container.length;i++){
  var cadena =container[i].innerHTML;
  if(cadena.length>33){
    cadena=cadena.substr(0,33)+"...";
    container[i].innerHTML=cadena;
  }
}


function usuario(){
var form =document.getElementById("formularioregistro");
var exp_regemail = /^[A-Za-z0-9+.-]+@(.+)$/;
var exp_reg_pass = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;
var exp_user_name = /^[A-Za-z][A-Za-z0-9_]{5,14}$/;
var username = $("#username").val();
var password = $("#pass1").val();
var password2 = $("#pass2").val();
var correo = $("#email").val();
var seguir=true;

if(!exp_user_name.test(username)){
  document.getElementById("error1").innerHTML="6 caracteres minimo.";
  seguir=false;
}else{
  document.getElementById("error1").innerHTML=" ";
}

if(!exp_regemail.test(correo)){
  document.getElementById("error2").innerHTML="El correo no es correcto.<br>";
seguir=false;
}else{
  document.getElementById("error2").innerHTML=" ";
}
if(!exp_reg_pass.test(password)){
  document.getElementById("error3").innerHTML="8 caracteres, una mayuscula, un numero<br>";
  seguir=false;
}else{
  document.getElementById("error3").innerHTML=" ";
}
if(password==password2){
  document.getElementById("error4").innerHTML=" ";
}else{
  document.getElementById("error4").innerHTML="Las contraseñas no coinciden ";
  seguir=false;
}

if(seguir==true){
  form.submit();
}


}

function link_crear_categoria() {
  
    window.location.href='index.php?p=crear_categoria';

  }
  function link_administrar_usuarios() {
    window.location.href='index.php?p=administrar_usuarios';
  }
  function link_mis_entradas() {
    window.location.href='index.php?p=mis_entradas';
  }
  function link_crear_entrada() {
    window.location.href='index.php?p=crear_entrada';
  }

  let slider = document.querySelector(".slider-contenedor")
  let sliderIndividual = document.querySelectorAll(".contenido-slider")
  let contador = 1;
  let width = sliderIndividual[0].clientWidth;
  let intervalo = 5000;
  
  window.addEventListener("resize", function(){
      width = sliderIndividual[0].clientWidth;
  })
  
  setInterval(function(){
      slides();
  },intervalo);
  
  
  
  function slides(){
      slider.style.transform = "translate("+(-width*contador)+"px)";
      slider.style.transition = "transform .8s";
      contador++;
  
      if(contador == sliderIndividual.length){
          setTimeout(function(){
              slider.style.transform = "translate(0px)";
              slider.style.transition = "transform 0s";
              contador=1;
          },1500)
      }
  }
 