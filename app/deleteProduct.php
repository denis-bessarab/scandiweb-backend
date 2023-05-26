<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Request-Method: DELETE');
header('Access-Control-Allow-Headers: x-requested-with');
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Content-Type');

include_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');

    http_response_code(200);
    exit;
}
$database = new Database;
$data = json_decode(file_get_contents('php://input'));
$deleteList = $data->source;

$database->delete($deleteList);
