<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/actionsClass.php');

    class Goods{
        
       public static function add(string $name_, int $cost_, string $des_, int $brand_, string $fileName_, string $filePath_) : array{
        if(isset($name_) and isset($cost_) and isset($des_) and isset($brand_) and isset($fileName_) and isset($filePath_)){
            $result = ActionGoods::addAction($name_, $cost_, $des_, $brand_, $fileName_, $filePath_);
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
        if(isset($id_) and isset($name_) and isset($cost_) and isset($des_) and isset($brand_)){
            $result = ActionGoods::editActionWhithOutFile($id_, $name_, $cost_, $des_, $brand_);
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
        if(isset($id_) and isset($name_) and isset($cost_) and isset($des_) and isset($brand_) and isset($lastfileName_) and isset($fileName_) and isset($filePath_)){
            $result = ActionGoods::editActionWhithFile($id_, $name_, $cost_, $des_, $brand_, $lastfileName_, $fileName_, $filePath_);
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
        if(isset($id_)){
            $result = ActionGoods::deleteAction($id_);
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
       
       public static function show(int $id = 0) : array{
        $arr = ActionGoods::showAction($id);
        return $arr;
       }

       public static function goodById(int $id_) : array{
        $arr = ActionGoods::getByIdAction($id_);
        return $arr;
       }
    
    }

?>