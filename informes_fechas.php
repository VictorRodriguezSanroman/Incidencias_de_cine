<?php
    include_once 'head.php';
    compruebaCookie();
    include_once 'nav.php';
    if(isset($_COOKIE['informePrueba'])){
        $tituloFechas = $_COOKIE['informePrueba'];
    }else{
        $tituloFechas = 'Fechas';
    }
?>
<main class="container-fluid" style="min-height:700px;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Informes - Incidencias por <?php print $tituloFechas; ?></h1>
    </div>
    <div>
        <form action="informes_fechas.php" class="form-inline mb-2" METHOD="post">
            <div class="row">
                <div class="col-lg-2 m-1">
                        <!-- Aquí introducimos la fecha de inicio -->
                    <label for="inicio" class="labelFechas">Inicio:</label>
                    <input type="date" id="inicio" name="inicio" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="col-lg-2 m-1">
                    <!-- Aquí introducimos la fecha final del periodo que queremos buscar -->
                    <label for="final" class="labelFechas">Final:</label>
                    <input type="date" id="final" name="final" value="<?php echo date("Y-m-d"); ?>">
                </div>   
            </div>
            <div clas="row">
                    <div class="col-lg-4 m-2 ">
                        <!-- Botón de busqueda de fechas -->
                        <button class="col-lg-4 btn btn-primary" name="buscar">Buscar</button>
                    </div>
            </div>
        </form>
    </div>
    

    <?php
    
        if(isset($_POST['buscar'])){
            $fechaInicio = $_POST['inicio'];
            $fechaInicioSeparada = explode('-',$fechaInicio);
            $diaInicio = $fechaInicioSeparada[2];
            $mesInicio = $fechaInicioSeparada[1];
            $añoInicio = $fechaInicioSeparada[0];
            $fechaFinal = $_POST['final'];
            $fechaFinalSeparada = explode('-',$fechaFinal);
            $diaFinal = $fechaFinalSeparada[2];
            $mesFinal = $fechaFinalSeparada[1];
            $añoFinal = $fechaFinalSeparada[0];

                ?>

            <div class="col-12 p-3">
                <h4 class="text-center">Periodo del <?php echo $diaInicio . '/' . $mesInicio . '/' . $añoInicio; ?> al <?php echo $diaFinal. '/' . $mesFinal . '/' . $añoFinal; ?></h4>
            </div>
            <div class="bd-example">
                <table class="table table-responsive table-striped bg-light">
                    <thead>
                    <tr class="text-primary">
                      <th scope="col">#ID</th>
                      <th scope="col">Asunto</th>
                      <th scope="col">Fecha</th> 
                      <th scope="col">Prioridad</th>
                      <th scope="col">Tipo</th>
                      <th scope="col" class="d-none d-md-block">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php    
                            foreach($campos as $campo){
                                $sentencia = "SELECT ID,ASUNTO, FECHA, PRIORIDAD FROM ".$campo." WHERE FECHA >= '$fechaInicio' AND FECHA <= '$fechaFinal'";
                                resultadoTablas($campo,$sentencia);
                            }
                        ?>
                    </tbody>
                </table>
        </div>
            <?php
            
            
        }

        
            ?>
</main>
<?php
        
    include_once 'footer.php';
?>