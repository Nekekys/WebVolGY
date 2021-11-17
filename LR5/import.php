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
    <form class="" method="POST" action="" >
        <span>JSON файл на импорт, введите путь: </span>
        <input name="fileName" type="text" placeholder="files/sportshop_exported.json" />
        <input name="myActionName" type="submit" value="Импорт" />
    </form>
    <?php
        require "logics/connect.php";

        if (isset($_POST['fileName'])){
            // $handle = fopen("./".$_POST['fileName'], "r");
            //$url = "./files/sportshop_exported.json";
            //$url = "./files/test.json";
            $url = $_POST['fileName'];
            if(file_exists($url)){
                $handle = fopen($url, "r");
                $contents = fread($handle, filesize($url));
                $arr = json_decode($contents,true);
                if($arr){
                    $check = false;
                    $arrOfKeys = array();
                    $queryArray = array();
                    foreach ($arr as $index => $value){
                        $j = 0;
                        $str = '';
                        foreach($value as $key => $el){
                            $el = mysqli_real_escape_string($mysql,$el);
                            if($index == 0){
                                $arrOfKeys[] = $key;
                            }else{
                                if($arrOfKeys[$j] != $key){
                                    $check = true;
                                }
                            }
                            if($j == 0){
                                $str.="VALUES ('$el'";
                            }else{
                                $str.=", '$el'";
                            }
                            $j++;
                        }
                        $queryArray[] = $str.')';
                    }
                    if($check){
                        echo 'невалидно для создание таблицы';
                    }else{
                        $strCreateTable = '';
                        $strInsertIntoTable = '';
                        $i = 0;
                        $name = explode(".", basename($url));
                        foreach ($arrOfKeys as $el){
                            $el = mysqli_real_escape_string($mysql,$el);
                            if($i == 0){
                                $strCreateTable.="CREATE TABLE $name[0]_imported ( $el varchar(255)";
                                $strInsertIntoTable.= "INSERT INTO $name[0]_imported ( $el";
                            }else{
                                $strCreateTable.=", $el varchar(255)";
                                $strInsertIntoTable.= ", $el";
                            }
                            $i++;
                        }
                        $strCreateTable.=") ";
                        $strInsertIntoTable.=") ";
                        
                       // $result = $mysql->query($strCreateTable);

                        foreach ($queryArray as $index => $value){
                            $result = $mysql->query($strInsertIntoTable.$value);
                        }

                        echo "Файл с данными получен из $url и обработан. Создана таблица $name[0]_imported. Количество записей: $i";

                    }
                }else{
                    echo 'неправильный формат';
                }
            }else{
                echo 'файла не существует';
            }
            
        }
    ?>

</body>
</html>