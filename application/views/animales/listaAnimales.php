<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Animales</h1>
		<a class="btn btn-success" href="<?php echo base_url();?>index.php/Animales/nuevo"><span>+Agregar</span></a>

		<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</a>
	</div>


	<table class="table table-bordered datatable">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Especie</th>
			<th>Raza</th>
			<th>Fecha Nac.</th>
			<th>Estado</th>
			<th>Detalles</th>
			<th>Opciones</th>
		</thead>
		<tbody>
<?php
	if (!is_null($animales)) {
		foreach ($animales as $animal) {
			echo ("<tr>");
			echo ("<td>".$animal->idAnimal."</td>");
			echo ("<td>".$animal->nombre."</td>");
			echo ("<td>".$animal->especie."</td>");	
			echo ("<td>".$animal->raza."</td>");
			echo ("<td>".$animal->fechaNacimiento."</td>");
			if ($animal->estado==1 && $animal->idDueño==$id) {
				$estado="Pendiente";
				$botones="	
					<button class='btn btn-primary' onclick='modificar(".$animal->idAnimal.")'><span class='fa fa-edit' aria-hidden='true'></button>
					<button class='btn btn-danger' onclick='darBaja(".$animal->idAnimal.")'><span class='fa fa-trash' aria-hidden='true'></span></button>
						";
			}elseif ($animal->estado==2) {
				$estado="Adoptado";
				$botones="	
					<button class='btn btn-danger' onclick='darBaja(".$animal->idAnimal.")'><i class='fa fa-trash' aria-hidden='true'></i></button>
						";
			}else{
				$estado="Eliminado";
				$botones="	
					None
						";
			}
			echo ("<td>".$estado."</td>");
			echo ('<td><button type="button" class="btn btn-primary" data-toggle="modal" onclick="detalles('.$animal->idAnimal.')">
  				<span class="fa fa-eye" aria-hidden="true"></button></td>');
			echo ("<td><div class='row'>".$botones."</div></td>");
			echo ("</tr>");
		}
	}
?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	function modificar(id) {
		alert('En desarrollo...');
	}
	function darBaja(id) {
		window.location.href = "<?php echo base_url();?>index.php/Animales/darBaja/"+id;
	}
</script>

