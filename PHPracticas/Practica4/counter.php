<html>
    <head>
        <title>Contador</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Contador sencillo</h1>
        <p>
        <?php
        $archivo = "contador.txt";
        $contador = 0;
        
        $fp = fopen($archivo,"r");
        $contador = fgets($fp, 26);
        fclose($fp);
        
        ++$contador;
        
        $fp = fopen($archivo,"w+");
        fwrite($fp, $contador, 26);
        fclose($fp);
        
        echo "Cantidad de visitas $contador";
        ?>
        </p>
    </body>
</html>