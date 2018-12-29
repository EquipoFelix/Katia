<?php 
include('conexion.php');
include('funciones.php');
session_start();
if (isset($_REQUEST['nc'])&&!empty($_REQUEST['nc'])) {
	$nc=$_REQUEST['nc'];
	$tabla=$_REQUEST['tabla'];
	$foto = null;
	$nombre=null;
	$apellidoP=null;
	$apellidoM=null;
	$grado=null;
	$grupo=null;
	$email=null;
	$domicilio=null;
	$localidad=null;
	$telefono=null;
	$consulta= mysqli_query ($con, " SELECT * FROM $tabla where n_control=$nc ");
	if (mysqli_num_rows ($consulta) > 0){
		while ($row_c=mysqli_fetch_array($consulta)) {
			$foto=$row_c['foto'];
			$nombre=$row_c['nombre'];
			$apellidoP=$row_c['a_paterno'];
			$apellidoM=$row_c['a_materno'];
			if ($tabla=='alumnos') {
				$grado=$row_c['id_grado'];
				$grupo=$row_c['id_grupo'];
			}else{$email=$row_c['mail'];}
			$domicilio=$row_c['domicilio'];
			$localidad=$row_c['localidad'];
			$telefono=$row_c['telefono'];
			$_SESSION['nc']=$nc;
		}


		if ($tabla=='alumnos') {
			?>

			<div class="content_uploader right " style="width: 200px ; height: 200px">
				<div class="box" >
					<img src="<?php echo "$foto";?>" style="width: 100%">
				</div>
			</div> 


			<div class="row">
				<div class="input-field col s4">
					<input id="nombre" name="nombre" type="text" class="validate" required="true" value="<?php echo "$nombre"; ?>" pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
					<label class="active" for="nombre">Nombre(s) del alumno</label>
				</div>
				<div class="input-field col s4">
					<input id="apellidoP" name="apellidoP" type="text" class="validate"  value="<?php echo "$apellidoP"; ?>"  required="true" pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras. Tamaño máximo: 40" title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
					<label class="active" for="apellidoP">Apellido Paterno</label>
				</div>
				<div class="input-field col s4">
					<input id="apellidoM" name="apellidoM" type="text" class="validate"   value="<?php echo "$apellidoM"; ?>" required="true" pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras. Tamaño máximo: 40" title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40" >
					<label class="active" for="apellidoM">Apellido Materno</label>
				</div>
			</div>

			<div class="row">
				<div class=" col s4">
					<label>Grado</label>
					<select class="browser-default  blue lighten-5 " id="grado" name="grado" disabled>
						<option value="" disabled selected>Elige el grado</option>
						<?php
						$consulta=db::consulta("grados");
						if (mysqli_num_rows ($consulta) > 0){
							while ( $row_c=mysqli_fetch_array( $consulta )) {
								$id_grado=$row_c['id_grado'];
								$nombre_grado=$row_c['nombre_grado'];


								if ($id_grado==$grado) {
								# code...
									echo "<option value=\"$id_grado\" selected>$nombre_grado</option>";
								}else{echo "<option value=\"$id_grado\" >$nombre_grado</option>";}
							}
						}
						?>
					</select>
				</div>
				<div class=" col s4">
					<label>Grupo</label>
					<select class="browser-default  blue lighten-5" id="grupo" name="grupo" disabled>
						<option value="" disabled selected>Elige el grupo</option>
						<?php
						$consulta=db::consulta("grupo");
						if (mysqli_num_rows ($consulta) > 0){
							while ( $row_c=mysqli_fetch_array( $consulta )) {
								$id_grupo=$row_c['id_grupo'];
								$nombre_grupo=$row_c['grupo'];
								if ($id_grupo==$grupo) {
								# code...
									echo "<option value=\"$id_grupo\" selected>$nombre_grupo</option>";
								}else{echo "<option value=\"$id_grupo\" >$nombre_grupo</option>";}

							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input id="domicilio" name="domicilio" type="text" class="validate" maxlength="60"  value="<?php echo "$domicilio"; ?>"  required="true" title="Tamaño máximo: 60">
					<label class="active" for="domicilio">Domicilio</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="localidad" name="localidad" type="text" class="validate" maxlength="60"  value="<?php echo "$localidad"; ?>"   required="true" title=" Tamaño máximo: 60">
					<label class="active"  for="localidad"> Localidad</label>
				</div>
				<div class="input-field col s6">
					<input id="telefono" name="telefono" type="tel" class="validate" maxlength="10"   value="<?php echo "$telefono"; ?>" required="true" pattern="\d{10}"  title="Numero a 10 digitos">
					<label class="active" for="telefono">Telefono</label>
				</div>
			</div>
			<button class=" btn waves-effect waves-light" id="tabla1" name="tabla1" value="alumnos" type="submit"> Registrar
				<i class="material-icons right">send</i>
			</button>

			<?php

		}elseif($tabla=='maestros'){
			?>
			<div class="row">
				<div class="content_uploader center " style="width: 200px ; height: 200px">
					<div class="box" >
						<img src="<?php echo "$foto";?>" style="width: 100%">
					</div>
				</div> 
			</div>
			<div class="row">
				<div class="input-field col s4">
					<input id="nombre" name="nombre" type="text" class="validate"   value="<?php echo "$nombre"; ?>"required="true"  pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
					<label  class="active" for="nombre">Nombre(s) del Maestro</label>
				</div>
				<div class="input-field col s4">
					<input id="apellidoP" name="apellidoP" type="text" class="validate"   value="<?php echo "$apellidoP"; ?>" required="true"  pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
					<label  class="active" for="apellidoP">Apellido Paterno</label>
				</div>
				<div class="input-field col s4">
					<input id="apellidoM" name="apellidoM" type="text" class="validate"   value="<?php echo "$apellidoM"; ?>" required="true"  pattern="([A-ZÁÉÍÓÚñáéíóúÑ]+[a-zÁÉÍÓÚñáéíóúÑñ]+[\s]*)*" minlength="3" maxlength="40"  title="Solo letras y la primera debe ser mayuscula. Tamaño máximo: 40">
					<label class="active"  for="apellidoM">Apellido Materno</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="email" name="email" type="email" class="validate"  value="<?php echo "$email"; ?>">
					<label  class="active" for="email">Email</label>
				</div>

				<div class="input-field col s6">
					<input id="domicilio" name="domicilio" type="text" class="validate"  value="<?php echo "$domicilio"; ?>" required="true"  maxlength="60" required="true" title="Tamaño máximo: 60">
					<label class="active"  for="domicilio">Domicilio</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<input id="localidad" name="localidad" type="text" class="validate"  value="<?php echo "$localidad"; ?>" required="true"  maxlength="60" required="true" title="Tamaño máximo: 60">
					<label class="active" for="localidad"> Localidad</label>
				</div>
				<div class="input-field col s6">
					<input id="telefono" name="telefono" type="number" class="validate"  value="<?php echo "$telefono"; ?>" required="true"  maxlength="10" required="true" pattern="\d{10}"  title="Numero a 10 digitos">
					<label class="active" for="telefono">Telefono</label>
				</div>
			</div>

			<button class=" btn waves-effect waves-light" id="tabla1" name="tabla1" value="maestros" type="submit"> Registrar
				<i class="material-icons right">send</i>
			</button>
			<?php
		}
	}else{echo "El registro no se encuentra en la lista de $tabla";}
}

if (isset($_REQUEST['tabla1'])&&!empty($_REQUEST['tabla1'])) {
	$n_control=$_SESSION['nc'];
	$modificacion=null;
	if ($_REQUEST['tabla1']=='alumnos') {
		$nombre=$_POST['nombre'];
		$apellidoP=$_POST['apellidoP'];
		$apellidoM=$_POST['apellidoM'];
		
		$domicilio=$_POST['domicilio'];
		$localidad=$_POST['localidad'];
		$telefono=$_POST['telefono'];
		$modificacion="UPDATE `alumnos` SET`nombre`='$nombre',`a_paterno`='$apellidoP',`a_materno`='$apellidoM',`domicilio`='$domicilio',`localidad`='$localidad',`telefono`='$telefono' WHERE n_control=$n_control";

	}
	
	
	
	if ($_REQUEST['tabla1']=='maestros') {

		$nombre=$_POST['nombre'];
		$apellidoP=$_POST['apellidoP'];
		$apellidoM=$_POST['apellidoM'];
		$email=$_POST['email'];
		$domicilio=$_POST['domicilio'];
		$localidad=$_POST['localidad'];
		$telefono=$_POST['telefono'];

		$modificacion="UPDATE `maestros` SET`nombre`='$nombre',`a_paterno`='$apellidoP',`a_materno`='$apellidoM',mail='$email',`domicilio`='$domicilio',`localidad`='$localidad',`telefono`='$telefono' WHERE n_control=$n_control";

	}
	

	echo "$modificacion";
	if (!empty($modificacion)) {
		$resultado= mysqli_query ($con, $modificacion);
		if ($resultado) {
			echo " Se modificaron los datos correctamente";

		}else{
			echo "No se pudo modificar ";
		}
	}


}

?>