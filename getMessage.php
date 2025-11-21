<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/partials/functions.php';

updateChat(1); // one because we got only one game and no selection

function updateChat($gameID) 
{
    $pdo = getPDO();
    $try = $pdo->prepare("SELECT m.*, u.picture FROM message m LEFT JOIN user u ON m.user_id=u.id WHERE (m.created_at > NOW()-INTERVAL 1 DAY) AND m.game_id = ?");
    $try->execute([$gameID]);
    $messages = $try->fetchAll();

    $formattedMessages = [];

    foreach($messages as $m){
         
        array_push($formattedMessages, [
            'id' => $m['id'],
            'message' => $m['message'], 
            'user_id' => $m['user_id'],
            'created_at' => $m['created_at'],
            'timestamp' => getTime($m['created_at']),
        ]);
    }

    echo(json_encode(['messages' => $formattedMessages]));
}