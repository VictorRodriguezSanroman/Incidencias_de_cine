<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie();
?>
<main class="container-fluid" style="min-height:700px;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Informes - Incidencias por prioridad <?php print $_COOKIE['informesPrueba']; ?></h1>
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
                            $prioridad = $_COOKIE['informesPrueba'];   
                            foreach($campos as $campo){
                                $sentencia = "SELECT ID,ASUNTO, FECHA, PRIORIDAD FROM ".$campo." WHERE PRIORIDAD = '$prioridad'";
                                resultadoTablas($campo,$sentencia);
                            }
                        ?>
                    </tbody>
                </table>
        </div>

</main>
<?php
        
    include_once 'footer.php';
?>