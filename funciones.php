<?php
    /************************************************************************************************
     ********************FUNCIONES NECESARIAS PARA EL FUNCIONAMIENTO DE LA APLICACIÓN ***************
     ************************************************************************************************/

     //Función para establecer la conexión con la base de datos
     function conexionBaseDatos(){
         $host = 'localhost';
         $user = 'root';
         $password = '';
         $BBDD = 'incidencias_de_cine';

         $conexion = mysqli_connect($host, $user, $password, $BBDD);

         /* mysqli_query($conexion,"SET NAMES 'UTF-8'"); */
         
         return $conexion;
     }

     function buscador(){
         //Convertimos lo introducido en un array
         $palabrasClave = explode(" ",$_POST['palabraClave']);
         $query = "SELECT * FROM LOGIN WHERE nombre LIKE '%" . $palabrasClave[0] ."%'";
         return $query;


     }
?>