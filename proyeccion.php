<?php
    include_once 'header.php';
    include_once 'nav.php';
    
    compruebaCookie();

    $eleccion = $_POST['incidencia'];

    echo $eleccion;

    include_once 'footer.php';
?>