<?php
@session_start();
require_once 'database.php';  // only include once

$pdo = getPDO();  // safe, won't redeclare

//NB USER

$stmt = $pdo->query('SELECT COUNT(id) FROM user');
$totalUsers = (int)$stmt->fetchColumn();

// NB CONNECTED USER

$pdo->prepare('UPDATE user SET updated_at = NOW() WHERE id = :id')
    ->execute(['id' => $_SESSION['user']['id']]);

$stmt = $pdo->query('SELECT COUNT(id) FROM user WHERE updated_at >= NOW() - INTERVAL 5 MINUTE');
$totalConnected = (int)$stmt->fetchColumn();

// BEST TIME

$bestScore = $pdo->query('SELECT score FROM score ORDER BY score DESC, difficulty DESC LIMIT 1 ');
$best = $bestScore->fetch();
// GAMES PLAYED TODAY

$stmt = $pdo->query('SELECT COUNT(id) FROM score WHERE created_at = NOW() - INTERVAL 1 DAY');
$gamesPlayed = (int)$stmt->fetchColumn();

// RECORD BEAT TODAY

$stmt = $pdo->prepare("SELECT score, created_at FROM score WHERE DATE(created_at) = CURDATE() ORDER BY created_at ASC");
$stmt->execute();
$scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

$recordBeat = 0;
$actualRecord = null;

// 2. Boucle sur les scores pour détecter les records battus
foreach ($scores as $s) {
    $value = floatval($s['score']);
    
    // Premier score → c’est le record initial
    if ($actualRecord === null) {
        $actualRecord = $value;
    } else {
        // Si un score est inférieur au record actuel → record battu !
        if ($value < $actualRecord) {
            $recordBeat++;
            $actualRecord = $value; // Nouveau record
        }
    }
}