<?php 
session_start();

if(isset($_SESSION['usuario']))
{
	include "header.php";
	?>
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Categorias</h1>
			<div class="row">
				<div class="col-sm-4">
					<span class="btn btn-primary" data-toggle="modal" data-target="#modadalAgregaCategoria">
					  Agregar nueva gategoria <span class="fas fa-plus-circle"> </span>
					</span>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<div id="tablaCategorias"></div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="modadalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCategorias">
        	<label>Nombre de la categoria</label>
        	<input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnGuardarCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modadalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCategoriasU">
        	<input type="text" hidden="" name="idCategoria" id="idCategoria">
        	<label>Nombre de la categoria</label>
        	<input type="text" name="nombreCategoriaU" id="nombreCategoriaU" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizarCategoria">Actualizar</button>
      </div>
    </div>
  </div>
</div>

	<?php  
     include "footer.php";
	?>
	<script src="../js/categorias.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCategorias').load('categorias/tablaCategorias.php');

		$('#btnGuardarCategoria').click(function(){
			agregarCategoria();
		});

      $('#btnActualizarCategoria').click(function(){
      actualizaCategoria();
    });
	});
</script>
<?php  
} else {

	header("location:../index.php");
}

?>