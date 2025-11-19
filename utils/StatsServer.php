<?php

require 'database.php'; 

//NB USER

$stmt = $pdo->query('SELECT COUNT(id) FROM users');
$totalUsers = (int)$stmt->fetchColumn();

// NB CONNECTED USER

$pdo->prepare('UPDATE user SET last_activity = NOW() WHERE id = :id')
    ->execute(['id' => $_SESSION['user_id']]);

$stmt = $pdo->query('SELECT COUNT(id) FROM user WHERE last_activity >= NOW() - INTERVAL 5 MINUTES');
$totalConnected = (int)$stmt->fetchColumn();

// BEST TIME

$bestScore = $pdo->query('SELECT user_score FROM score ORDER BY user_score ASC LIMIT 1')

// GAMES PLAYED TODAY

$stmt = $pdo->query('SELECT COUNT(id) FROM score WHERE created_at = NOW() - 24 HOURS');
$gamesPlayed = (int)$stmt->fetchColumn();

// RECORD BEAT TODAY

$stmt = $pdo->prepare("SELECT user_score, created_at FROM score WHERE DATE(date_score) = CURDATE() ORDER BY date_score ASC");
$stmt->execute();
$scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

$recordBeat = 0;
$actualRecord = null;

// Boucle sur les scores pour détecter les records battus
foreach ($scores as $s) {
    $value = floatval($s['user_score']);
    
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