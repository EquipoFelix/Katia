<?php
session_start();
if (isset($_GET['form']) && !empty($_GET['form'])) {
$_SESSION['form'] =$_GET['form'];# code...
}
$form= $_SESSION['form'];
include('funciones.php');
?>
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
  <div class="container">
    <div class="card-panel">
     <h5 class="black-text center" style="font-family: Times New Roman, Times, serif;"><?php echo strtoupper($form);?></h5>
     <form id="register"  method="post" enctype="multipart/form-data">
      <?php 

      if ($form=='alumnos') {
        ?>
        <div class="row">
          <div class="content_uploader center " style="width: 200px ; height: 200px">
            <div class="box" style="width: 100%" >
              <input class="filefield" type="file" name="archivo" id="archivo" >
              <p class="select_bottom">Seleccionar un archivo</p>  
              <div class="overlay_uploader"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s4">
            <input id="nombre" name="nombre" type="text" class="validate" required="true" pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
            <label for="nombre">Nombre(s) del alumno</label>
          </div>
          <div class="input-field col s4">
            <input id="apellidoP" name="apellidoP" type="text" class="validate"  required="true" pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras. Tamaño máximo: 40" title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
            <label for="apellidoP">Apellido Paterno</label>
          </div>
          <div class="input-field col s4">
            <input id="apellidoM" name="apellidoM" type="text" class="validate"  required="true" pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras. Tamaño máximo: 40" title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
            <label for="apellidoM">Apellido Materno</label>
          </div>
        </div>

        <div class="row">
          <div class=" col s6">
            <label>Grado</label>
            <select class="browser-default  blue lighten-5 " id="grado" name="grado">
              <option value="" disabled selected>Elige el grado</option>
              <?php
              $consulta=db::consulta("grados");
              if (mysqli_num_rows ($consulta) > 0){
                while ( $row_c=mysqli_fetch_array( $consulta )) {
                  $id_grado=$row_c['id_grado'];
                  $nombre_grado=$row_c['nombre_grado'];
                  echo "<option value=\"$id_grado\" >$nombre_grado</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class=" col s6">
            <label>Grupo</label>
            <select class="browser-default  blue lighten-5" id="grupo" name="grupo">
              <option value="" disabled selected>Elige el grupo</option>
              <?php
              $consulta=db::consulta("grupo");
              if (mysqli_num_rows ($consulta) > 0){
                while ( $row_c=mysqli_fetch_array( $consulta )) {
                  $id_grupo=$row_c['id_grupo'];
                  $grupo=$row_c['grupo'];
                  echo "<option value=\"$id_grupo\" >$grupo</option>";
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="domicilio" name="domicilio" type="text" class="validate"  required="true" maxlength="60" minlength="3" pattern="([A-ZÁÉÍÓÚñáéíóúÑa]+[ÁÉÍÓÚñáéíóúÑa-z0-9#.,; ]+[\s]*)*" title="La primera letra debe ser mayuscula. ">
            <label for="domicilio">Domicilio</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="localidad" name="localidad" type="text" class="validate" minlength="3" maxlength="60"  required="true" pattern="([A-ZÁÉÍÓÚñáéíóúÑa]+[ÁÉÍÓÚñáéíóúÑa-z.,; ]+[\s]*)*" title="La primera letra debe ser mayuscula. ">
            <label for="localidad"> Localidad</label>
          </div>
          <div class="input-field col s6">
            <input id="telefono" name="telefono" type="tel" class="validate" maxlength="10" required="true" pattern="\d{10}"  title="Numero a 10 digitos">
            <label for="telefono">Telefono</label>
          </div>
        </div>
        <button class=" btn waves-effect waves-light" id="tabla" name="tabla" value="alumnos" type="submit"> Registrar
          <i class="material-icons right">send</i>
        </button>

        <?php

      }elseif($form=='maestros'){
        ?>

        <div class="row">
          <div class="content_uploader center " style="width: 200px ; height: 200px">
            <div class="box" style="width: 100%" >
              <input class="filefield" type="file" name="archivo" id="archivo" >
              <p class="select_bottom">Seleccionar un archivo</p>  
              <div class="overlay_uploader"></div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s4">
            <input id="nombre" name="nombre" type="text" class="validate" required="true"  pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
            <label for="nombre">Nombre(s) del Maestro</label>
          </div>
          <div class="input-field col s4">
            <input id="apellidoP" name="apellidoP" type="text" class="validate"  required="true"  pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
            <label for="apellidoP">Apellido Paterno</label>
          </div>
          <div class="input-field col s4">
            <input id="apellidoM" name="apellidoM" type="text" class="validate"  required="true"  pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
            <label for="apellidoM">Apellido Materno</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="email" name="email" type="email" class="validate">
            <label for="email">Email</label>
          </div>

          <div class="input-field col s6">
            <input id="domicilio" name="domicilio" type="text" class="validate" maxlength="60"  required="true" minlength="3" pattern="([A-ZÁÉÍÓÚñáéíóúÑa]+[ÁÉÍÓÚñáéíóúÑa-z0-9#.,; ]+[\s]*)*" title="La primera letra debe ser mayuscula. ">
            <label for="domicilio">Domicilio</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input id="localidad" name="localidad" type="text" class="validate" maxlength="60"  required="true" minlength="3" pattern="([A-ZÁÉÍÓÚñáéíóúÑa]+[ÁÉÍÓÚñáéíóúÑa-z.,; ]+[\s]*)*" title="La primera letra debe ser mayuscula. ">
            <label for="localidad"> Localidad</label>
          </div>
          <div class="input-field col s6">
            <input id="telefono" name="telefono" type="number" class="validate"  required="true"  maxlength="10" required="true" pattern="\d{10}"  title="Numero a 10 digitos">
            <label for="telefono">Telefono</label>
          </div>
        </div>

        <button class=" btn waves-effect waves-light" id="tabla" name="tabla" value="maestros" type="submit"> Registrar
         <i class="material-icons right">send</i>
       </button>
       <?php

     }elseif($form=='materias'){
      ?>

      <div class="row">
        <div class="input-field col s9 offset-s1">
          <input id="materia" name="materia" type="text" class="validate" required="true" pattern="([A-ZÁÉÍÓÚñáéíóúÑa]+[ÁÉÍÓÚñáéíóúÑa-z.,; ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
          <label for="materia">Materia</label>
        </div> 
      </div>
      <button class=" btn waves-effect waves-light" id="tabla" name="tabla" value="materias" type="submit"> Registrar
       <i class="material-icons right">send</i>
     </button>
     <?php

   }

   ?>


 </form>
</div>

</div>
</div>
<!--     <footer class="page-footer blue">

        <div class="container ">
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
      
       $('.sidenav').sidenav();
     });
      $('.dropdown-trigger').dropdown({

      });

      $(document).ready(function(){
        $('.select_bottom').click(function(){
          $('.filefield').trigger('click');
        })
        $('.filefield').change(function(){
          if($(this).val()!=''){
            $('.overlay_uploader').show();  

            readURL2(this);
          }
        })
      })

      function readURL2(input) {
        if(input.files[0].type=='image/jpeg' || input.files[0].type=='image/png') {
          $.each(jQuery(input)[0].files, function (i, file) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $('.overlay_uploader').hide();  

              $('.box').css('background-image','url('+ e.target.result+')');
            }
            reader.readAsDataURL(input.files[0]);
          });
        }else{
          $('.overlay_uploader').hide();  

          t("Solo se permiten archivos .jpg y .png",3000);
        }
      }

      function t(message) {
        M.toast({html:message});
      }
      $(document).ready(function(e){
        $("#register").on('submit', function(e){
          e.preventDefault();
          var tabla = $("#tabla").val(); 
          $.ajax({
            type: 'POST',
            url: 'registros.php?tabla='+tabla,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,

            success: function(msg){

              t(msg);
              document.getElementById("register").reset();
                $('.box').css('background','#eeeeee');   //document.write(msg);
              }
            });
        });


      });
    </script>
    <script type="text/javascript" src="js/init.js" > </script>
  </body>

  </html>