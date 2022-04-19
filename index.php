<?php
    include_once 'header.php';
    include_once 'nav.php';
    compruebaCookie();
?>
<main class= "container-fluid">
    <div class="row">
        <!-- Incidencias en la proyección -->
        <div class="col-lg m-4 parrilla">
                <form action="proyeccion.php" method="post" enctype="multipart/form-data">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/projector.svg" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" id="proyector">
                        <option value="imagen">Imagen</option>
                        <option value="sonido">Sonido</option>
                    </select>   
                </form>   
        </div>
        <!-- Incidencias clientes -->
        <div class="col-lg m-4 parrilla">
                <form action="proyeccion.php" method="post" enctype="multipart/form-data">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/projector.svg" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" id="clientes">
                        <option value="Caída">Caída</option>
                        <option value="Intoxicación">Intoxicación</option>
                    </select>   
                </form>   
        </div>
    </div>
    <div class="row">
        <!-- incidencias robo/atentado -->
        <div class="col-lg m-4 parrilla">
                <form action="proyeccion.php" method="post" enctype="multipart/form-data">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/projector.svg" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" id="robo/atentado">
                        <option value="Aviso de bomba">Aviso de bomba</option>
                        <option value="Posible robo en el local">Posible robo en el local</option>
                    </select>   
                </form>   
        </div>
        <!-- incidencias instalaciones -->
        <div class="col-lg m-4 parrilla">
                <form action="proyeccion.php" method="post" enctype="multipart/form-data">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/projector.svg" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" id="instalaciones">
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
                <form action="proyeccion.php" method="post" enctype="multipart/form-data">
                    <button class="botonIcons">
                        <img type="submit" src="img/icons/projector.svg" class="iconosIndex" alt="Proyector">
                    </button>
                    <br>
                    <select name="incidencia" id="PRL">
                        <option value="Accidente laboral">Accidente laboral</option>
                    </select>   
                </form>   
        </div>
        <!-- <div class="col-lg m-4 parrilla">
            <img src="img/icons/projector.svg" class="iconosIndex" alt="Proyector">
        </div> -->
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
