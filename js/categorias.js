function agregarCategoria(){
	var categoria=$('#nombreCategoria').val();

	if(categoria==""){
		swal("Debes agregar una categoria");
		return false;
	} else{
		$.ajax({
			type: "POST",
			data:"categoria="+ categoria,
			url:"../procesos/categorias/agregarCategoria.php",
			success:function(respuesta){
				respuesta= respuesta.trim();

				if(respuesta==1){
					$('#nombreCategoria').val("");
                    $('#tablaCategorias').load('categorias/tablaCategorias.php')
					swal(":D","Se agrego correctamente","success");
				}else{
					console.log(respuesta);

					swal("X(","Fallo al agregar","error");
				}
			}

		});
	}
}

function eliminarCategoria(idCategoria){
	idCategoria=parseInt(idCategoria);
    if(idCategoria < 1){
        swal("No tienes id de categoria");
		return false;
	} else{
     //******************************
     swal({
     	title: "Estas seguro de eliminar esta categoria?",
     	text: "Una vez eliminada, no podra recuperarse!",
     	icon: "warning",
     	buttons: true,
     	dangerMode: true,
     })
     .then((willDelete) => {
     	if(willDelete){
     	  $.ajax({
     	  	type:"POST",
     	  	data:"idCategoria=" + idCategoria,
     	  	url:"../procesos/categorias/eliminarCategoria.php",
     	  	success:function(respuesta){
     	  		respuesta = respuesta.trim();
            if(respuesta == 1){
            $('#tablaCategorias').load('categorias/tablaCategorias.php');
     		swal("Eliminado con exito", {
     			icon: "success",
     		});
            }else{
                console.log(respuesta);
                swal("X(","Fallo al eliminar","error");
            } 
     	  }

     	 });
        }	
     });
 }
}	

     function obtenerDatosCategoria(idCategoria){
           $.ajax({
            type:"POST",
            data:"idCategoria=" + idCategoria,
            url:"../procesos/categorias/obntenerCategoria.php",
            success:function(respuesta){
                respuesta= jQuery.parseJSON(respuesta);
                $('#idCategoria').val(respuesta['idCategoria']);
                $('#nombreCategoriaU').val(respuesta['nombreCategoria']);

            }

        });
}

     function actualizaCategoria(){
        if($('#nombreCategoriaU').val() ==""){
         swal("No hay categoria!!");
         return false;

        } else{
            $.ajax({
                type:"POST",
                data:$('#frmCategoriasU').serialize(),
                url:"../procesos/categorias/actualizarCategoria.php",
                success:function(respuesta){
                    respuesta = respuesta.trim();
                    if(respuesta == 1){
                    $('#tablaCategorias').load('categorias/tablaCategorias.php');
                    swal("xD","Actaualizado con exito!!","success");
                    }
                    else{

                        swal(":(","Fallo al actualizar","error");
                    }

                }
             });
        }
     }