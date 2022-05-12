<?php
    /************************************************************************************************
     ********************FUNCIONES NECESARIAS PARA EL FUNCIONAMIENTO DE LA APLICACIÓN ***************
     ************************************************************************************************/

     //Función para establecer la conexión con la base de datos
     function conexionBaseDatos(){
         $host = 'localhost';
         $user = 'root';
         $password = '';
         $BBDD = 'incidencias_de_cine';

         $conexion = mysqli_connect($host, $user, $password, $BBDD);

         /* mysqli_query($conexion,"SET NAMES 'UTF-8'"); */
         
         return $conexion;
     }

     function buscador(){
         //Convertimos lo introducido en un array
         $palabrasClave = explode(" ",$_POST['palabraClave']);
         $query = "SELECT * FROM LOGIN WHERE nombre LIKE '%" . $palabrasClave[0] ."%'";
         return $query;
     }

     function login($usuario, $contraseña){
         conexionBaseDatos();
         $buscaUsuario = "SELECT * FROM `LOGIN` WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
         $resultado = mysqli_query(conexionBaseDatos(),$buscaUsuario);
         while ($registro = mysqli_fetch_row($resultado)){
             setcookie('acceso',$registro[1],0);
             header('Location:index.php');
         }
         if (empty($registro)){
            print "<div class='confirmacion text-center text-danger'><strong>Error de usuario y/o contraseña</strong></div>";
         }
     }

     function compruebaCookie() {
         if(isset($_COOKIE['acceso'])){
             $existe = $_COOKIE['acceso'];
         }else{
             $existe = NULL;
         }

         if(empty($existe)){
            header("Location:login.php");
        }
     }

     function salirLogin(){
         setcookie('acceso','salir',time()-1);
     }

     function alta_incidente(){
        conexionBaseDatos();

        $titulo = $_POST['titulo'];
        $fecha =  $_POST['fecha'];
        $autor =  $_POST['autor'];
        $prioridad = $_POST['prioridad'];
        $lugar = $_POST['lugarIncidente'];
        $detalles = $_POST['descripcion'];
        $foto = $_FILES['foto']['name'];
        
        
         /* print var_dump($foto); */
        ($foto[0] === "")? $doc = 'no':  $doc = 'sí';


        $busquedaUltimoId = "SELECT MAX(ID) FROM IMAGEN";

        
        $resultado = conexionBaseDatos()->query($busquedaUltimoId);
        
        while ($registro = mysqli_fetch_row($resultado)){
            if( $registro[0] == NULL){
                $id = "IM-1";
            }else{
                $arrayDelRegistro = explode("-", $registro[0]);
                $registroNumero =intval($arrayDelRegistro[1]);
                $id = $arrayDelRegistro[0] . "-" . ($registroNumero + 1);
            }
        }
        
        //SEntencia para introducir los datos
        $sentencia = "INSERT INTO IMAGEN VALUES ('$id', '$titulo','$fecha','$autor','$prioridad','$lugar','$detalles', '$doc')";
        echo (mysqli_query(conexionBaseDatos(),$sentencia)) ? 
        '<div class="confirmacion alert alert-success m-3 col-3" role="alert">
            Alta realizada correctamente. <a href="index.php" class="alert-link">Volver</a>.
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>' : 
        '<div class="confirmacion alert alert-danger m-3 col-3" role="alert">
            Faltan campos por rellenar.
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';   
        mysqli_close(conexionBaseDatos()); 
        subeFoto($id,$foto);  
     }

     function subeFoto($id,$foto){
        //definimos la carpeta destino
        $carpetaDestino="img/imagenes_incidencias/";
        //si hay algun archivo que subir
        if(isset($_FILES["foto"]) && $_FILES["foto"]["name"][0]){
            //recorremos todos los arhivos que se han subido
            for($i=0;$i<count($_FILES["foto"]["name"]);$i++){
                //si es un formato de imagen
                if($_FILES["foto"]["type"][$i]=="image/jpeg" || $_FILES["foto"]["type"][$i]=="image/pjpeg" || $_FILES["foto"]["type"][$i]=="image/gif" || $_FILES["foto"]["type"][$i]=="image/png"){
                    //si exsite la carpeta o se ha creado
                    if(file_exists($carpetaDestino) || @mkdir($carpetaDestino)){
                        $origen=$_FILES["foto"]["tmp_name"][$i];
                        $destino=$carpetaDestino.$_FILES["foto"]["name"][$i];
                        //movemos el archivo
                        @move_uploaded_file($origen, $destino);
                    }
                }
            }
            //Renombramos el archivo con el mismo nombre que la incidencia 
            rename ("img/imagenes_incidencias/" . $foto[0], "img/imagenes_incidencias/img_".$id.".jpg");
        }
    }

    function numeroRegistros($tabla){
        conexionBaseDatos();
        $sentencia = "SELECT COUNT(ID) FROM " . $tabla;
        $resultado = conexionBaseDatos() -> query($sentencia);
        if (mysqli_query(conexionBaseDatos(),$sentencia)){
            while($registro = mysqli_fetch_row($resultado)){
                return  $registro[0];
            };     
        }     
    }
    
    $campos = array("IMAGEN","ROBOS","INSTALACIONES","CLIENTES","PRL");

    function calculoPorcentaje($tabla, $campos){
        $registrosTotales = null;
        foreach($campos as $campo){
            $registrosTotales += numeroRegistros($campo);//Sumna total de todas las incidencias 
        }
            $porcentaje = (numeroRegistros($tabla) * 100) / $registrosTotales;//Calculo porcentaje sobre una tabla en concreto (en base al total de incidencias)
        return $porcentaje;
    }
    

    function resultadoTablas($tabla,$sentencia) {
        $resultado = mysqli_query(conexionBaseDatos(), $sentencia);

        while($registro = mysqli_fetch_row($resultado)){
            print '<tr>';
                foreach($registro as $valor){
                    print '<td class=' . $valor .'>'.$valor.'</td>';
                }
                print '<td>' . $tabla . '</td>
                       <td><button type="button" class="btn btn-info btn-sm text-white d-none d-md-block">PENDIENTE</button></td>
                        <td>
                            <div class="row align-items-center">
                                <div class="col">
                                    <a href="editar_incidencia.php?id='.$registro[0].'&tabla='.$tabla.'"><button type="button" class="btn btn-outline-success btn-sm d-none d-lg-block">EDITAR</button></a>
                                </div>
                                <div class="col">
                                    <a href="borrar_incidencia.php?id='.$registro[0].'&tabla='.$tabla.'"><button type="button" class="btn btn-outline-danger btn-sm d-none d-lg-block">ARCHIVAR</button></a>
                                </div>
                            </div>
                        </td>
                ';
            print '</tr>';
        }
    }

    //Está en el index
    /* function ultimosRegistros($tipo) {
        $sentencia = "SELECT ID, asunto,prioridad, fecha FROM " . $tipo . " WHERE FECHA = (SELECT MAX(FECHA) FROM " . $tipo.")" ;
        $resultado = mysqli_query(conexionBaseDatos(), $sentencia);

        while($registro = mysqli_fetch_row($resultado)){
            print '<tr>';
                foreach($registro as $valor){
                    print '<td class=' . $valor .'>'.$valor.'</td>';
                }
                print '<td>' . $tipo . '</td>
                       <td><button type="button" class="btn btn-info btn-sm text-white d-none d-md-block">PENDIENTE</button></td>
                        <td>
                            <div class="row align-items-center">
                                <div class="col">
                                    <a href="editar_incidencia.php?id='.$registro[0].'&tabla='.$tipo.'"><button type="button" class="btn btn-outline-success btn-sm d-none d-lg-block">EDITAR</button></a>
                                </div>
                                <div class="col">
                                    <a href="borrar_incidencia.php?id='.$registro[0].'&tabla='.$tipo.'"><button type="button" class="btn btn-outline-danger btn-sm d-none d-lg-block">ARCHIVAR</button></a>
                                </div>
                            </div>
                        </td>
                ';
            print '</tr>';
        }
    } */

    //Esta en informes_fechas
    /* function resultadoBusqueda($tabla,$fechaInicio,$fechaFinal) {
        $sentencia = "SELECT ID,ASUNTO, FECHA, PRIORIDAD FROM ".$tabla." WHERE FECHA >= '$fechaInicio' AND FECHA <= '$fechaFinal'";
        $resultado = mysqli_query(conexionBaseDatos(),$sentencia);
        
        while ($registro = mysqli_fetch_row($resultado)){
                
            echo "<tr>";
            //Muestra cada uno de los valores de los campos de registro
            foreach ($registro as $valor){
                echo "<td class='campo ".$valor."'><a href='ampliar.php'>" . $valor . "</a></td>";
            }

            print '<td>' . $tabla . '</td><td>
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
        
    } */

    /* function resultadoBusquedaPrioridad($tabla,$prioridad) {
        $sentencia = "SELECT ID,ASUNTO, FECHA, PRIORIDAD FROM ".$tabla." WHERE PRIORIDAD = '$prioridad'";
        $resultado = mysqli_query(conexionBaseDatos(),$sentencia);
        
        while ($registro = mysqli_fetch_row($resultado)){
                
            echo "<tr>";
            //Muestra cada uno de los valores de los campos de registro
            foreach ($registro as $valor){
                echo "<td class='campo ".$valor."'><a href='ampliar.php'>" . $valor . "</a></td>";
            }

            print '<td>' . $tabla . '</td><td>
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
        
    } */
?>