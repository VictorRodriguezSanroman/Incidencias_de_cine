<?php
    include_once 'header.php';
    include_once 'nav.php';
    
    compruebaCookie();
    $eleccion = $_POST['incidencia'];
?>
<main class= "container-fluid">
    <form action="" class="form">
        <div>
            <input type="text" placeholder="<?php echo $eleccion; ?>">
        </div>
        <div>
            <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <div>
            <input type="text" placeholder="Persona que rellena este formulario">
        </div>
        <div>
            <label for="sala">Sala/s afectada/s: </label><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sala1" id="sala1">
                <label for="sala1">Sala 1</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sala2" id="sala2">
                <label for="sala2">Sala 2</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sala3" id="sala3">
                <label for="sala3">Sala 3</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sala4" id="sala4">
                <label for="sala4">Sala 4</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sala5" id="sala5">
                <label for="sala5">Sala 5</label>
            </div>
        </div>
        <div>
            <textarea name="descripcion" id="Descripcion" cols="30" rows="10">Detalla aquí la incidencia ocurrida</textarea>
        </div>
        
        <div>
            <label for="adjuntos">¿Algún documento a añadir?</label><br>
            <input type="file">
        </div>
        <div>
            <input class="btn btn-primary" type="button" name="botonDeArchivar" id="botonDeArchivar" value="Guardar">
        </div>
    </form>
</main>


<?php
    include_once 'footer.php';
?>