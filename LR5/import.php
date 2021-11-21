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
                    $check = false;   //валидность таблицы
                    $checkForGUID = false;  // проверка есть ли в данных ключ guid
                    $arrayForGUID = array(); // массив guid, если есть
                    $arrOfKeys = array(); // массив ключей(названий столбцов)
                    $queryArray = array(); // массив строк запросов с переменными в кавычках для sql
                    $queryStrArray = array(); // массив строк запросов с переменными для создания guid
                    foreach ($arr as $index => $value){
                        $j = 0;
                        $str = '';
                        $strSolid = '';
                        foreach($value as $key => $el){
                            $el = mysqli_real_escape_string($mysql,$el);
                            if($index == 0){  // проверка ключей (они должны совпадать в каждом элементе массива)
                                $arrOfKeys[] = $key;
                            }else{
                                if($arrOfKeys[$j] != $key){
                                    $check = true;
                                }
                            }
                            if($key == 'guid'){
                                $checkForGUID = true;
                                $arrayForGUID[] = $el;
                            }
                            if($j == 0){
                                $str.="VALUES ('$el'";
                            }else{
                                $str.=", '$el'";
                            }
                            $strSolid.=$el;
                            $j++;
                        }
                        $queryStrArray[] = $strSolid;
                        $queryArray[] = $str;
                    }

                   
                        foreach ($queryStrArray as $index => $value){
                            if(!$checkForGUID){
                                $queryArray[$index].= ", '".md5($value)."')";
                            }else{
                                $queryArray[$index].= ")" ;
                            }
                        }

                    if($check){
                        echo 'невалидно для создание таблицы';
                    }else{
                        $strCreateTable = '';
                        $strInsertIntoTable = '';
                        $i = 0;
                        $name = explode(".", basename($url));


                        //$result = $mysql->query("SELECT * FROM '".$name[0]."_imported'");
                        $result = $mysql->query("SELECT * FROM `".$name[0]."_imported`");
                        if($result){
                            $arrayGUIDTable = array();  // массив guid из таблицы
                            while ($row = $result->fetch_assoc()){
                                $k = 0;
                                foreach($row as $key => $value){
                                    if($key == 'guid'){
                                        $arrayGUIDTable[] = $value;
                                    }
                                    //echo $key."  ".$value."\n";
                                    $k++;
                                }
                            }
                            $arrayOfindexGUID = array(); // массив id строк на апдейт
                            foreach ($arrayForGUID as $i => $jsonguid){
                                foreach ($arrayGUIDTable as $j => $tableguid){
                                    if($jsonguid == $tableguid){
                                        $arrayOfindexGUID[] = $tableguid;
                                    }
                                }
                            }

                            $i = 0;
                            foreach ($arrOfKeys as $el){
                                $el = mysqli_real_escape_string($mysql,$el);
                                if($i == 0){
                                    $strInsertIntoTable.= "INSERT INTO $name[0]_imported ( $el";
                                }else{
                                    $strInsertIntoTable.= ", $el";
                                }
                                $i++;
                            }
                            if(!$checkForGUID){
                                $strInsertIntoTable.=", guid) ";
                            }else{
                                $strInsertIntoTable.=") ";
                            }

                        
                            foreach ($arr as $index => $value){
                                if(in_array($value['guid'], $arrayOfindexGUID)){
                                    $queryStr = "UPDATE $name[0]_imported SET ";
                                    $t = 0;
                                    foreach($value as $key => $el){
                                        if($t == 0){
                                            $queryStr.=" $key = '".$el."'";
                                        }else{
                                            $queryStr.=", $key = '".$el."'";
                                        }
                                       $t++;
                                    }
                                    $queryStr.=" WHERE guid = '".$value['guid']."'";
                                    echo $queryStr;
                                    $result = $mysql->query($queryStr);
                                }else{
                                    $result = $mysql->query($strInsertIntoTable.$queryArray[$index]);
                                }
                            }
                        }else{
                            $i = 0;
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
                            if(!$checkForGUID){
                                $strCreateTable.=", guid varchar(255)) ";
                                $strInsertIntoTable.=", guid) ";
                            }else{
                                $strCreateTable.=") ";
                                $strInsertIntoTable.=") ";
                            }
                            
                            
                           $result = $mysql->query($strCreateTable);
    
                            foreach ($queryArray as $index => $value){
                                $result = $mysql->query($strInsertIntoTable.$value);
                                echo $strInsertIntoTable.$value."\n";
                            }
                            
                            echo "Файл с данными получен из $url и обработан. Создана таблица $name[0]_imported. Количество записей: $i";
                        }
                        
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