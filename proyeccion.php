<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie();

    (isset($_POST['incidencia'])) ? $eleccion = $_POST['incidencia'] : $eleccion = '';
?>
<main class= "container-fluid">
    <form method="post" class="form"  enctype="multipart/form-data">
            <input type="text" placeholder="<?php echo $eleccion; ?>" id="titulo" name="titulo">
        </div>
        <div>
            <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <div>
            <input type="text" placeholder="Persona que rellena este formulario" id="autor" name="autor">
        </div>
        <div>
            <select name="prioridad" class="form-select" aria-label="Default select example" id="prioridad">
                        <option value="baja">baja</option>
                        <option value="media">media</option>
                        <option value="alta">alta</option>
            </select>          
        </div>
        <div>
            <label for="sala">Sala/s afectada/s: </label><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="lugarIncidente" id="sala1" value="Sala 1">
                <label for="sala1">Sala 1</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="lugarIncidente" id="sala2" value="Sala 2">
                <label for="sala2">Sala 2</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="lugarIncidente" id="sala3" value="Sala 3">
                <label for="sala3">Sala 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="lugarIncidente" id="sala4" value="Sala 4">
                <label for="sala4">Sala 4</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="lugarIncidente" id="sala5" value="Sala 5">
                <label for="sala5">Sala 5</label>
            </div>
        </div>
        <div>
            <textarea name="descripcion" id="Descripcion" cols="30" rows="10">Detalla aquí la incidencia ocurrida</textarea>
        </div>
        
        <div>
            <label for="adjuntos">¿Algún documento a añadir?</label><br>
            <input class="archivo" type="file" id="foto" name="foto[]">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="botonDeArchivar" id="botonDeArchivar" value="Guardar">
        </div>
    </form>
</main>

<?php 
    if(isset($_POST['botonDeArchivar'])){ 
        alta_incidente();
    }
    include_once 'footer.php';
?>