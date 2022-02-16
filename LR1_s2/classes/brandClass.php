<?php 
    class Brand{
       public static function add(string $name_) : array{
        $mysql = Database::connection();
        if(isset($name_)){
            $name = mysqli_real_escape_string($mysql,$name_);
            $query = "INSERT INTO brands (`id_brand`, `name_brand`) VALUES ( NULL, '$name')";
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
       public static function edit(int $id_, string $name_) : array{
        $mysql = Database::connection();
        if(isset($id_) and isset($name_)){
            $id = mysqli_real_escape_string($mysql,$id_);
            $name = mysqli_real_escape_string($mysql,$name_);
            $query = "UPDATE brands SET  name_brand = '$name' WHERE id_brand = $id";
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

            $query = "DELETE FROM brands WHERE id_brand = $id";
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
        $query = "SELECT id_brand, name_brand  FROM brands ORDER BY id_brand";
        $result = $mysql->query($query);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
       }

       public static function brandById(int $id_) : array{
        $mysql = Database::connection();
        if(isset($id_)){
            $id = mysqli_real_escape_string($mysql,$_GET['id']);
            $query = "SELECT id_brand, name_brand  FROM brands WHERE id_brand = $id";
            $result = $mysql->query($query);
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        }else{
            $response = [
                "check" => false
            ];
            return $response;
        }
        }
    }

?>