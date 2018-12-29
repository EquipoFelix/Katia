<?php 

if(isset($_REQUEST['vista']) && !empty($_REQUEST['vista'])) {
	$vista = $_REQUEST ['vista']; 
	$auto="";
	if ($vista=='alumnos') {
		$consulta=db::consulta($vista.",grados,grupo where alumnos.id_grado=grados.id_grado and alumnos.id_grupo=grupo.id_grupo;");
		if (mysqli_num_rows ($consulta) > 0){
			?>

			<thead>
				<tr>
					<th>Numero Control</th>
					<th>Foto</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Grado</th>
					<th>Grupo</th>
					<th>Domicilio</th>
					<th>Localidad</th>
					<th>Telefono</th>
					<th>Eliminar</th>
				</tr>
			</thead>

			<tbody id="myTable"> 
				<?php
				while ( $row_c=mysqli_fetch_array( $consulta )) {
					$n_control =$row_c['n_control'];
					$nombre =$row_c['nombre'];
					$a_paterno =$row_c['a_paterno'];
					$a_materno =$row_c['a_materno'];
					$domicilio =$row_c['domicilio'];
					$localidad =$row_c['localidad'];
					$telefono =$row_c['telefono'];
					$id_grado =$row_c['nombre_grado'];
					$id_grupo =$row_c['grupo'];
					$foto =$row_c['foto'];
					echo " 
					<tr> 
					<td>$n_control</td>
					<td><img class=\" \"  width=\"70\"  src=\"$foto\"></td>
					<td>$nombre</td>
					<td>$a_paterno</td>
					<td>$a_materno</td>
					<td>$id_grado</td>
					<td>$id_grupo</td>
					<td>$domicilio</td>
					<td>$localidad</td>
					<td>$telefono</td>
					<td>  <a class=\"btn-floating btn-large waves-effect waves-light red  modal-trigger\" id='$n_control' onclick = \"eliminar(this.id);\"><i class=\"material-icons\">delete</i></a>
					</td>
								</tr>";
								//
								$auto=$auto."\"".$nombre."\"".":null,\n";
							}
							?>
						</tbody>


						<?php
					}
				}elseif ($vista=='maestros') {
					$consulta=db::consulta($vista);
					if (mysqli_num_rows ($consulta) > 0){
						?>

						<thead>
							<tr>
								<th>Cedula</th>
								<th>Foto</th>
								<th>Nombre</th>
								<th>Apellido Paterno</th>
								<th>Apellido Materno</th>
								<th>Email</th>
								<th>Domicilio</th>
								<th>Localidad</th>
								<th>Telefono</th>
								<th>Eliminar</th>
							</tr>
						</thead>

						<tbody id="myTable"> 
							<?php
							while ( $row_c=mysqli_fetch_array( $consulta )) {
								$n_control =$row_c['n_control'];
								$nombre =$row_c['nombre'];
								$a_paterno =$row_c['a_paterno'];
								$a_materno =$row_c['a_materno'];
								$domicilio =$row_c['domicilio'];
								$email =$row_c['mail'];
								$localidad =$row_c['localidad'];
								$telefono =$row_c['telefono'];
								$foto =$row_c['foto'];
								echo " 
								<tr> 
								<td>$n_control</td>
								<td><img class=\"\" width=\"70\" src=\"$foto\"></td>
								<td>$nombre</td>
								<td>$a_paterno</td>
								<td>$a_materno</td>
								<td>$email</td>
								<td>$domicilio</td>
								<td>$localidad</td>
								<td>$telefono</td>
								<td>  <a class=\"btn-floating btn-large waves-effect waves-light red  modal-trigger\" id='$n_control' onclick = \"eliminarM(this.id);\"><i class=\"material-icons\">delete</i></a>
								</td>
								</tr>";
							}
							?>
						</tbody>
						

						<?php
					}
				}elseif ($vista=='materias') {
					$consulta=db::consulta($vista);
					if (mysqli_num_rows ($consulta) > 0){
						?>
						
						<thead>
							<tr>
								<th>Asignatura</th>
							</tr>
						</thead>

						<tbody id="myTable"> 
							<?php
							while ( $row_c=mysqli_fetch_array( $consulta )) {
								$nombre =$row_c['nombre_materia'];
								echo " 
								<tr> 
								<td>$nombre</td>
								</tr>";
							}
							?>
						</tbody>


						<?php
					}
				}

				echo "<script type=\"text/javascript\">
     $(document).ready(function() {
  $('#searchTerm').autocomplete({
      data: {
        ".substr($auto, 0, -2)."
      },
    });
  });</script>";
			}

/**
 * 
 */
class db 
{
	function consulta($tabla){
		include ('conexion.php');
		$consulta= mysqli_query ($con, "SELECT * FROM $tabla");
		if ($consulta){
			return $consulta;
		}



	}
}

?>
<script type="text/javascript">
	
function doSearch() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchTerm");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");


  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>