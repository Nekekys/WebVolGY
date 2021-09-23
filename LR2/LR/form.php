<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "sportshop");
$brandArray = array("Camp", "Norrona", "Mammut", "Gore-Tex", "Haglofs");

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql->connect_errno) exit("ошибка подключения к БД");
$mysql->set_charset('utf8');
$query = "SELECT goods.name, goods.id_brand, goods.description, goods.cost, brands.name_brand, goods.img_path FROM goods INNER JOIN brands ON brands.id_brand = goods.id_brand";

if ((isset($_GET["name"])) || (isset($_GET["brand"])) || (isset($_GET["ot"])) || (isset($_GET["do"]))) {
    //if(($_POST["name"] != "")||($_POST["brand"] != "")||($_POST["ot"] != "")||($_POST["do"] != "")){
    $check = false;
    if ($_GET["name"] != "") {
        $query .= " WHERE name LIKE '%" . addslashes($_GET["name"]) . "%'";
        $check = true;
        echo "Название: " . $_GET["name"] . "<br>";
    }
    if ($_GET["brand"] != "0") {
        if ($check) {
            $query .= " AND goods.id_brand = '" . addslashes($_GET["brand"]) . "'";
        } else {
            $query .= " WHERE goods.id_brand = '" . addslashes($_GET["brand"]) . "'";
        }
        $check = true;
        echo "Брэнд: " . $brandArray[$_GET["brand"] - 1] . "<br>";
    }
    if ($_GET["ot"] != "") {
        if(filter_var($_GET["ot"], FILTER_VALIDATE_INT)){
            if ($check) {
                $query .= " AND goods.cost > " . $_GET["ot"];
            } else {
                $query .= " WHERE goods.cost > " . $_GET["ot"];
            }
            $check = true;
            echo "Цена больше: " . $_GET["ot"] . "<br>";
        }else{
            echo "Ошибка, переменная не число<br>";
        } 
    }
    if ($_GET["do"] != "") {
        if(filter_var($_GET["do"], FILTER_VALIDATE_INT)){
            if ($check) {
                $query .= " AND goods.cost < " . $_GET["do"];
            } else {
                $query .= " WHERE goods.cost < " . $_GET["do"];
            }
            $check = true;
            echo "Цена меньше: " . $_GET["do"] . "<br>";
        }else{
            echo "Ошибка, переменная не число<br>";
        } 
    }
}

$result = $mysql->query($query);
$i = 0;
while ($row = $result->fetch_assoc()) {
    $i++;
    echo "<tr><th scope='row'><img src='" . $row["img_path"] . "' style='width: 80px'></th>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row["name_brand"] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['cost'] . " руб.</td>
                        </tr>";
}
if ($i == 0) {
    echo "Ничего не найденно(((";
}
