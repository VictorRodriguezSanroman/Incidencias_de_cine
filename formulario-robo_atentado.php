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
            <textarea name="descripcion" id="Descripcion" cols="30" rows="10">Detalla aquí la incidencia ocurrida</textarea>
        </div>
        
        <div>
            <label for="adjuntos">¿Valor substraído?</label><br>
            <input  type="number" id="valor" name="valor">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" name="botonDeArchivar" id="botonDeArchivar" value="Guardar">
        </div>
    </form>
</main>

<?php 
    if(isset($_POST['botonDeArchivar'])){ 
        registroRoboAtentado();
    }
    include_once 'footer.php';
?>