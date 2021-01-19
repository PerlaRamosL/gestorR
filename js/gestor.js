	
function agregarArchivosGestor(){

	var formData= new FormData(document.getElementById('frmArchivos'));
	$.ajax({
		url:"../procesos/gestor/guardarArchivos.php",
		type:"POST",
		datatype: "html",
		data:formData,
		cache:false,
		contentType:false,
		processData:false,
		success: function(respuesta){
			console.log(respuesta);
			respuesta = respuesta.trim();

			if(respuesta == 1){
				$('#frmArchivos')[0].reset();
				$('#tablaGestorArchivos').load('gestor/tablaGestor.php');
				swal(":D","Agregado con exito!!","success");

			}else{

				swal(":(","Fallo al agregar!","error");
			}


		}

	});

}

function elminiarArchivo(idArchivo){

	swal({
		title: "Estas segoro de eliminar este archivo?",
		text: "Una vez eliminado, no podra recuperarse!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
				type:"POST",
				data:"idArchivo=" + idArchivo,
				url:"../procesos/gestor/eliminarArchivo.php",
				success:function(respuesta){
					respuesta= respuesta.trim();
					if (respuesta==1) {
				     $('#tablaGestorArchivos').load('gestor/tablaGestor.php');
					 swal("El archivo ha sido eliminado!", {
				     icon: "success",
			         });
                }else{
                	console.log(respuesta);
                	swal("Error al eliminar",{
                	icon:"error",	
                	});

                	

                }
				}

			});
		}
	});


}

function obtenerArchivoPorId(idArchivo){
 
 $.ajax({

 	type:'POST',
 	data:"idArchivo=" + idArchivo,
 	url:"../procesos/gestor/obtenerArchivo.php",
 	success:function(respuesta){ 
          $('#archivoObtenido').html(respuesta)
 	}

 });

}