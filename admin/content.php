<!DOCTYPE html>
<?php

$json = json_decode(file_get_contents('href1.json'),true);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>大同大學招生資訊網</title>
        <link rel="stylesheet" href="../include/css/bootstrap.css">
        <script src="../include/js/jquery-1.11.0.min.js"></script>
        <script src="../include/js/bootstrap.min.js"></script>
        <style>
            body {
                padding-top: 53px;
            }
            .carousel-inner > .item > img { margin: 0 auto; }
        </style>
    </head>
    <body>
    <form action="" method="post">
    link_name:<input type="text" name="name"value="<?php echo $json[$_GET["type"]]['data'][$_GET["index"]]['name']?>"><br>
    upload_file:<input type="file" name="file"><br>
    narrative:<br><textarea rows="5" cols="50" name="textarea"></textarea><br>
	1234567
    <input type="submit" value="submit" name="submit">
    </form>
    </body>
</html>

