<?php
    (isset($_POST['informes'])) ? $tipoInformes = $_POST['informes'] : $tipoInformes = '';//HACERLO POR COOKIES!!!!
    setcookie('informesPrueba',$tipoInformes,0);
    header ('Location:informes_imagen.php')
?>