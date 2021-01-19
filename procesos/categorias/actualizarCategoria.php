<?php 
 session_start();

   require_once "../../clases/Categorias.php";

   $Categorias = new Categorias();

   $datos=array(
   	            "idCategoria"=>$_POST['idCategoria'],
                "categoria"=>$_POST['nombreCategoriaU']);

   echo $Categorias->actualizarCategoria($datos);



 ?>