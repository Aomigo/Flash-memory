<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/partials/functions.php';

$post       = file_get_contents('php://input'); // Getting datas send by js fetch() request
$arrPost    = json_decode($post, true); // convert the json send by js in an associative array
$messageLenghtErrorText = 'No message received or meassage contains less than 3 chars ';

file_put_contents("debug.log", $post . PHP_EOL, FILE_APPEND);

if (!isset($arrPost['message']) || strlen($arrPost['message']) < 3) {
    http_response_code(400);
    echo json_encode([
        'error' => $messageLenghtErrorText
    ]);
    exit;
}

saveMessage($arrPost['message']);

echo json_encode([
    'message' => $arrPost['message']
]);

function saveMessage($message){

    cleanData($message);

    file_put_contents("debug.log", "in save : " . $message . PHP_EOL, FILE_APPEND);

    $pdo = getPDO();
    $try = $pdo->prepare("INSERT INTO message (game_id, user_id, message, created_at) VALUES (?, ?, ?, NOW())");
    $try->execute([1, 11, $message]);


}