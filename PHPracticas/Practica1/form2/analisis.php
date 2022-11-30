<?php
if ($_POST['gender'] == 0){
    echo "Hola Sr. ";
} else {
    echo "Hola Sra. ";
}

echo "<b>{$_POST['lastName']}</b>, un gusto saludarte.\n";
?>