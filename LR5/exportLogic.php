<?php
    require "logics/connect.php";

    if (isset($_POST['myActionName'])){
        $result = $mysql->query("SELECT * FROM `goods`");
        $data_attay = array();
        while ($row = $result->fetch_assoc()) {
            $data_attay[] = array(
                'name' => $row['name'],
                'description' => $row['description'],
                'cost' => $row['cost'],
                'id_brand' => $row['id_brand'],
                'img_path' => $row['img_path']
            );
        }
        
        $file_name = "sportshop_exported.json";
        $json = json_encode($data_attay,JSON_UNESCAPED_UNICODE);
       // if(file_put_contents($file_name, json_encode($data_attay))){
           //header ("Content-Type: application/octet-stream");
        //     header ("Accept-Ranges: bytes");
        //     header ("Content-Length: ".filesize($file_name));
        //    header ("Content-Disposition: attachment; filename=".$file_name);  
        //     readfile($file_name);
        header('Content-disposition: attachment; filename=sportshop_exported.json');
        header('Content-type: application/json');
        echo $json;
       
    }   
    ?>