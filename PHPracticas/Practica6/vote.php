<?php
setcookie("check",1);
if(isset($_POST['submit'])){
    setcookie("voted", 1);
}

?>
<html>
    <head>
        <title>Encuesta de opinion</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Encuesta</h1>
        <h3>¿Que opinas de los nuevos tranvias de la ciudad de barcelona?</h3>
        <form action ="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="radio" name="reply" value="0">
        Una idea excelente, los tranvias son rapidos y eficientes.<br>
        <input type="radio" name="reply" value="1">
        Me da igual, siempre voy en coche.<br>
        <input type="radio" name="reply" value="2">
        ¡Barcelona no necesita tranvias!
        <br><br>
        <?php
        if(empty($_POST['submit']) && empty($_COOKIE['voted'])){
            //Mostrar solo el boton submit solo si el formulario todavia
            //no se ha enviado y el usuario no ha votado.
        ?>
        <input name="submit" type="submit" value="Vota!">
        <?php
        } else {
            echo "<p>Gracias por tu voto</p>\n";
            //Formulario enviado? ¿Cookies activas? ¿Pero todavia no se ha votado?
            if(isset($_POST['reply']) && isset($_COOKIE['check']) && empty($_COOKIE['voted']) ){
                //Guardar nombre de archivo en variable
                $file = "result.txt";
                $fp = fopen($file, "r+");
                if(filesize($file)>0){
                    $vote = fread($fp, filesize($file));
                }
                //Descomoponer string del archivo en array con coma como separador
                $arr_vote = explode(",", $vote); //explode convierte la string en array
                //¿Que valor se ha seleccionado en el formulario?
                //El recuento aumenta en 1
                $reply = $_POST['reply'];
                $arr_vote[$reply]++;
                //Volver a montar la string
                $vote = implode(",", $arr_vote); //implode vincula elementos de la array a string
                rewind($fp);
                //Escribir nueva string en el archivo
                fputs($fp, $vote);
                fclose($fp);
            }
        }
        ?>
        </form>
        <p>
            (<a href="results.php" target="_blank">Ver resultados de la encuesta</a>)
        </p>
    </body>
</html>