<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
     <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
</head>
<body>
	<div class="container">
		 <h1 class="text-center">Registro de usuario</h1>
		 <hr>
		 <div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
					<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
					<label>Nombre personal</label>
					<input type="text" name="nombre" id="nombre" required="" class="form-control">
					<label>Fecha de nacimiento</label>
					<input type="text" name="fechaNacimiento" id="fechaNacimiento" required="" class="form-control" readonly="">
					<label>Email o correo</label>
					<input type="email" name="correo" id="correo" required=""class="form-control">
					<label>Nombre de usuario</label>
					<input type="text" name="usuario" id="usuario" required=""class="form-control">
					<label>Password o contraseña</label>
					<input type="password" name="password" id="password" required="" class="form-control">
					<br>
					<div class="row">
						<div class="col-sm-6 text-left">
					       <button class="btn btn-primary">Registrar</button>
					    </div>
                        <div class="col-sm-6 text-right">
                        	<a href="index.php" class="btn btn-success">Login</a>
                        </div>
					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<script src="librerias/jquery-3.5.1.min.js"></script>
	<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script>  
    
    <script type="text/javascript">
    	$(function(){

    		var fechaA = new Date();
    		var yyyy = fechaA.getFullYear();

    		$('#fechaNacimiento').datepicker({

    			changeMonth: true,
    			changeYear: true,
    			yearRange:'1990:' + yyyy,
    			dateFormat:"dd-mm-yy"
    		});
    	});

  </script>

  <script type="text/javascript">
    	function agregarUsuarioNuevo(){
    		$.ajax({
    			method: "POST",
    			data: $('#frmRegistro').serialize(),
    			url: "procesos/usuario/registro/agregarUsuario.php",
    			success:function(respuesta){
    				respuesta= respuesta.trim();
    				if(respuesta == 1){
                        $('#frmRegistro')[0].reset();
                        swal(":D", "Agregado con exito!!", "success");

    				} else if(respuesta==2){

    					swal("Este usuario ya existe, por favor escribe otro");
    				}

    				else{
                        //console.log(respuesta);
                        swal(":( ", "Fallo al agregar", "error");
    				}
    			}
    		});

    		return false;
    	}
        
  </script>
</body>
</html>