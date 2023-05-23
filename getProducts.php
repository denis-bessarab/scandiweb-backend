<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');

include_once 'db.php';

$products = new Database();
$data = $products->fetch();
$newData = [];
foreach ($data as $key => $product) {
    $newValue = get_object_vars(json_decode($product['attributes']));
    $data[$key]['attributes'] = $newValue;
};
echo json_encode($data);
