<?php

include_once "../app/classes/DB.php";
include_once "../app/classes/Tag.php";
header('Content-Type: application/json; charset=utf-8');

try {
    if (!isset($_GET["id"])) {
        http_response_code(400);
        echo json_encode([
            "status" => 400,
            "message" => "Id not found!"
        ]);
    }
    
    $tag = new Tag();
    $data = $tag->getTagById(id: $_GET["id"]);
    
    if (!is_null($data)) {
        http_response_code(200);
        echo json_encode([
            "status" => 200,
            "message" => "success!",
            "data" => $data
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "status" => 400,
            "message" => "Data not found!"
        ]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "status" => 500,
        "message" => $e->getMessage()
    ]);
}