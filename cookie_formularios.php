<?php
    (isset($_POST['incidencia'])) ? $eleccion = $_POST['incidencia'] : $eleccion = '';//HACERLO POR COOKIES!!!!
    setcookie('registro',$eleccion,0);
    header ('Location:formulario-proyeccion-instalaciones-clientes.php')
?>