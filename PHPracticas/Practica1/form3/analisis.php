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
        echo "Por favor rellene todos los campos";
    }