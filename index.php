<?php ?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>Escuela </title>
 <meta name="description" content="">
 <meta name="author" content="">
 <!--Import Google Icon Font-->
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <!--Import materialize.css-->
 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
 <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>

 <!--Let browser know website is optimized for mobile-->
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<script type="text/javascript">

 function ver(vista){
  var vista=$('#vista').val();
  var parametros={
    "vista":vista
  }
  $.ajax({
   data:parametros,
   url:"funciones.php",
   type: "post",

 }).done(function(){

   document.getElementById('titulo').innerHTML = vista.toUpperCase();
   $("#myTable").load('funciones.php',{vista:vista});
   mostrar();
 });
}
function eliminar(id){
 if (confirm("Desea eliminar registro?")){

  var tabla="alumnos"; 
  var parametros={
    "id":id,
    "tabla":tabla
  }
  $.ajax({ 
    type: "POST", 
    url:"eliminar.php",
    data:parametros,
    success: function(data) {
      t(data);
    }
  });
}else{ t('Cancelado');}


}
function eliminarM(id){
 if (confirm("Desea eliminar registro?")){

  var tabla="maestros"; 
  var parametros={
    "id":id,
    "tabla":tabla
  }
  $.ajax({ 
    type: "POST", 
    url:"eliminar.php",
    data:parametros,
    success: function(data) {
      t(data);
    }
  });
}else{ t('Cancelado');}
}
</script>
<body style="background-image: url(src/fondo.png);">
 <div class="navbar-wrapper ">
   <nav class="blue">
     <div class="nav-wrapper">
       <a href="index.php" class="brand-logo">Escuela</a>
       <ul class="right ">

       </ul>
     </div>
   </nav>
 </div>
 <div>
  <ul  id="slide-out" class="sidenav sidenav-fixed">
   <li class="center"><img src="src/logo.png" style="width: 80%"></li>
   <li><div class="divider"></div></li>
   <div class="row" id="columna"> 
    
     <div class="input-field col s12">
      <input id="searchTerm"  type="text" onchange="doSearch()" autocomplete="off">
      <label for="searchTerm">Buscar Nombre:</label>
    </div> 
 
</div>
<li><div class="divider"></div></li>
<li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Agregar</a></li>
<li><a class='dropdown-trigger' href='#' data-target='dropdown2'>Modificar</a></li>
</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
</div>


<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content '>
 <li><a onClick="location.href = 'agregar.php?form=alumnos'" >Alumnos</a></li>
 <li><a onClick="location.href = 'agregar.php?form=maestros'">Maestros</a></li>
 <li><a onClick="location.href = 'agregar.php?form=materias'">Materias</a></li>

</ul>

<!-- Dropdown Structure -->
<ul id='dropdown2' class='dropdown-content'>
 <li><a onClick="location.href = 'modificar.php?form=alumnos'" >Alumnos</a></li>
 <li><a onClick="location.href = 'modificar.php?form=maestros'" >Maestros</a></li>

</ul>
<div class="row">

 <div class="container center" >
  <div class="card-panel" style=" width: 900px">
    <div class="row ">   
      <div class="col s7 offset-s5 grey lighten-4" style="padding: 10px">
        <div class="input-field col s4"> <span>Mostrar lista de:</span></div>
        <div class="col s6">
         <select class="browser-default blue lighten-4" name="vista" id="vista">
           <option value="" disabled selected> Selecciona una opcion</option>
           <option value="alumnos">Alumnos</option>
           <option value="maestros">Maestros</option>
           <option value="materias">Materias</option>
         </select> 
       </div>
       <div class="col s2">
         <div>
          <a class="btn-floating " onclick="ver()"><i class="material-icons">search</i></a>
        </div>
      </div>
    </div></div>
    <div class="row">
      <h3 id="titulo"></h3>
      <table class="highlight">

      </table>
      <div id="myTable">

      </div>

    </div>


  </div>
</div>

<!--<footer class="page-footer blue">
   <div class="container">
        <div class="row">
           <div class="col l6 s12">
              <h5 class="white-text">Footer Content</h5>
              <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
         </div>
         <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Links</h5>
              <ul>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                 <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
            </ul>
       </div>
  </div>
</div>
<div class="footer-copyright">
   <div class="container">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
   </div>
</div>
</footer>
JavaScript at end of body for optimized loading-->

<script type="text/javascript" src="js/jquery-2.1.3.min.js">

</script>


<script type="text/javascript" src="js/materialize.min.js"> </script>
<script type="text/javascript">

  $(document).ready(function(){
      cerrar();
   $('.sidenav').sidenav();
 });
  $('.dropdown-trigger').dropdown({

  });



  function t(message) {
    M.toast({html:message});
  }

</script>
<script type="text/javascript" src="js/init.js" > </script>

</body>

</html>