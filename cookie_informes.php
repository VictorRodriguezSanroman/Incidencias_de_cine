<?php
    (isset($_POST['informes'])) ? $tipoInformes = $_POST['informes'] : $tipoInformes = $_GET['campo'];

    setcookie('informesPrueba',$tipoInformes,0);
    
    print $tipoInformes;

    if ($tipoInformes == 'fechas'){
        header('Location:informes_fechas.php');
    }
    if ($tipoInformes == 'Alta'|| $tipoInformes == 'Media' || $tipoInformes == 'Baja'){

        header('Location:informes_prioridad.php');
    }

    if ($tipoInformes == 'Imagen' || $tipoInformes == 'Clientes'|| $tipoInformes == 'PRL'|| $tipoInformes == 'Instalaciones'|| $tipoInformes == 'Robos'){
        header ('Location:informes_imagen.php');
    }
?>