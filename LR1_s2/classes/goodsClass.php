<?php 
    class Goods{
       public static function add(string $name_, int $cost_, string $des_, int $brand_, string $fileName_, string $filePath_) : array{
        $mysql = Database::connection();
        if(isset($name_) and isset($cost_) and isset($des_) and isset($brand_) and isset($fileName_) and isset($filePath_)){
            $name = mysqli_real_escape_string($mysql,$name_);
            $cost = mysqli_real_escape_string($mysql,$cost_);
            $des = mysqli_real_escape_string($mysql,$des_);
            $brand = mysqli_real_escape_string($mysql,$brand_);

            $fileName = date("Ymdhms").$fileName_;
            $url = "../files/".$fileName;
            move_uploaded_file($filePath_, $url);

                
        
            $query = "INSERT INTO goods (`id`, `name`, `description`, `cost`, `id_brand`, `img_path`) 
                        VALUES ( NULL, '$name', '$des', '$cost', '$brand', '$fileName')";
            $result = $mysql->query($query);
                if($result){
                    $response = [
                        "check" => true
                    ];
                    return $response;
                    //echo json_encode($response);
                }else{
                    $response = [
                        "check" => false
                    ];
                    return $response;
                    //echo json_encode($response);
                }
            }else{
                $response = [
                    "check" => false
                ];
                return $response;
            }

       }

       public static function editWhithoutFile(int $id_,string $name_, int $cost_, string $des_, int $brand_) : array{
        $mysql = Database::connection();
        if(isset($id_) and isset($name_) and isset($cost_) and isset($des_) and isset($brand_)){
            $id = mysqli_real_escape_string($mysql,$id_);
            $name = mysqli_real_escape_string($mysql,$name_);
            $cost = mysqli_real_escape_string($mysql,$cost_);
            $des = mysqli_real_escape_string($mysql,$des_);
            $brand = mysqli_real_escape_string($mysql,$brand_);

                $query = "UPDATE goods SET  name = '$name', description = '$des', cost = '$cost', id_brand = '$brand' WHERE id = $id";
                $result = $mysql->query($query);
                if($result){
                    $response = [
                        "check" => true
                    ];
                    return $response;
                    //echo json_encode($response);
                }else{
                    $response = [
                        "check" => false
                    ];
                    return $response;
                    //echo json_encode($response);
                }
            }else{
                $response = [
                    "check" => false
                ];
                return $response; 
            }

       }


       public static function editWhithFile(int $id_,string $name_, int $cost_, string $des_, int $brand_, string $lastfileName_, string $fileName_, string $filePath_) : array{
        $mysql = Database::connection();
        if(isset($id_) and isset($name_) and isset($cost_) and isset($des_) and isset($brand_) and isset($lastfileName_) and isset($fileName_) and isset($filePath_)){
            $id = mysqli_real_escape_string($mysql,$id_);
            $name = mysqli_real_escape_string($mysql,$name_);
            $cost = mysqli_real_escape_string($mysql,$cost_);
            $des = mysqli_real_escape_string($mysql,$des_);
            $brand = mysqli_real_escape_string($mysql,$brand_);

            $fileName = date("Ymdhms").$fileName_;
            $url = "../files/".$fileName;
            move_uploaded_file($filePath_, $url);

            unlink("../files/".$lastfileName_);

                $query = "UPDATE goods SET  name = '$name', description = '$des', cost = '$cost', id_brand = '$brand', img_path = '$fileName' WHERE id = $id";
                $result = $mysql->query($query);
                if($result){
                    $response = [
                        "check" => true
                    ];
                    return $response;
                    //echo json_encode($response);
                }else{
                    $response = [
                        "check" => false
                    ];
                    return $response;
                    //echo json_encode($response);
                }
            }else{
                $response = [
                    "check" => false
                ];
                return $response; 
            }
       }


       public static function delete(int $id_) : array{  
        $mysql = Database::connection();
        if(isset($id_)){
            $id = mysqli_real_escape_string($mysql,$id_);
            $query = "SELECT img_path FROM goods WHERE id = $id";
            $result = $mysql->query($query);
            $row = $result->fetch_assoc();
            unlink("../files/".$row['img_path']);
            $query = "DELETE FROM goods WHERE id = $id";
            $result = $mysql->query($query);
            if($result){
                $response = [
                    "check" => true
                ];
                return $response;
                //echo json_encode($response);
                }else{
                    $response = [
                        "check" => false
                    ];
                    return $response;
                //echo json_encode($response);
            }
        }else{
            $response = [
                "check" => false
            ];
            return $response;
        }
       }
       
       public static function show() : array{
        $mysql = Database::connection();
        $query = "SELECT goods.id, goods.name,  goods.description, goods.cost, brands.name_brand, goods.img_path FROM goods INNER JOIN brands ON brands.id_brand = goods.id_brand ORDER BY id";
        $result = $mysql->query($query);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
       }
       public static function goodById(int $id_) : array{
        $mysql = Database::connection();
        $id = mysqli_real_escape_string($mysql,$_GET['id']);
        $query = "SELECT id, name, description, cost, id_brand, img_path  FROM goods WHERE id = $id";
        $result = $mysql->query($query);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
       }
    
    }

?>