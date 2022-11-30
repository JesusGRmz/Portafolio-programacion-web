<html>
    <head>
        <title>¿Conocer la contraseña?</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>¿Conoces la contraseña?(pass2.php)</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="pw">
            <input type="submit" name="Envialo">
        </form>
        <?php
        if(isset($_POST['pw'])){
            $pw = $_POST['pw'];
            if($pw == 'contra'){
        ?>
        <h3>1. Seccion protegida</h3>
        <p>Contenido...</p>
        <?php
            } elseif ($pw == "contra1") {
        ?>
        <h3>2. Seccion protegida</h3>
        <p>Contenido interesante...</p>
        <?php
            } else {
        ?>
        <h1>Lo siento</h1>
        <h2>Sorry, ha ingresado una contraseña incorrecta</h2>
        <?php
            }
        }
        ?>
    </body>
</html>