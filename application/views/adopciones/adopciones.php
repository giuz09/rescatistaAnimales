<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Adopciones</h1>
		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
	</div>


	<table class="table table-bordered datatable">
		<thead>
			<th>ID</th>
			<th>Adoptante</th>
			<th>Animal</th>
			<th>Fecha Adopcion</th>
			<th>Estado</th>
		</thead>
		<tbody>
<?php
	if (!is_null($adopciones)) {
		foreach ($adopciones as $adopcion) {
			echo ("<tr>");
			echo ("<td>".$animal->idAnimal."</td>");
			echo ("<td>".$animal->nombre."</td>");
			echo ("<td>".$animal->especie."</td>");	
			echo ("<td>".$animal->raza."</td>");	
			echo ("<td>".$animal->descripcion."</td>");	
			echo ("<td>".$animal->fechaNacimiento."</td>");
			echo ("<td>".$animal->fechaRegistro."</td>");
			if ($animal->estado==1) {
				$estado="Pendiente";
				$botones="	
					<button class='btn btn-primary'><span class='fa fa-edit' aria-hidden='true'></button>
					<button class='btn btn-danger'><span class='fa fa-trash' aria-hidden='true'></span></button>
						";
			}elseif ($animal->estado==2) {
				$estado="Adoptado";
				$botones="	
					<button class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></button>
						";
			}else{
				$estado="Eliminado";
				$botones="	
					Nadita
						";
			}
			echo ('<td><button type="button" class="btn btn-primary" data-toggle="modal" onclick="detalles('.$solicitud->idAdoptante.')">
  				<span class="fa fa-eye" aria-hidden="true"></button></td>');
			echo ("<td>".$estado."</td>");
			echo ("<td>".$botones."</td>");
			echo ("</tr>");
		}
	}
?>
		</tbody>
	</table>
</div>
