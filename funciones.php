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
         
         return $conexion;
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

     function alta_incidente($campo,$id){
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

        $busquedaUltimoId = "SELECT MAX(ID) FROM " . $campo;
  
        $resultado = conexionBaseDatos()->query($busquedaUltimoId);
        
        while ($registro = mysqli_fetch_row($resultado)){
            if( $registro[0] !== NULL){
            
                $arrayDelRegistro = explode("-", $registro[0]);
                $registroNumero =intval($arrayDelRegistro[1]);
                $id = $arrayDelRegistro[0] . "-" . ($registroNumero + 1);
            }
        }
        //SEntencia para introducir los datos
        $sentencia = "INSERT INTO " . $campo. " VALUES ('$id', '$titulo','$fecha','$autor','$prioridad','$lugar','$detalles', '$doc')";
        echo (mysqli_query(conexionBaseDatos(),$sentencia)) ? 
        '<div class="confirmacion alert alert-primary m-3 col-3" role="alert">
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

     function registroRoboAtentado() {
        conexionBaseDatos();

        $titulo = $_POST['titulo'];
        $fecha =  $_POST['fecha'];
        $autor =  $_POST['autor'];
        $prioridad = $_POST['prioridad'];
        $detalles = $_POST['descripcion'];
        $valor = $_POST['valor'];
        
        $busquedaUltimoId = "SELECT MAX(ID) FROM ROBOS";

        
        $resultado = conexionBaseDatos()->query($busquedaUltimoId);
        
        while ($registro = mysqli_fetch_row($resultado)){
            if( $registro[0] == NULL){
                $id = "RB-1";
            }else{
                $arrayDelRegistro = explode("-", $registro[0]);
                $registroNumero =intval($arrayDelRegistro[1]);
                $id = $arrayDelRegistro[0] . "-" . ($registroNumero + 1);
            }
        }
        
        //SEntencia para introducir los datos
        $sentencia = "INSERT INTO ROBOS VALUES ('$id', '$titulo','$autor','$prioridad','$detalles','$fecha', '$valor')";
        echo (mysqli_query(conexionBaseDatos(),$sentencia)) ? 
        '<div class="confirmacion alert alert-primary m-3 col-3" role="alert">
            Alta realizada correctamente. <a href="index.php" class="alert-link">Volver</a>.
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>' : 
        '<div class="confirmacion alert alert-danger m-3 col-3" role="alert">
            Faltan campos por rellenar.
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';   
        mysqli_close(conexionBaseDatos()); 
     }
     
     function registroPRL() {
        conexionBaseDatos();

        $titulo = $_POST['titulo'];
        $fecha =  $_POST['fecha'];
        $autor =  $_POST['autor'];
        $afectado = $_POST['afectado'];
        $prioridad = $_POST['prioridad'];
        $detalles = $_POST['descripcion'];

        $busquedaUltimoId = "SELECT MAX(ID) FROM PRL";

        
        $resultado = conexionBaseDatos()->query($busquedaUltimoId);
        
        while ($registro = mysqli_fetch_row($resultado)){
            if( $registro[0] == NULL){
                $id = "PR-1";
            }else{
                $arrayDelRegistro = explode("-", $registro[0]);
                $registroNumero =intval($arrayDelRegistro[1]);
                $id = $arrayDelRegistro[0] . "-" . ($registroNumero + 1);
            }
        }
        
        //SEntencia para introducir los datos
        $sentencia = "INSERT INTO PRL VALUES ('$id', '$titulo','$autor','$prioridad','$afectado','$detalles','$fecha')";
        echo (mysqli_query(conexionBaseDatos(),$sentencia)) ? 
        '<div class="confirmacion alert alert-primary m-3 col-3" role="alert">
            Alta realizada correctamente. <a href="index.php" class="alert-link">Volver</a>.
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>' : 
        '<div class="confirmacion alert alert-danger m-3 col-3" role="alert">
            Faltan campos por rellenar.
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';   
        mysqli_close(conexionBaseDatos()); 
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
    
    $campos = array("IMAGEN","ROBOS","INSTALACIONES","CLIENTES","PRL");//Array común a todos los informes ya que se trata de un listado con los nombres de las 5 tablas de la base de datos

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
                    print "<td class='campo ".$valor."'><a href='ampliar.php?id=". $registro[0] ."'>" . $valor . "</a></td>";
                }
                print '<td>' . $tabla . '</td>
                       <td><button type="button" class="btn btn-info btn-sm text-white d-none d-md-block">PENDIENTE</button></td>
                        <td>
                            <div class="row align-items-center">
                                
                                <div class="col">
                                    <a href="borrar_incidencia.php?id='.$registro[0].'&tabla='.$tabla.'"><button type="button" class="btn btn-outline-danger btn-sm d-none d-lg-block">ELIMINAR</button></a>
                                </div>
                            </div>
                        </td>
                ';
            print '</tr>';
        }
    }
     
    function desglose($prueba,$id){
        $sentencia = "SELECT * FROM ".$prueba." WHERE ID = '$id'";
        $resultado = mysqli_query(conexionBaseDatos(),$sentencia);
        switch ($prueba) {
            case $prueba == 'ROBOS':
                $titulo = ['Id','Título','Persona que rellena el informe','Prioridad','Detalles de lo ocurrido','Fecha','Cantidad sustraida'];
                break;
            case $prueba == 'PRL':
                $titulo = ['Id','Título','Persona que rellena el informe','Prioridad','Trabajador afectado','Detalles de lo ocurrido','Fecha'];
                break;
            default:
                $titulo = ['Id','Título','Fecha','Persona que rellena el informe','Prioridad','Lugar de la incidencia','Detalles de lo ocurrido','¿Fotografías añadidas de los hechos?'];
                break;
        }
        $i = 0;
        while($registro = mysqli_fetch_row($resultado)){
            foreach($registro as $campo){
                print '<h5>'.$titulo[$i].'</h5>';
                print '<div>'.$campo . '</div>';
                $i++;
            }
            if(isset($registro[7])){
                if ($registro[7] == 'SI'){

                    print '<div id="foto">
                            <img src="img/imagenes_incidencias/img_' . $id. '.jpg">
                        </div>';
            
                }
            }
            
        }
    }
?>