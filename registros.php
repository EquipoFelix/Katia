<?php 
include('conexion.php');
$registro=null;
$imagen=null;


if ($_REQUEST['tabla']=='alumnos') {
	$nombre=$_POST['nombre'];
	$apellidoP=$_POST['apellidoP'];
	$apellidoM=$_POST['apellidoM'];
	$grado=$_POST['grado'];
	$grupo=$_POST['grupo'];
	$domicilio=$_POST['domicilio'];
	$localidad=$_POST['localidad'];
	$telefono=$_POST['telefono'];
	$id= mysqli_query ($con, " SELECT MAX(n_control) FROM `alumnos` ");

	if (mysqli_num_rows ($id) > 0){
		while ($row_id=mysqli_fetch_array($id)) {
			$idm=$row_id['MAX(n_control)'];
			$idm=$idm+1;
			if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
				$foto = $_FILES['archivo']['name'];
				$imagen="src/".$idm."a".".jpg";
				$registro="INSERT INTO alumnos( n_control, `nombre`, `a_paterno`, `a_materno`, `domicilio`, `localidad`, `telefono`, `id_grado`, `id_grupo`, `foto`) VALUES ($idm,'$nombre','$apellidoP','$apellidoM','$domicilio','$localidad','$telefono','$grado','$grupo','$imagen')";
			}else{
				$registro="INSERT INTO alumnos( n_control, `nombre`, `a_paterno`, `a_materno`, `domicilio`, `localidad`, `telefono`, `id_grado`, `id_grupo`) VALUES ($idm,'$nombre','$apellidoP','$apellidoM','$domicilio','$localidad','$telefono','$grado','$grupo')";}
			
		}
	}
	
	
}
if ($_REQUEST['tabla']=='maestros') {

	$nombre=$_POST['nombre'];
	$apellidoP=$_POST['apellidoP'];
	$apellidoM=$_POST['apellidoM'];
	$email=$_POST['email'];
	$domicilio=$_POST['domicilio'];
	$localidad=$_POST['localidad'];
	$telefono=$_POST['telefono'];
	$id= mysqli_query ($con, " SELECT MAX(n_control) FROM `maestros` ");
	if (mysqli_num_rows ($id) > 0){
		while ($row_id=mysqli_fetch_array($id)) {
			$idm=$row_id['MAX(n_control)'];
			$idm=$idm+1;
			$imagen="src/".$idm."m".".jpg";
			if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
				$foto = $_FILES['archivo']['name'];
				$imagen="src/".$idm."a".".jpg";
				$registro="INSERT INTO maestros(n_control,`nombre`, `a_paterno`, `a_materno`, `mail`, `domicilio_m`, `localidad_m`, `telefono_m`, `foto`) VALUES ($idm,'$nombre','$apellidoP','$apellidoM','$email','$domicilio','$localidad','$telefono','$imagen')";
			}else{
				$registro="INSERT INTO maestros(n_control,`nombre`, `a_paterno`, `a_materno`, `mail`, `domicilio_m`, `localidad_m`, `telefono_m`) VALUES ($idm,'$nombre','$apellidoP','$apellidoM','$email','$domicilio','$localidad','$telefono')";
			}
			
		}
	}
	

}if ($_REQUEST['tabla']=='materias') {
	$materia=$_POST['materia'];	
	$registro="INSERT INTO materias(`nombre_materia`) VALUES ('$materia')";

}
if (!empty($registro)) {
	$resultado= mysqli_query ($con, $registro);
	if ($resultado) {
		echo "Registro exitoso";
		if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
			move_uploaded_file($_FILES['archivo']['tmp_name'],$imagen);
		}
		
	}else{
		echo "No se pudo registrar";
	}
}



?>