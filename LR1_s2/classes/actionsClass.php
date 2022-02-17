<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/databaseClass.php');

    class ActionBrand {

        public static function addAction(string $name_) : bool{
            $mysql = Database::connection();
            $name = mysqli_real_escape_string($mysql,$name_);
            $query = "INSERT INTO brands (`id_brand`, `name_brand`) VALUES ( NULL, '$name')";
            $result = $mysql->query($query);
            return $result;
        }

        public static function editAction(int $id_, string $name_) : bool{
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $name = mysqli_real_escape_string($mysql,$name_);
            $query = "UPDATE brands SET  name_brand = '$name' WHERE id_brand = $id";
            $result = $mysql->query($query);
            return $result;
        }

        public static function deleteAction(int $id_) : bool{
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $query = "DELETE FROM brands WHERE id_brand = $id";
            $result = $mysql->query($query);
            return $result;
        }

        public static function showAction() : array{
            $mysql = Database::connection();
            $query = "SELECT id_brand, name_brand  FROM brands ORDER BY id_brand";
            $result = $mysql->query($query);
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        }

        public static function getByIdAction(int $id_) : array{
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $query = "SELECT id_brand, name_brand  FROM brands WHERE id_brand = $id";
            $result = $mysql->query($query);
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        }
        public static function handOverAction(int $selected_id, int $deleted_id) : bool{
            $mysql = Database::connection();
            $selected_id = mysqli_real_escape_string($mysql,$selected_id);
            $deleted_id = mysqli_real_escape_string($mysql,$deleted_id);
            $query = "UPDATE goods SET id_brand = '$selected_id'  WHERE id_brand = $deleted_id";
            $result = $mysql->query($query);
            return $result;
        }
    }

    class ActionGoods {
        public static function addAction(string $name_, int $cost_, string $des_, int $brand_, string $fileName_, string $filePath_) : bool{
            $mysql = Database::connection();

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
            return $result;
        }

        public static function editActionWhithOutFile(int $id_,string $name_, int $cost_, string $des_, int $brand_) : bool{
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $name = mysqli_real_escape_string($mysql,$name_);
            $cost = mysqli_real_escape_string($mysql,$cost_);
            $des = mysqli_real_escape_string($mysql,$des_);
            $brand = mysqli_real_escape_string($mysql,$brand_);

            $query = "UPDATE goods SET  name = '$name', description = '$des', cost = '$cost', id_brand = '$brand' WHERE id = $id";
            $result = $mysql->query($query);
            return $result;
        }

        public static function editActionWhithFile(int $id_,string $name_, int $cost_, string $des_, int $brand_, string $lastfileName_, string $fileName_, string $filePath_) : bool{
            $mysql = Database::connection();
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
            return $result;
        }

        public static function deleteAction(int $id_) : bool{
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
            $query = "SELECT img_path FROM goods WHERE id = $id";
            $result = $mysql->query($query);
            $row = $result->fetch_assoc();
            unlink("../files/".$row['img_path']);
            $query = "DELETE FROM goods WHERE id = $id";
            $result = $mysql->query($query);
            return $result;
        }
        public static function showAction(int $id) : array{
            $mysql = Database::connection();
            if ($id == 0){
                $query = "SELECT goods.id, goods.name,  goods.description, goods.cost, brands.name_brand, goods.img_path FROM goods INNER JOIN brands ON brands.id_brand = goods.id_brand ORDER BY id";
            }else{
                $query = "SELECT goods.id, goods.name,  goods.description, goods.cost, brands.name_brand, goods.img_path FROM goods INNER JOIN brands ON brands.id_brand = goods.id_brand WHERE goods.id_brand = $id";
            }

            $result = $mysql->query($query);
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        }
        public static function getByIdAction(int $id_) : array{
            $mysql = Database::connection();
            $id = mysqli_real_escape_string($mysql,$id_);
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