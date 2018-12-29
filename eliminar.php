<?php
include ('conexion.php');
if (isset($_REQUEST['id'])&&!empty($_REQUEST['id'])&&isset($_REQUEST['tabla'])&&!empty($_REQUEST['tabla'])) {
$id=$_REQUEST['id'];
$tabla=$_REQUEST['tabla'];

		$consulta= mysqli_query ($con, "delete FROM $tabla where n_control=$id");
		if ($consulta){
			echo "El registro ha sido elimindao de la tabla $tabla";;
		}else{

			echo "Error! no se puedo eliminar";
		}
}




?>