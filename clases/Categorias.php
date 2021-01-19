<?php 

    require_once "Conexion.php";

    class Categorias extends Conexion
    {
    	
    	function agregarCategoria($datos)
    	{
    		$conexion=Conexion::conectar();

    		$sql="INSERT INTO t_categorias(id_usuario,nombre) 
    		      VALUES (?,?) ";

    		$query =$conexion->prepare($sql);
    		$query->bind_param("is",$datos['idUsuario'],
    	                            $datos['categoria']);

    		$respuesta=$query->execute();
    		$query->close();

    		return $respuesta;
    	}

        function eliminarCategoria($idCategoria){

             $conexion=Conexion::conectar();

             $sql="DELETE FROM t_categorias WHERE id_categoria=?";
             
             $query=$conexion->prepare($sql);
             $query->bind_param("i",$idCategoria);
             $respuesta = $query->execute();
             $query->close();

        return $respuesta;




        }

        public function obtenerCategoria($idCategoria){
          $conexion=Conexion::conectar();

          $sql="SELECT id_categoria,
                       nombre 
                       from t_categorias 
                       where id_categoria='$idCategoria'";

          $result=mysqli_query($conexion,$sql);
          $categoria=mysqli_fetch_array($result);
          $datos= array(
                        "idCategoria"=>$categoria['id_categoria'],
                        "nombreCategoria"=>$categoria['nombre']

                        );

          return $datos;

        }

            public function actualizarCategoria($datos){
               $conexion=Conexion::conectar();

               $sql = "UPDATE t_categorias 
                       SET nombre=?
                       WHERE id_categoria=?";

              $query=$conexion->prepare($sql);
              $query->bind_param('si',$datos['categoria'],
                                      $datos['idCategoria']);

              $respuesta = $query->execute();
              $query->close();
              return $respuesta;
        }
        
    }






 ?>