<?php   
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/goodsClass.php');
    if($_SERVER['REQUEST_METHOD'] === 'POST' and $_POST['method'] === 'POST'){
        if ($_FILES && $_FILES["ava"]["error"] == UPLOAD_ERR_OK){
            $result = Goods::add($_POST['name'],$_POST['cost'],$_POST['des'],$_POST['brand'],$_FILES["ava"]["name"],$_FILES["ava"]["tmp_name"]);
            echo json_encode($result);
        }else{
            $response = [
                "check" => false
            ];
            echo json_encode($response);
        }
    }

    if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
        parse_str(file_get_contents('php://input'), $_DELETE);
        $result = Goods::delete($_DELETE['id']);
        echo json_encode($result);
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['method'] === 'PUT'){
        //parse_str(file_get_contents('php://formData'), $_PUT);

        if ($_FILES && $_FILES["ava"]["error"] == UPLOAD_ERR_OK){
            $result = Goods::editWhithFile($_POST['id'], $_POST['name'],$_POST['cost'],$_POST['des'],$_POST['brand'],$_POST['lastfileName'],$_FILES["ava"]["name"],$_FILES["ava"]["tmp_name"]);
            echo json_encode($result);
        }else{
            $result = Goods::editWhithoutFile($_POST['id'], $_POST['name'],$_POST['cost'],$_POST['des'],$_POST['brand']);
            echo json_encode($result);
        }  
    }

?>