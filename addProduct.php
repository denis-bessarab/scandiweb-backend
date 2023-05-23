<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Request-Method: POST');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Content-Type');

include_once 'db.php';
$database = new Database;
$data = json_decode(file_get_contents('php://input'));
$data->attributes = json_encode($data->attributes);
$sku = $data->sku;
$attributes = $data->attributes;
$database->insert($sku, $attributes);

