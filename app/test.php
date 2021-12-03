<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "Hello world!";
        $f = fopen("qqq.txt", "w");
        fwrite($f, "8734927492");
        fclose($f);
    ?>
</body>
</html>