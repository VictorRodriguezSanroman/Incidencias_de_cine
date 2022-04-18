<?php
    /************************************************************************************************
     ********************FUNCIONES NECESARIAS PARA EL FUNCIONAMIENTO DE LA APLICACIÓN ***************
     ************************************************************************************************/

     function conexionBaseDatos(){
         $host = 'localhost';
         $user = 'root';
         $password = '';
         $BBDD = 'inicidencias-de-cine';

         $conexion = mysqli_connect($host, $user, $password, $BBDD);

         mysqli_query($conexion,"SET NAMES 'UTF-8'");
         
         return $conexion;
     }
?>