<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie();
    
    $id = $_GET['id'];

    
?>
<main class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Desglose</h1>
    </div>

    <div id="folio" style="width: 600px;">
    <?php
        conexionBaseDatos();
        foreach($campos as $campo){
            
            desglose($campo, $id);
        }
    ?>
    </div>
</main>
<?php
        
    include_once 'footer.php';
?>