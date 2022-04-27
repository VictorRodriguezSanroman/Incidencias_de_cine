<?php
    include_once 'header.php';
    include_once 'nav.php';
    compruebaCookie();
?>

<main class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row p-4">
        <div class="col-sm-9 bg-white p-3" style="margin-right:30px;">
            <span class="text-secondary">Imagen y sonido</span>
                <div class="progress mb-3" style="height: 3px;">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="text-secondary">Instalaciones</span>
                <div class="progress mb-3" style="height: 3px;">
                    <div class="progress-bar bg-success w-60" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <span class="text-secondary">Robos</span>
                <div class="progress mb-3" style="height: 3px;">
                    <div class="progress-bar bg-warning w-40" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <span class="text-secondary">PRL</span>
                <div class="progress mb-3" style="height: 3px;">
                    <div class="progress-bar bg-danger w-90" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>      
                
                <span class="text-secondary">Incidencias clientes</span>
                  <div class="progress mb-3" style="height: 3px;">
                    <div class="progress-bar bg-info w-90" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
        </div>
        <div class="col bg-white p-3" >
            <div class="row p-3">
                <div class="col">
                    <span>Nueva incidencia</span>
                </div>
                <div class="col">
                    <a href="index.php"><button class="btn btn-primary">+</button></a>
                </div>
            </div>
            <div class="row p-3">
                <div class="col">
                    <p style="text-align:justify;">"lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumy eirmod tempor"</p>
                </div>
            </div>
                
        </div>

    </div>
    <div class="row p-4">
        <div class="col-sm bg-white p-3" style="height:400px;">

        </div>
    </div>
</main>
    
    
    
    
    
    
    
    
    
    
    
    
    
<?php
    include_once 'footer.php';
?>