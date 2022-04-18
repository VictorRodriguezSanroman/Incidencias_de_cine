<?php
    include_once 'header.php';

?>
<body id="fondo">
    <form id="logeo" method="post">
        <div>
            <input type="text" name="usuario" id="usuario" placeholder="usuario">
        </div>
        <div>
            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
        </div>
        <div>
            <button class="btn btn-primary">log in</button>
            
        </div>
    </form>
    <?php
    if(isset($_GET['firstName'])){
        $nombre = $_GET['firstName'];
    }else{
        $nombre = NULL;
    }
    ?>
    <a href="nuevo_usuario.php"><button class="btn btn-primary">Nuevo Usuario</button></a>

    <?php
        if(count($_POST) > 0){
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            login($usuario, $contraseña);
        }
    ?>
</body>
</html>