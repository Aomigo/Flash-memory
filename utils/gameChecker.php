<?php
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
$jsArray = $input["array"] ?? [];



$response = [
    "success" => true,
    "message" => "PHP logic completed"
];
echo json_encode($response);