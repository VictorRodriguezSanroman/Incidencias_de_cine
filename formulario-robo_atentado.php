<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie();

    (isset($_POST['incidencia'])) ? $eleccion = $_POST['incidencia'] : $eleccion = '';
?>
<main class= "container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Registro de incidencias</h1>
    </div>
    <form method="post" class="form" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo"class="h5 form-label">Título de la incidencia:</label>
            <input type="text" class="form-control" placeholder="<?php echo $eleccion; ?>" id="titulo" name="titulo">
        </div>
        <div class="mb-3">
            <label for="fecha"class="h5 form-label">Fecha de lo ocurrido:</label>
            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <div class="mb-3">
            <label for="autor"class="h5 form-label">Persona que registra la incidencia:</label>
            <input type="text" class="form-control" id="autor" name="autor">
        </div>
        <div class="mb-3">
            <label for="prioridad" class="h5 form-label">Prioridad:</label>
            <select name="prioridad" class="form-select" aria-label="Default select example" id="prioridad">
                        <option value="baja">BAJA</option>
                        <option value="media">MEDIA</option>
                        <option value="alta">ALTA</option>
            </select>          
        </div>
        
        <div class="mb-3">
            <textarea name="descripcion" class="h5 p-3 form-control" id="Descripcion" placeholder="Detalla aquí la incidencia ocurrida..." rows="10"></textarea>
        </div>
        
        <div class="mb-3">
            <label for="adjuntos" class="h5 form-label">¿Valor substraído?</label><br>
            <input  type="number" class="form-control" placeholder="€" id="valor" name="valor">
        </div>
        <div>
            <input class="btn btn-primary form-control" type="submit" name="botonDeArchivar" id="botonDeArchivar" value="GUARDAR">
        </div>
    </form>
</main>

<?php 
    if(isset($_POST['botonDeArchivar'])){ 
        registroRoboAtentado();
    }
    include_once 'footer.php';
?>