<?php 
 session_start();
 
 if (isset($_SESSION['usuario'])) {
      include "header.php";
 ?>
<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">Gestor de archivos</h1>
			<div class="row">
				<div class="col-sm-4">
					<span class="btn btn-primary" data-toggle="modal" data-target="#modadalAgregaArchivos">
					  Agregar archivos <span class="fas fa-plus-circle"> </span>
					</span>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<div id="tablaGestorArchivos"></div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modadalAgregaArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmArchivos" enctype="multipart/form-data" method="post">
        	<label>Categorias</label>
        	<div id="categoriasLoad"></div>
            <br>
        	<label>Selecciona archivos</label>
            <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnGuardarAchivo">Guardar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<?php  include "footer.php";?>

<script src="../js/gestor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorArchivos').load('gestor/tablaGestor.php');
		$('#categoriasLoad').load("categorias/selectCategorias.php");


		$('#btnGuardarAchivo').click(function(){
			agregarArchivosGestor();	
		});
	});
</script>
<?php

} else{
	header("location:../index.php");
}
 ?>