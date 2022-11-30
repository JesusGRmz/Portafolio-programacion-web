<?php
if(isset($_POST['pw'])){
    $pw = $_POST['pw'];
    if($pw == 'contra'){
        header("Location: newpage1.html");
    } elseif ($pw == "contra1") {
        header("Location: newpage2.html");
    } else {
        header("Location: sorry.html");
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="pw">
    <input type="submit" name="Envialo">
</form>