<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie();
?>
<main class= "container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Registro de incidencias e informes</h1>
    </div>
    <div class="row">
        <!-- Incidencias en la proyección -->
        <div class="col-lg m-4 parrilla">
                <form action="cookie_formularios.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
                    <button class="botonIcons" >
                        <img id="alta" type="submit" src="img/icons/projector.png" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" class="form-select" aria-label="Default select example" id="proyector" required ="on">
                        <option selected disabled>Selecciona una opción</option>
                        <option value="Problemas en la imagen">Imagen</option>
                        <option value="Problemas de Sonido">Sonido</option>
                    </select>   
                </form>   
        </div>
        <!-- Incidencias clientes -->
        <div class="col-lg m-4 parrilla">
                <form action="cookie_formularios.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/fallen.png" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" class="form-select" aria-label="Default select example" id="clientes">
                        <option selected disabled>Selecciona una opción</option>
                        <option value="Caída">Caída</option>
                        <option value="Intoxicación">Intoxicación</option>
                    </select>   
                </form>   
        </div>
    </div>
    <div class="row">
        <!-- incidencias robo/atentado -->
        <div class="col-lg m-4 parrilla">
                <form action="formulario-robo_atentado.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/bomb.png" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" class="form-select" aria-label="Default select example" id="robo/atentado">
                        <option selected disabled>Selecciona una opción</option>
                        <option value="Aviso de bomba">Aviso de bomba</option>
                        <option value="Posible robo en el local">Posible robo en el local</option>
                    </select>   
                </form>   
        </div>
        <!-- incidencias instalaciones -->
        <div class="col-lg m-4 parrilla">
                <form action="cookie_formularios.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/maintenance.png" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" class="form-select" aria-label="Default select example" id="instalaciones">
                        <option selected disabled>Selecciona una opción</option>    
                        <option value="Goteras">Goteras</option>
                        <option value="Baño averiado">Baño averiado</option>
                        <option value="Fallo eléctrico">Fallo eléctrico</option>
                    </select>   
                </form>   
        </div>
    </div>
    <div class="row">
        <!-- Incidencias PRL -->
        <div class="col-lg m-4 parrilla">
                <form action="formulario-prl.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/laboral.png" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" class="form-select" aria-label="Default select example" id="PRL">
                        <option selected disabled>Selecciona una opción</option>    
                        <option value="Accidente laboral">Accidente laboral</option>
                    </select>   
                </form>   
        </div>

        <div class="col-lg m-4 parrilla">
                <form action="cookie_informes.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
                    <button class="botonIcons" name="incidencia" value="varios">
                        <img type="submit" src="img/icons/informes.png" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="informes" class="form-select" aria-label="Default select example" id="informes">
                        <option selected disabled>Selecciona una opción</option>    
                        <optgroup label="Por tipo">
                            <option value="Imagen">Imagen</option>
                            <option value="Clientes">Incidencias clientes</option>
                            <option value="Robos">Robo/atentado</option>
                            <option value="Instalaciones">Instalaciones</option>
                            <option value="PRL">PRL</option>
                        </optgroup>
                        <optgroup label="Por fechas">
                            <option value="fechas">Rango de fechas</option>
                        </optgroup>
                        <optgroup label="Por prioridad">
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Baja">Baja</option>
                        </optgroup>
                    </select>   
                </form>   
        </div>
        
    </div>
</main>
<?php
    include_once 'footer.php';  

?>
