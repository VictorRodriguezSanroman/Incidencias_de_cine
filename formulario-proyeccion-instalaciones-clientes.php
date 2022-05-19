<?php
    if(!isset($_COOKIE['registro'])){
        header('Location:' . getenv('HTTP_REFERER'));
    }
    include_once 'head.php';
    compruebaCookie();
    include_once 'nav.php';
    


?>
<main class= "container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Registro de incidencias</h1>
    </div>
    <?php
        if(isset($_POST['botonDeArchivar'])){
            if($_COOKIE['registro'] == 'Problemas en la imagen' || $_COOKIE['registro'] == 'Problemas de Sonido'){
                alta_incidente('IMAGEN', 'IM-1');
            }
            if($_COOKIE['registro'] == 'Baño averiado' || $_COOKIE['registro'] == 'Goteras' || $_COOKIE['registro'] == 'Fallo eléctrico'){
                alta_incidente('INSTALACIONES','IN-1');
            }
            if($_COOKIE['registro'] == 'Caída' || $_COOKIE['registro'] == 'Intoxicación'){
                alta_incidente('CLIENTES','CL-1');
            }    
            
        }
    ?>
    <form method="post" class="form" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo"class="h5 form-label">Título de la incidencia:</label>
            <input type="text" class="form-control" placeholder="<?php echo $_COOKIE['registro']; ?>" id="titulo" name="titulo" required>
        </div>
        <div class="mb-3">
            <label for="fecha"class="h5 form-label">Fecha de lo ocurrido:</label>
            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" required>
        </div>
        <div class="mb-3">
            <label for="autor"class="h5 form-label">Persona que registra la incidencia:</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
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
            <label for="sala" class="h5 form-label">Lugar de la incidencia:</label><br>
            <div class="cuatroRadios">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lugarIncidente" id="hall" value="Hall" checked>
                    <label for="lugarIncidente">Hall</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lugarIncidente" id="pasillos" value="Pasillos">
                    <label for="lugarIncidente">Pasillos</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lugarIncidente" id="baños" value="Baños">
                    <label for="lugarIncidente">Baños</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lugarIncidente" id="sala1" value="Sala 1">
                    <label for="lugarIncidente">Sala 1</label>
                </div>
            </div>
            <div class="cuatroRadios">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lugarIncidente" id="sala2" value="Sala 2">
                    <label for="lugarIncidente">Sala 2</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lugarIncidente" id="sala3" value="Sala 3">
                    <label for="lugarIncidente">Sala 3</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lugarIncidente" id="sala4" value="Sala 4">
                    <label for="lugarIncidente">Sala 4</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lugarIncidente" id="sala5" value="Sala 5">
                    <label for="lugarIncidente">Sala 5</label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <textarea name="descripcion" class="h5 p-3 form-control" id="descripcion"  rows="10" placeholder="Detalla aquí la incidencia ocurrida..."></textarea>
        </div>
        
        <div class="mb-3">
            <label for="adjuntos" class="h5 form-label">¿Algún documento a añadir?</label><br>
            <input class="archivo form-control" type="file" id="foto" name="foto[]">
        </div>
        <div class="mb-3">
            <input class="btn btn-primary text-center form-control" type="submit" name="botonDeArchivar" id="botonDeArchivar" value="GUARDAR">
        </div>
    </form>
</main>

<?php 
    
    include_once 'footer.php';
?>