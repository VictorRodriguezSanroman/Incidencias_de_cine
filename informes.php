 <?php
    (isset($_POST['informes'])) ?
    $tipoInformes = $_POST['informes'] : $tipoInformes = '';
print $tipoInformes;
        switch ($tipoInformes) {
            case 'fechas': header ('Location:rango_fechas.php');
            break;
            case 'Imagen': header ('Location:informes_imagen.php');
            break;
        }
?>
