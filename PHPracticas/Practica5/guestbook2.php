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
        <?php
        $file1 = "oldip.txt";
        $file2 = "guestbook2.txt";
        //Determinar la direccion IP
        $ip = $_SERVER['REMOTE_ADDR'];
        echo "<p>Tu IP: $ip</p>";
        $fp1 = fopen($file1, "r");
        $oldip = fgets($fp1);
        fclose($fp1);
        echo "<h3>Mostrar todos los comentarios</h3>";
        if (isset($_POST['comment']) && $_POST['name'] != "" && $_POST['email'] != "" && $ip != $oldip){
            $comment = $_POST['comment'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $fp2 = fopen($file2, "r+");
            $old="";
            if(filesize($file2)>0){
                $old = fread($fp2,filesize($file2)); 
            }
            $email = "<a href=\"mailto:$email\">$email</a>";
            $dateOfEntry = date("Y-n-j");
            $comment = htmlspecialchars($comment);
            $comment = stripslashes(nl2br($comment));
            $entry = "<p><b>$name</b>($email) escribio el <i>$dateOfEntry</i>:<br>$comment</p>\n";
            rewind($fp2);
            fputs($fp2, "$entry \n $old");
            fclose($fp2);
            $fp1 = fopen($file1, "w+");
            fputs($fp1, $ip);
            fclose($fp1);
        }
        readfile($file2);
        ?>
    </body>
</html>

