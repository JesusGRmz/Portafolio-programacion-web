<html>
    <head>
        <title>¿Conocer la contraseña?</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>¿Conoces la contraseña?(pass3.php)</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="pw">
            <input type="submit" name="Envialo">
        </form>
        <?php
        if(isset($_POST['pw'])){
            $pw = $_POST['pw'];
            switch($pw){
                case "contra":
        ?>
        <h3>1. Seccion protegida</h3>
        <p>Contenido...</p>
        <?php
                break;
                case "contra1":
        ?>
        <h3>2. Seccion protegida</h3>
        <p>Contenido interesante...</p>
        <?php
                break;
                default:
        ?>
        <h1>Lo siento</h1>
        <h2>Sorry, ha ingresado una contraseña incorrecta</h2>
        <?php
            }
        }
        ?>
    </body>
</html>