<?php 
    require "logics/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>export</title>
</head>
<body>
    <form class="" method="POST" action="exportLogic.php" >
        <span>JSON файл на скачивание sportshop_exported.json </span>
        <input name="myActionName" type="submit" value="Экспорт" />
    </form>

</body>
</html>