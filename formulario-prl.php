<?php
    include_once 'head.php';
    if(!isset($_COOKIE['registro'])){
        header('Location:' . getenv('HTTP_REFERER'));
    }
    include_once 'nav.php';
    compruebaCookie();

    (isset($_POST['incidencia'])) ? $eleccion = $_POST['incidencia'] : $eleccion = '';
?>
<main class= "container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Registro de incidencias</h1>
    </div>
    <?php
        if(isset($_POST['botonDeArchivar'])){
            registroPRL();
        }
    ?>
    <form method="post" class="form"  enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo"class="h5 form-label">Título de la incidencia:</label>
            <input type="text" class="form-control" placeholder="<?php echo $eleccion; ?>" id="titulo" name="titulo">
        </div>
        <div class="mb-3">
            <label for="fecha"class="h5 form-label">Fecha de lo ocurrido:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <div class="mb-3">
            <label for="autor"class="h5 form-label">Persona que registra la incidencia:</label>
            <input type="text" class="form-control" id="autor" name="autor">
        </div>
        <div class="mb-3">
            <label for="prioridad" class="h5 form-label">Prioridad:</label>
            <select name="prioridad" class="form-control" aria-label="Default select example" id="prioridad">
                        <option value="baja">BAJA</option>
                        <option value="media">MEDIA</option>
                        <option value="alta">ALTA</option>
            </select>          
        </div>
        <div class="mb-3">
            <label for="afectado" class="h5 form-label">Trabajador afectado:</label>
            <input type="text" class="form-control" id="afectado" name="afectado">
        </div>
        <div class="mb-3">
            <textarea name="descripcion" class="form-control" placeholder="Detalla aquí la incidencia ocurrida..." rows="10"></textarea>
        </div>
        
       
        <div class="mb-3">
            <input class="btn btn-primary form-control" type="submit" name="botonDeArchivar" id="botonDeArchivar" value="GUARDAR">
        </div>
    </form>
</main>

<?php 
    include_once 'footer.php';
?>