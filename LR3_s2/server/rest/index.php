<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;

require_once $_SERVER["DOCUMENT_ROOT"] . '/server/vendor/autoload.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '/server/classes/goodsClass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/server/classes/brandClass.php');


$app = new Silex\Application();

$app->register(new JDesrosiers\Silex\Provider\CorsServiceProvider(), [
    "cors.allowOrigin" => "*",
]);
$app["cors-enabled"]($app);

// header('Access-Control-Allow-Origin: *');



$app->get('/goods/show/{id}', function ($id) use ($app) {
	$arr = ActionGoods::showAction($app->escape($id));
	return json_encode($arr);
})->value("id", 0) 
->assert("id", "\d+");

$app->get('/brands/show', function () {
	$arr = ActionBrand::showAction();
	return json_encode($arr);
});


$app->post('/brands/add', function(Request $request) {
	$name = $request->get('name');
	if ($name) {
		try {
			$result = Brand::add($name);
			return json_encode($result);
		} catch (Exception $e) {
			return json_encode(array("error" => $e->getMessage()));
		}
	} else {
		return json_encode(array("error" => "name is empty"));
	}
});



$app->post('/brands/edit', function (Request $request) {
	$id = $request->get('id');
	$name = $request->get('name');
	if ($name && $id) {
		try {
			$result = Brand::edit($id, $name);
			return json_encode($result);
		} catch (Exception $e) {
			return json_encode(array("error" => $e->getMessage()));
		}
	} else {
		return json_encode(array("error" => "name or id is empty"));
	}
});

$app->post('/brands/delete', function (Request $request) {
	$id = $request->get('id');
	if ($id) {
		try {
			$result = Brand::delete($id);
			return json_encode($result);
		} catch (Exception $e) {
			return json_encode(array("error" => $e->getMessage()));
		}
	} else {
		return json_encode(array("error" => "id is empty"));
	}
});

$app->post('/brands/handOver', function (Request $request) {
	$selected_id = $request->get('selected_id');
	$del_id = $request->get('del_id');
	if ($selected_id && $del_id) {
		try {
			$result = Brand::handOver($selected_id,$del_id);
        	$result2 = Brand::delete($del_id);
			return json_encode($result);
		} catch (Exception $e) {
			return json_encode(array("error" => $e->getMessage()));
		}
	} else {
		return json_encode(array("error" => "id is empty"));
	}
});

$app->post('/goods/add', function (Request $request) {
	$name = $request->get('name');
	$cost = $request->get('cost');
	$des = $request->get('des');
	$brand = $request->get('brand');
	$photo = $request->files->get('photo');

	if ($photo){
		try {
			$newPath = date("Ymdhms").$photo->getClientOriginalName();
			$photo->move("../files/", $newPath);
			$result = Goods::add($name,$cost,$des,$brand,$newPath);
			return json_encode($result);
		} catch (Exception $e) {
			return json_encode(array("error" => $e->getMessage()));
		}	
	}else{
		return json_encode(array("error" => "file is empty"));
	}

});

$app->post('/goods/delete', function (Request $request) {
	$id = $request->get('id');
	if ($id) {
		try {
			$result = Goods::delete($id);
			return json_encode($result);
		} catch (Exception $e) {
			return json_encode(array("error" => $e->getMessage()));
		}
	} else {
		return json_encode(array("error" => "id is empty"));
	}
});

$app->post('/goods/edit', function (Request $request) {
	$id = $request->get('id');
	$name = $request->get('name');
	$cost = $request->get('cost');
	$des = $request->get('des');
	$brand = $request->get('brand');


	try {
		$result = Goods::editWhithoutFile($id, $name, $cost, $des, $brand);
		return json_encode($result);
	} catch (Exception $e) {
		return json_encode(array("error" => $e->getMessage()));
	}
	
});

$app->post('/goods/editWF', function (Request $request) {
	$id = $request->get('id');
	$name = $request->get('name');
	$cost = $request->get('cost');
	$des = $request->get('des');
	$brand = $request->get('brand');
	$photo = $request->files->get('photo');

	if ($photo){
		try {
			$newPath = date("Ymdhms").$photo->getClientOriginalName();
			$photo->move("../files/", $newPath);
			$result = Goods::editWhithFile($id,$name,$cost,$des,$brand,$newPath);
			return json_encode($result);
		} catch (Exception $e) {
			return json_encode(array("error" => $e->getMessage()));
		}	
	}else{
		return json_encode(array("error" => "file is empty"));
	}

});

$app->run();

