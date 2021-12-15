<?php   
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/databaseClass.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/logics/brandClass.php');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $result = Brand::add($_POST['name']);
        echo json_encode($result);
    }

    if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
        parse_str(file_get_contents('php://input'), $_DELETE);
        $result = Brand::delete($_DELETE['id']);
        echo json_encode($result);
    }

    if($_SERVER['REQUEST_METHOD'] === 'PUT'){
        parse_str(file_get_contents('php://input'), $_PUT);
        $result = Brand::edit($_PUT['id'], $_PUT['name']);
        echo json_encode($result);
    }

?>