<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie();
?>
<main class= "container-fluid">
    <div class="row">
        <!-- Incidencias en la proyección -->
        <div class="col-lg m-4 parrilla">
                <form action="proyeccion.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/projector.png" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" class="form-select" aria-label="Default select example" id="proyector">
                        <option selected disabled>Selecciona una opción</option>
                        <option value="Problemas en la imagen">Imagen</option>
                        <option value="Problemas de Sonido">Sonido</option>
                    </select>   
                </form>   
        </div>
        <!-- Incidencias clientes -->
        <div class="col-lg m-4 parrilla">
                <form action="proyeccion.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
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
                <form action="proyeccion.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
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
                <form action="proyeccion.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
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
                <form action="proyeccion.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
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
                <form action="proyeccion.php" method="post" enctype="multipart/form-data" class="botonesPrincipales">
                    <button class="botonIcons" name="incidencia" value="varios">
                        <img type="submit" src="img/icons/interrogation.png" class="iconosIndex" alt="Proyector">
                    </button>
                    <br><br><br>
                    <!-- <select name="incidencia" class="form-select" aria-label="Default select example" id="PRL">
                        <option selected disabled>Selecciona una opción</option>    
                    </select>  -->  
                </form>   
        </div>
        
    </div>
    <!-- <div class="row">
        <div class="col-lg m-4 parrilla">
            <img src="img/icons/projector.svg" class="iconosIndex" alt="Proyector">
        </div>
        <div class="col-lg m-4 parrilla">
            <img src="img/icons/projector.svg" class="iconosIndex" alt="Proyector">
        </div>
    </div> -->
</main>
<?php
    include_once 'footer.php';  

?>
