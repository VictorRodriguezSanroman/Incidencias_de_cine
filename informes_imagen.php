<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie();
    /* include 'informes.php'; */
    /* (isset($_POST['informes'])) ? $tipoInformes = $_POST['informes'] : $tipoInformes = '';//HACERLO POR COOKIES!!!!
    setcookie('informesPrueba',$tipoInformes,0); */
?>
<main class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Informes - Incidencias por <?php print $_COOKIE['informesPrueba']; ?></h1>
    </div>
    <?php

    //Utilizamos if para que, en función de la cookie almacenada nos lleve al informe que deseamos o nos quedemos en este
/*     if ($_COOKIE['informesPrueba'] == 'fechas'){
        header('Location:informes_fechas.php');
    }
    if ($_COOKIE['informesPrueba'] == 'Alta'|| $_COOKIE['informesPrueba'] == 'Media' || $_COOKIE['informesPrueba'] == 'Baja'){

        header('Location:informes_prioridad.php');
    } */
    
    buscaRegistros($_COOKIE['informesPrueba']);
        
        function buscaRegistros($tabla){
            $sentencia ="SELECT id, asunto, fecha, prioridad FROM " . $tabla;
            $resultado = mysqli_query(conexionBaseDatos(),$sentencia);

            //Muestra el número de registros del resultado de la consulta SQL
            echo "Registros: " . mysqli_num_rows($resultado) . "<br>";

            if(mysqli_query(conexionBaseDatos(),$sentencia)){
    ?>
        <table class="table table-striped">

                    <tr>
                    <?php
                        //Cabecera de la tabla
                        $cabecera = array("ID","ASUNTO","FECHA","PRIORIDAD", "ACCIONES");
                            foreach($cabecera as $dato){
                                echo "<td class='fw-bold '>" . $dato . "</td>";
                            }                
                    ?>
                    </tr>
    <?php
                    while ($registro = mysqli_fetch_row($resultado)){
                            
                        echo "<tr>";
                        //Muestra cada uno de los valores de los campos de registro
                        foreach ($registro as $valor){
                            echo "<td class='campo ".$valor."'><a href='ampliar.php?id=". $registro[0] ."'>" . $valor . "</a></td>";
                        }

                        echo '<td>
                            <div class="row align-items-center">
                                <div class="col">
                                    <a href="editar_incidencia.php?id='.$registro[0].'&tabla='.$tabla.'"><button type="button" class="btn btn-outline-success btn-sm d-none d-lg-block">EDITAR</button></a>
                                </div>
                                <div class="col">
                                    <a href="borrar_incidencia.php?id='.$registro[0].'&tabla='.$tabla.'"><button type="button" class="btn btn-outline-danger btn-sm d-none d-lg-block">ARCHIVAR</button></a>
                                </div>
                            </div>
                        </td>';


                        echo "</tr>"; 
                    }
             }
    ?>
    
    </table>
    <?php
        }

    ?>
    
</main>
<?php
        
    include_once 'footer.php';
?>