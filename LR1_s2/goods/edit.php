<?php  
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/databaseClass.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/brandClass.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/goodsClass.php');
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
        $elem = Goods::goodById($_GET['id']);
        $row = $elem[0];
        // $query = "SELECT id, name, description, cost, id_brand, img_path  FROM goods WHERE id = $id";
        // $result = $mysql->query($query);
        // $row = $result->fetch_assoc();
        $goods_id = $row['id'];
        $goods_name = $row['name'];
        $goods_description = $row['description'];
        $goods_cost = $row['cost'];
        $id_brand = $row['id_brand'];
        $img_path = $row['img_path'];
    }else{
        header("Location: http://".$_SERVER['HTTP_HOST']."/lr/goods.php");  
    }
    
   ?>
   <div class="container">
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../goods.php">Товары</a></li>
        <li class="breadcrumb-item active" aria-current="page">Редактировать товар <?php echo $goods_name ?></li>
    </ol>
    </nav>
    <h1>Редактировать товар</h1>
        <div class="alert alert-danger" role="alert" id="errorR" style="display: none">
            error
        </div>
        <form action="" class="d-flex flex-wrap">
            <input style='width: 200px; margin-bottom: 15px' value="<?php echo $goods_name ?>" class="form-control" type="text" name="name" placeholder="Название товара">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' value="<?php echo $goods_cost ?>" class="form-control" type="text" name="cost" placeholder="Стоймость">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px' value="<?php echo $goods_description ?>" class="form-control" type="text" name="des" placeholder="Описание">
            <input style='width: 200px; margin-left: 15px; margin-bottom: 15px'  class="form-control" type="file" name="ava" >

            <select style='width: 200px; margin-left: 15px; margin-bottom: 15px' class="form-select" name="brand" aria-label="Default select example">
                <?php
                     $arr = Brand::show();
                     foreach( $arr as $elem){
                        if($id_brand == $elem['id_brand'])
                         echo " <option selected value='" . $elem['id_brand'] . "'>" . $elem['name_brand'] . "</option>";
                        else
                         echo " <option value='" . $elem['id_brand'] . "'>" . $elem['name_brand'] . "</option>";
                     }
                    
                ?>
            </select>
            <button style='margin-bottom: 15px' type='button' class='btn btn-primary' onclick="editFunction(`<?php echo $goods_id?>`, `<?php echo $img_path?>`)">Отправить</button>
        </form>      
   </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   <script src="./handler.js"></script>
</body>
</html>