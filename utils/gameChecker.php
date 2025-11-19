<?php
@session_start();
@include $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/database.php';
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);

$score = $input["score"];
$difficulty = $input["difficulty"];

$pdo = getPDO();
$query = $pdo->prepare("INSERT INTO score (user_id, game_id, difficulty, score, created_at) VALUES (?,?,?,?,NOW())");
$query->execute([$_SESSION["user"]["id"], 1, $difficulty, $score]);

$response = [
    "result" => "IT WORKED",
    "score" => $score,
    "difficulty" => $difficulty
];
 
echo json_encode($response);