<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registrarse</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>assets/images/bg-01.jpg');">
			<div class="col-md-10" style="border-radius: 10px; overflow: hidden; background: transparent;">
				<span class="login100-form-title p-b-41">
					Registra tus datos
				</span>

				<form class="login100-form validate-form p-b-33 p-t-5" method="post">
					<div class="row">
						<div class="col-md-5">

							<div class="wrap-input100 validate-input" data-validate = 'Ingrese un nombre de usuario(único)'>
								<input class="input100" type="text" name="dni" placeholder=
								<?php if($error['dni']!=''){echo '"'.$error['dni'].'"';}else{echo ('"Ingrese su DNI"');}
								if($dni!=NULL and $error['dni']==''){echo 'value="'.$dni.'"';} 
								?> 
								>
								<span class="focus-input100" data-placeholder="&#xe82a;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Ingrese su nombre">
								<input class="input100" type="text" name="nombre" placeholder="Nombre" <?php if($nombre!=NULL){echo 'value="'.$nombre.'"';} ?>>
								<span class="focus-input100" data-placeholder="&#xe82a;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Ingrese su numero de teléfono">
								<input class="input100" type="text" name="telefono" placeholder="Tel&eacute;fono" <?php if($telefono!=NULL){echo 'value="'.$telefono.'"';} ?>>
								<span class="focus-input100" data-placeholder="&#xe82a;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Ingrese su direccion">
								<input class="input100" type="text" name="direccion" placeholder="Direcci&oacute;n" <?php if($direccion!=NULL){echo 'value="'.$direccion.'"';} ?>>
								<span class="focus-input100" data-placeholder="&#xe82a;"></span>
							</div>

						</div>

						<div class="col-md-1"> .</div>

						<div class="col-md-5">

							<div class="wrap-input100 validate-input" data-validate="Ingrese una contraseña">
								<input class="input100" type="password" name="pass" placeholder="Contraseña" <?php if($pass!=NULL){echo 'value="'.$pass.'"';} ?>>
								<span class="focus-input100" data-placeholder="&#xe80f;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Ingrese su apellido">
								<input class="input100" type="text" name="apellido" placeholder="Apellido" <?php if($apellido!=NULL){echo 'value="'.$apellido.'"';} ?>>
								<span class="focus-input100" data-placeholder="&#xe82a;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Ingrese su email">
								<input class="input100" type="email" name="email" placeholder="E-mail" <?php if($email!=NULL){echo 'value="'.$email.'"';} ?>>
								<span class="focus-input100" data-placeholder="&#xe82a;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Ingrese fecha de nacimiento">
								<input class="input100" type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" <?php if($fechaNacimiento!=NULL){echo 'value="'.$fechaNacimiento.'"';} ?>>
								<span class="focus-input100" data-placeholder="&#xe82a;"></span>
							</div>

						</div>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Registro
						</button>
					</div>
					<div class="container col-md-12">
						<center>
							¿Ya tienes una cuenta? <a href="<?php echo base_url();?>index.php/Login">Inicia Sesi&oacute;n</a>
						</center>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/js/main.js"></script>
	<script src="<?php echo base_url();?>assets/js/validate.js"></script>
</body>
</html>