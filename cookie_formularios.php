<?php
    (isset($_POST['incidencia'])) ? $eleccion = $_POST['incidencia'] : $eleccion = '';//Mediante cookies para mantener el dato
    setcookie('registro',$eleccion,0);
    header ('Location:formulario-proyeccion-instalaciones-clientes.php')
?>