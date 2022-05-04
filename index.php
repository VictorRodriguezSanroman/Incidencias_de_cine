<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie(); 
?>

<main class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row p-4">
        <div class="col-sm-8 bg-white p-3" style="margin-right:30px;">
            <span class="text-secondary">Imagen y sonido</span>
                <div class="progress mb-3" style="height: 15px;">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo calculoPorcentaje("IMAGEN",$campos) ?>%;" aria-valuenow="<?php echo calculoPorcentaje("IMAGEN",$campos) ?>" aria-valuemin="0" aria-valuemax="100"><?php print numeroRegistros("IMAGEN") ?></div>
                </div>
                <span class="text-secondary">Instalaciones</span>
                <div class="progress mb-3 " style="height:15px;">
                    <div class="progress-bar bg-success w-60" role="progressbar" style="width: <?php echo calculoPorcentaje("INSTALACIONES",$campos) ?>%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><?php print numeroRegistros("INSTALACIONES") ?></div>
                </div>

                <span class="text-secondary">Robos</span>
                <div class="progress mb-3" style="height: 15px;">
                    <div class="progress-bar bg-warning w-40" role="progressbar" style="width: <?php echo calculoPorcentaje("ROBOS",$campos) ?>%;" aria-valuenow="<?php echo calculoPorcentaje("ROBOS",$campos) ?>" aria-valuemin="0" aria-valuemax="100"><?php print numeroRegistros("ROBOS") ?></div>
                </div>

                <span class="text-secondary">PRL</span>
                <div class="progress mb-3" style="height: 15px;">
                    <div class="progress-bar bg-danger w-90" role="progressbar" style="width: <?php echo calculoPorcentaje("PRL",$campos) ?>%;" aria-valuenow="<?php echo calculoPorcentaje("PRL",$campos) ?>" aria-valuemin="0" aria-valuemax="100"><?php print numeroRegistros("PRL") ?></div>
                </div>      
                
                <span class="text-secondary">Incidencias clientes</span>
                  <div class="progress mb-3" style="height: 15px;">
                    <div class="progress-bar bg-info w-90" role="progressbar" style="width: <?php echo calculoPorcentaje("CLIENTES",$campos) ?>%;" aria-valuenow="<?php echo calculoPorcentaje("CLIENTES",$campos) ?>" aria-valuemin="0" aria-valuemax="100"><?php print numeroRegistros("CLIENTES") ?></div>
                  </div>
        </div>
        <div class="col bg-white p-3" >
            <div class="row p-3">
                <div class="col">
                    <span>Nueva incidencia</span>
                </div>
                <div class="col">
                    <a href="registro.php"><button class="btn btn-primary">+</button></a>
                </div>
            </div>
            <div class="row p-3">
                <div class="col">
                    <p style="text-align:justify;" id="frases">"El hombre cauto jamás deplora el mal presente; emplea el presente en prevenir las aflicciones futuras"</p>
                </div>
            </div>    
        </div>
    </div>
    <div class="row p-4">
        <div class="col-sm bg-white p-3">
            <div class="border-bottom text-black">
                <h4>Últimas incidencias registradas</h4>
            </div>
            <div class="bd-example">
                <table class="table table-responsive">
                    <thead>
                    <tr class="text-primary">
                      <th scope="col">#ID</th>
                      <th scope="col">Asunto</th> 
                      <th scope="col">Fecha</th>
                      <th scope="col">Tipo</th>
                      <th scope="col" class="d-none d-md-block">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php    
                            foreach($campos as $titulo){
                                ultimosRegistros($titulo);
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</main>
    
    
<?php
    include_once 'footer.php';
?>