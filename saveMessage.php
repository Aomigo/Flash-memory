<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/partials/functions.php';

$post       = file_get_contents('php://input'); // Getting datas send by js fetch() request
$arrPost    = json_decode($post, true); // convert the json send by js in an associative array
$messageLenghtErrorText = 'Message too short to be sent';

if (!isset($arrPost['message']) || strlen($arrPost['message']) < 3) {
    http_response_code(400);
    echo json_encode([
        'error' => $messageLenghtErrorText
    ]);
    exit;
}

saveMessage($arrPost['message'], $arrPost['user_id'], $arrPost['game_id']);

echo json_encode([
    'message' => $arrPost['message'],
    'user_id' => $arrPost['user_id'],
    'game_id' => $arrPost['game_id']
]);

function saveMessage($message, $userId, $gameId) {

    cleanData($message);

    $pdo = getPDO();
    $try = $pdo->prepare("INSERT INTO message (game_id, user_id, message, created_at) VALUES (?, ?, ?, NOW())");
    $try->execute([$gameId, $userId, $message]);
}