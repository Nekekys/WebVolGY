<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/lr/classes/actionsClass.php');
    
    class Brand{
       public static function add(string $name_) : array{
        if(isset($name_)){
            $result = ActionBrand::addAction($name_);
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
        if(isset($id_) and isset($name_)){
            $result = ActionBrand::editAction($id_, $name_);
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
            $result = ActionBrand::deleteAction($id_);
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
        $arr = ActionBrand::showAction();
        return $arr;
       }

       public static function brandById(int $id_) : array{
        if(isset($id_)){
            $arr = ActionBrand::getByIdAction($id_);
            return $arr;
        }else{
            $response = [
                "check" => false
            ];
            return $response;
        }
       }
       public static function handOver(int $selected_id, int $deleted_id) : array{
        if(isset($selected_id) && isset($deleted_id)){
            $result = ActionBrand::handOverAction($selected_id, $deleted_id);
            if($result){
                $response = [
                    "check" => true
                ];
                return $response;
            }else{
                $response = [
                    "check" => false
                ];
                return $response;
            }
        }else{
            $response = [
                "check" => false
            ];
            return $response;
        }
       }
    }

?>