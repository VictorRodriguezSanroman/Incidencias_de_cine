<?php
    include_once 'funciones.php';
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];

    borrar_incidencia($id,$tabla);

    function borrar_incidencia($id,$tabla){
        $sentenciaBorrado = "DELETE FROM " . $tabla . " WHERE id = '$id'";
        mysqli_query(conexionBaseDatos(),$sentenciaBorrado);
        mysqli_close(conexionBaseDatos());
        header('Location:' . getenv('HTTP_REFERER'));//Volvemos a la página anterior
    }


?>