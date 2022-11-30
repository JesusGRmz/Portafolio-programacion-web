<html>
    <head>
        <title>Un libro de visitas sencillo</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Libro de visitas</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Tu comentario:<br>
        <textarea cols="55" rows="4" name="comment"></textarea><br>
        Tu nombre:<br>
        <input type="text" name="name"><br>
        Tu email:<br>
        <input type="text" name="email">
        <input type="submit" name="Publicar">
        </form>
        <h3>Mostrar todos los comentarios</h3>
        <?php
        //Guarda el nombre del archivo en la variable
        $file = "guestbook.txt";
        //¿Variable commment definida? ¿Nombre y e-mail no estan vacios?
        if (isset($_POST['comment']) && $_POST['name'] != "" && $_POST['email'] != ""){
            $comment = $_POST['comment'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            //El archivo se abre para esc-lec
            $fp = fopen($file, "r+");
            $old = "";
            //Leer todos los datos y almacenar en $old, se utiliza un if para revisar que tenga algo el archivo y este se escriba con lo anterior.
            if(filesize($file)>0){
                $old = fread($fp,filesize($file)); 
            }
            //Se crea el vinculo de e-mail
            $email = "<a href=\"mailto:$email\">$email</a>";
            //Se incluye la fecha y se le da formato
            $dateOfEntry = date("Y-n-j");
            //Ocultar caracteres HTML, eliminar slashes, mantener saltos de linea
            $comment = htmlspecialchars($comment);
            $comment = stripslashes(nl2br($comment));
            //"Montar" la entrada (entry) del libro de visitas
            $entry = "<p><b>$name</b>($email) escribio el <i>$dateOfEntry</i>:<br>$comment</p>\n";
            //El cursos invisible salta al principio
            rewind($fp);
            //Escribir la nueva entrada antes de las antiguas en el archivo:
            fputs($fp, "$entry \n $old");
            //Cerrar el archivo
            fclose($fp);
        }
        //Mostrar el archivo completo
        readfile($file);
        ?>
    </body>
</html>

