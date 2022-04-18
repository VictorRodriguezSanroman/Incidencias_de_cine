<?php
    require_once 'funciones.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INCIDENCIAS</title>
        <link rel="stylesheet" href="style/style.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body id="cuerpo">
    <nav id="barra" class="navbar nav-tabs navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <!-- <img class="img-fluid" style="max-width: 50px" src="img/#" loading="lazy"> -->
                LOGO
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                                
                        <a class="nav-link" href="#">
                            <img src="https://img.icons8.com/ios/25/000000/ingredients-list.png"/>
                            Item 1
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#">
                            <img src="https://img.icons8.com/dotty/25/000000/employee-card.png"/>   
                            Item 2
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://img.icons8.com/dotty/25/000000/combo-chart.png"/>    
                            Item 3
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Subitem 1</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Subitem 2</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Subitem 3</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="buscador.php" method="post">
                    <input class="form-control me-2" type="search" placeholder="Escribe palabras clave" aria-label="Search" name="palabraClave">
                    <button class="btn btn-outline-primary" type="submit"name="buscar">Buscar</button>
                </form>
            </div>
        </div>
    </nav>