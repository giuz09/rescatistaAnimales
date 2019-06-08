<div class="panel-body">
	<div class="form-header center">
		<center>
			<h4>Ingrese los datos de la mascota</h4>
			<p style="color:red">
				Todos los campos son requeridos
				<?php
				if ($error['error']) {
					foreach ($error as $e) {
						if($e!=1){
							echo "<br>".$e;
						}
					}
				}
				?>
			</p>
		</center>
	</div>
	<div class="container form">
	<form enctype="multipart/form-data" method="POST">
		<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<input class="form-control" type="text" name="nombre" placeholder="Nombre" <?php if($animal['nombre']!=NULL){echo 'value="'.$animal['nombre'].'"';} ?> required>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="especie" placeholder="Especie" <?php if($animal['especie']!=NULL){echo 'value="'.$animal['especie'].'"';} ?> required>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="raza" placeholder="Raza" <?php if($animal['raza']!=NULL){echo 'value="'.$animal['raza'].'"';} ?> required>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="descripcion" placeholder="Descripcion" <?php if($animal['descripcion']!=NULL){echo 'value="'.$animal['descripcion'].'"';} ?> required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<select class="form-control" name="sexo">
					<option value="Macho">Macho</option>
					<option value="Hembra">Hembra</option>
				</select>
			</div>
			<div class="form-group">
				<label>Fecha de Nacimiento</label>
				<input class="form-control" type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" <?php if($animal['fechaNacimiento']!=NULL){echo 'value="'.$animal['fechaNacimiento'].'"';} ?> required>
			</div>
			<div class="form-group">
				<label>Foto de la Mascota</label><br>
				<input class="" type="file" name="foto" placeholder="Foto" required>
			</div>
		</div>
		<div class="col-md-5"></div>

			<button class="col-md-2 btn btn-success" type="submit">ENVIAR</button>

		</div>
	</form>
	</div>
</div>