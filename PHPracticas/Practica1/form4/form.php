<html>
    <head>
        <title>Formulario HTML</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Todo en una pagina (form.php)</h1>
        <form action="form.php" method="post">
            <input type="radio" name="gender" value="0"> Sr.
            <input type="radio" name="gender" value="1"> Sra. <br>
            Tu nombre:<br>
            <input type="text" name="lastName">
            <input type="submit" name="submitbutton" value="Envialo!">
        </form>
        <p>
        <?php
        if (isset($_POST['gender']) && 
            isset($_POST['lastName']) &&
            $_POST['lastName'] != ""){
                if($_POST['gender'] == 0){
                    echo "Hola Sr. ";
                } else {
                    echo "Hola Sra. ";
                }
                echo "<b>{$_POST['lastName']}</b>, un gusto saludarte.\n";    
            } else {
                if (isset($_POST['submitbutton'])){
                    echo "Por favor rellena todos los campos";
                }
            }
        ?>
        </p>
    </body>
</html>