<body id="cuerpo">
<nav id="barra" class="navbar nav-tabs navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="margin: 0 auto;">
                <img class="img-fluid" style="max-width: 50px" src="img/logo.png" loading="lazy">     
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">           
                        <a class="nav-link" href="registro.php">
                            <img src="https://img.icons8.com/ios/25/000000/ingredients-list.png"/>
                            Nueva incidencia
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://img.icons8.com/dotty/25/000000/combo-chart.png"/>    
                            Informes por tipo
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="cookie_informes.php?campo=Imagen">Imagen/sonido</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cookie_informes.php?campo=Instalaciones">Instalaciones</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cookie_informes.php?campo=Robos">Robo/atentado</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cookie_informes.php?campo=PRL">PRL</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cookie_informes.php?campo=Clientes">Incidencias con clientes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="informes_fechas.php">
                            <img src="https://img.icons8.com/dotty/25/000000/employee-card.png"/>   
                            Informe por rango de fechas
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://img.icons8.com/dotty/25/000000/combo-chart.png"/>    
                            Informes por prioridad
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="cookie_informes.php?campo=Alta">ALTA</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cookie_informes.php?campo=Media">MEDIA</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cookie_informes.php?campo=Baja">BAJA</a></li>
                        </ul>
                    </li>
                </ul>                 
                <div id="prueba">Bienvenido <?php print $_COOKIE['acceso'] . '<a href="borrar_cookie.php"> (Salir)</a>'; ?></div>
            </div> 
        </div>
    </nav>