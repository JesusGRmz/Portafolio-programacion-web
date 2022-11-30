<html>
    <head>
        <title>Un pequeño mailer para recopilar la opinion</title>
        <meta charset UTF-8>
    </head>
    <body>
        <h1>Feedback-Mailer</h1>
        <p>¡Enviame un e-mail!</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Tu direccion de e-mail: <br>
            <input type="text" name="Mail"><br>
            Tu comentario: <br>
            <textarea name="message" cols="50" rows="5"></textarea><br>
            <input type="submit" value="Enviar">
        </form>
        <?php
        $receiverMail ="jesusgaytan144@gmail.com"; //E-mail
        if (isset($_POST['Mail']) && $_POST['Mail'] != ""){
            if (mail($receiverMail, "¡Tienes correo nuevo", $_POST['message'], "From:$_POST[Mail]")){
                    echo "<p>Gracias por enviarme tu opinion.</p>\n";
                } else {
                    echo "<p>Lo siento, ha ocurrido un error.</p>\n";

                }
        }
        ?>
    </body>
</html>