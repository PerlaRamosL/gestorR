<?php 

    class Conexion{

          public function conectar(){
             
              $servidor= "localhost";		
              $usuario= "root";
              $password= "";
              $db= "gestor";

              $conexion=mysqli_connect($servidor,
                                       $usuario,
                                       $password,
                                       $db);

              $conexion->set_charset('utf8mb4');
              return $conexion;



          }
    }

 ?>