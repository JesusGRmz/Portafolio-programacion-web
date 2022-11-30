<html>
    <head>
        <title>Encuesta de opinion</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Resultados de la encuesta</h1>
        <?php
        $vote="";
        $allvotes=[];
        $length0=[];
        $length1=[];
        $length2=[];
        $file = "result.txt";
        $fp = fopen($file, "r");
        if(filesize($file)>0){
            $vote = fread($fp, filesize($file));
        }
        fclose($fp);
        //Se divide la string, se crea el array
        $vote = explode(",", $vote);
        //Cantidad de votos total
        $allvotes = $vote[0] + $vote[1] + $vote[2];
        //Longitud maxima de la barra
        $length = 400;
        //Cuota de la opcion 1 (valor indice 0)
        $length0 = $vote[0] * $length / $allvotes;
        //Cuota de la opcion 2 (valor indice 1)
        $length1 = $vote[1] * $length / $allvotes;
        //Cuota de la opcion 2 (valor indice 2)
        $length2 = $vote[2] * $length / $allvotes;
        //Redondeo de valores
        $length0 = round($length0);
        $length1 = round($length1);
        $length2 = round($length2);
        //Calcular y redondear porcentaje de 0
        $percent0 = 100 * $vote[0] / $allvotes;
        $percent0 = round($percent0, 0);
        //Calcular y redondear porcentaje de 1
        $percent1 = 100 * $vote[1] / $allvotes;
        $percent1 = round($percent1, 0);
        //Calcular y redondear porcentaje de 2
        $percent2 = 100 * $vote[2] / $allvotes;
        $percent2 = round($percent2, 0);
        //Mostrar solo para uso de fines de prueba:
        
        //echo "$length0 $length1 $length2";

        ?>
        <h3>Resultados</h3>
        <table border="0">
            <tr>
                <td><b>Opcion 1</b></td>
                <td>&nbsp;</td><td width="<?php echo $length0; ?>" bgcolor="red">&nbsp;</td>
                <td>&nbsp;<?php echo "$percent0%"; ?> &nbsp; (<i><?php echo $vote[0];?></i>)</td>
            </tr>
        </table>
        <table border="0">
            <tr>
                <td><b>Opcion 2</b></td>
                <td>&nbsp;</td><td width="<?php echo $length1; ?>" bgcolor="green">&nbsp;</td>
                <td>&nbsp;<?php echo "$percent1%"; ?> &nbsp; (<i><?php echo $vote[1];?></i>)</td>
            </tr>
        </table>
        <table border="0">
            <tr>
                <td><b>Opcion 3</b></td>
                <td>&nbsp;</td><td width="<?php echo $length2; ?>" bgcolor="black">&nbsp;</td>
                <td>&nbsp;<?php echo "$percent2%"; ?> &nbsp; (<i><?php echo $vote[2];?></i>)</td>
            </tr>
        </table>
    </body>
</html>