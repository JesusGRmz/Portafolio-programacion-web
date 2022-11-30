<!doctype html>
<html>

<head>
    <title>Feedreader</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>

<body>
    <h1>Lector RSS</h1>
    <?php
    /*silverstone.xml*/
    /*http://www.elpais.es/rss.html*/
    $newsfeed = "silverstone.xml";
    $show = "";
    if ($rss = @simplexml_load_file($newsfeed)) {
        foreach ($rss->channel->item as $item) {
            $show .= "<h3>($item->title)</h3>";
            $show .= "<p>($item->description)</p>";
            $show .= "<div> <a href='{$item->link}'>ir al enlace</a> </div><hr>";
        }
        echo utf8_decode($show);
    } else {
        echo "<div>Error, no se pudo leer el archivo</div>";
    }
    ?>
</body>

</html>