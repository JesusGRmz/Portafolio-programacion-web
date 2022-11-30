<!DOCTYPE HTML>
<html>
    <head>
        <meta charset UTF-8>
        <title>Formmailer</title>
    </head>
    <body>
    <?php
    $receiverMail = "jesusgaytan144@gmail.com";
    $subject ="...";
    $message = "Datos enviados:\n\n";

    foreach($_POST as $name => $value) {
        
        $message .= "$name: $value\n";
    } 
    
    if (isset($_POST['Mail']) && $_POST['Mail'] !=""){
    
    $poster = $_POST['Mail'];
        if (@mail ($receiverMail, $subject, $message, "From: $poster")) {
        
        echo "<h1>Gracias por hacerme llegar tu opinión.</h1>\n";
        echo "<p>Tu mensaje ha sido enviado.</p>\n";
        
        } else {
            echo "<h1>Lo sentimos, no se pudo enviar tu mensaje.</h1>\n";
        }
        
    } else {
        echo "<h1>No te olvides de rellenar tu dirección de correo electrónico.</h1>\n";
    }
    ?>
    </body>
</html>