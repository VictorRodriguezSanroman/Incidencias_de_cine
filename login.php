<?php
    include_once 'head.php';

?>
<body id="fondo">
    <form id="logeo" method="post">
        <div>
            <input type="text" name="usuario" id="usuario" placeholder="usuario" autocomplete="off" required>
        </div>
        <div>
            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" required>
        </div>
        <div>
            <button class="btn btn-primary">log in</button>
            
        </div>
    </form>
    <?php
        if(count($_POST) > 0){
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            login($usuario, $contraseña);
        }
    ?>
</body>
</html>