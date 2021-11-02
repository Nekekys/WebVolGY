<?php 
    session_start();
    if($_SESSION['user']){
        //$file = file_get_contents('../images_pack/' . $_GET['img'], true);
        //echo $file;
        header('Content-type: image/jpeg');
        imagejpeg(imagecreatefromjpeg('../images_pack/'. $_GET['img']));
    }else{
        header('Location: ../login.php');
    }
?>