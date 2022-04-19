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

     function login($usuario, $contraseña){
         conexionBaseDatos();
         $buscaUsuario = "SELECT * FROM `LOGIN` WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
         $resultado = mysqli_query(conexionBaseDatos(),$buscaUsuario);
         while ($registro = mysqli_fetch_row($resultado)){
             setcookie('acceso',$registro[1],0);
             header('Location:index.php');
         }
         if (empty($registro)){
            print "<div class='confirmacion text-center text-danger'><strong>Error de usuario y/o contraseña</strong></div>";
         }
     }

     function compruebaCookie() {
         if(isset($_COOKIE['acceso'])){
             $existe = $_COOKIE['acceso'];
         }else{
             $existe = NULL;
         }

         if(empty($existe)){
            header("Location:login.php");
        }
     }

     function salirLogin(){
         setcookie('acceso','salir',time()-1);
     }
?>