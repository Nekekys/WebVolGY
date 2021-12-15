<?php  
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/databaseClass.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/brandClass.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        require "../header.php";

        if($_GET['id']){
            //$id = mysqli_real_escape_string($mysql,$_GET['id']);
           // $query = "SELECT id_brand, name_brand  FROM brands WHERE id_brand = $id";
            //$result = $mysql->query($query);
            //$row = $result->fetch_assoc();
            $elem = Brand::brandById($_GET['id']);
            $row = $elem[0];
            $brandsId = $row['id_brand'];
            $brandsName = $row['name_brand'];
        }else{
            header("Location: http://".$_SERVER['HTTP_HOST']."/lr/brands.php");  
        }
   ?>
   <div class="container">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../brands.php">Брэнды</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактировать брэнд <?php echo $brandsName ?></li>
    </ol>
    </nav>
    <h1>Редактировать брэнд</h1>
        <div class="alert alert-danger" role="alert" id="errorR" style="display: none">
            error
        </div>
        <form action="" class="d-flex">
            <input style='width: 200px;' class="form-control" type="text" name="name" placeholder="Имя брэнда" value="<?php echo $brandsName ?>">
            <button style='margin-left: 15px' type='button' class='btn btn-primary' onclick="editFunction('<?php echo $brandsId ?>')">Отправить</button>
        </form>      
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="handler.js"></script>
</body>
</html>