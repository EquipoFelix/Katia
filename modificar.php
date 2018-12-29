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
<script type="text/javascript">
  function ver(nc,tabla){
    var nc=$('#nc').val();
    var tabla= '<?php echo $form;?>';
    var parametros={
      "nc":nc,
      "tabla":tabla
    }
    $.ajax({
     data:parametros,
     url:"modificar1.php",
     type: "post",

   }).done(function(){
     $("#form").load('modificar1.php',{nc:nc,tabla:tabla});
   });
 }

</script>
<body style="background-image: url(src/fondo.png);">
 <div>
   <nav class="blue">
     <div class="nav-wrapper">
       <a href="index.php" class="brand-logo">Escuela</a>
       <ul class="right">
        <li>
          <div class="input-field">
            Buscar Numero de control:
          </div>
        </li>
        <li>    
          <div class="row">
            <div class="input-field col s8 ">

              <input class="white"   id="nc" name="nc" type="text" class="validate" required >
              
            </div>
            <div class=" input-field col s1"> 
              <a class="btn-floating btn-large waves-effect waves-light "  onclick="ver()"><i class="material-icons">search</i></a>
            </div>
          </div>
        </li>
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
     <h5 class="black-text center"  style="font-family: Times New Roman, Times, serif;"><?php echo strtoupper($form);?></h5>
     <form id="modificar"  method="post" enctype="multipart/form-data">

      <div class="row">
        <div class="col s12" id="form" name="form" >
        </div>
      </div>
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
        $("#modificar").on('submit', function(e){
          e.preventDefault();
          var tabla1 = $("#tabla1").val(); 
          $.ajax({
            type: 'POST',
            url: 'modificar1.php?tabla1='+tabla1,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,

            success: function(msg){

              t(msg);
                $('.box').css('background','#eeeeee');   //document.write(msg);
              }
            });
        });


      });
    </script>
    <script type="text/javascript" src="js/init.js" > </script>
  </body>

  </html>