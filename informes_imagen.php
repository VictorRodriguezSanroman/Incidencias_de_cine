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
    buscaRegistros($_COOKIE['informesPrueba']);
        
        function buscaRegistros($tabla){
            $sentencia ="SELECT id, asunto, fecha, prioridad FROM " . $tabla;
            $resultado = mysqli_query(conexionBaseDatos(),$sentencia);

            //Muestra el número de registros del resultado de la consulta SQL
            echo "Registros: " . mysqli_num_rows($resultado) . "<br>";

            if(mysqli_query(conexionBaseDatos(),$sentencia)){
    ?>
        <table class="table table-striped bg-light">
                <thead>
                    <tr class="text-primary">
                        <?php
                            //Cabecera de la tabla
                            $cabecera = array("#ID","Asunto","Fecha","Prioridad", "Estado","Acciones");
                                foreach($cabecera as $dato){
                                    echo "<th scope='col'>" . $dato . "</th>";
                                }                
                        ?>
                    </tr>
                </thead>
                    
    <?php
                    while ($registro = mysqli_fetch_row($resultado)){
                            
                        echo "<tr>";
                        //Muestra cada uno de los valores de los campos de registro
                        foreach ($registro as $valor){
                            echo "<td class='campo ".$valor."'><a href='ampliar.php?id=". $registro[0] ."'>" . $valor . "</a></td>";
                        }
                        echo '<td><button type="button" class="btn btn-info btn-sm text-white d-none d-md-block">PENDIENTE</button></td>';
                        echo '<td>
                            <div class="row align-items-center">
                                <div class="col">
                                    <a href="borrar_incidencia.php?id='.$registro[0].'&tabla='.$tabla.'"><button type="button" class="btn btn-outline-danger btn-sm d-none d-lg-block">ELIMINAR</button></a>
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