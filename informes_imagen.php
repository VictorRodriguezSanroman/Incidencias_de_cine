<?php
    include_once 'head.php';
    include_once 'nav.php';
    compruebaCookie();
    include 'informes.php';
?>
<main class="container-fluid" style="height:500px;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Informes - Incidencias por imagen</h1>
    </div>
    <?php
        buscaImagen();
        function buscaImagen (){
            $sentencia ="SELECT * FROM IMAGEN";
            $resultado = mysqli_query(conexionBaseDatos(),$sentencia);

            //Muestra el número de registros del resultado de la consulta SQL
            echo "Registros: " . mysqli_num_rows($resultado) . "<br>";

            if(mysqli_query(conexionBaseDatos(),$sentencia)){
    ?>
        <table class="table table-striped">

                    <tr>
                    <?php
                        //Cabecera de la tabla
                        $cabecera = array("ID","ASUNTO","FECHA","AUTOR", "LUGAR","DETALLES","IMÁGENES", "ACCIONES");
                        foreach($cabecera as $dato){
                            echo "<td class='fw-bold'>" . $dato . "</td>";
                        }
                    ?>
                    </tr>
    <?php
                    while ($registro = mysqli_fetch_row($resultado)){
                            
                        echo "<tr>";
                        //Muestra cada uno de los valores de los campos de registro
                        foreach ($registro as $valor){
                            echo "<td class='campo'><a href='ampliar.php'>" . $valor . "</a></td>";
                        }

                        echo '<td>
                            <div class="row align-items-center">
                                <div class="col">
                                    <a href="editar_incidencia.php?id='.$registro[0].'&tabla=IMAGEN"><button type="button" class="btn btn-outline-success btn-sm d-none d-lg-block">EDITAR</button></a>
                                </div>
                                <div class="col">
                                    <a href="borrar_incidencia.php?id='.$registro[0].'&tabla=IMAGEN"><button type="button" class="btn btn-outline-danger btn-sm d-none d-lg-block">ARCHIVAR</button></a>
                                </div>
                            </div>
                        </td>';


                        echo "</tr>"; 
                    }
             }
    ?>
    
    </table>
</main>
<?php
        }
    include_once 'footer.php';
?>