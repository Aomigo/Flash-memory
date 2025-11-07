<?php

require 'db.php';

//NB USER

$stmt = $pdo->query('SELECT COUNT(id) FROM users');
$totalUsers = (int)$stmt->fetchColumn();

// NB CONNECTED USER

$pdo->prepare('UPDATE user SET last_activity = NOW() WHERE id = :id')
    ->execute(['id' => $_SESSION['user_id']]);

$stmt = $pdo->query('SELECT COUNT(id) FROM user WHERE last_activity >= NOW() - INTERVAL 5 MINUTES');
$totalConnected = (int)$stmt->fetchColumn();

// BEST TIME

$bestScore = $pdo->query('SELECT score FROM score ORDER BY score ASC LIMIT 1')

// GAMES PLAYED TODAY

$stmt = $pdo->query('SELECT COUNT(id) FROM score WHERE created_at = NOW() - 24 HOURS');
$gamesPlayed = (int)$stmt->fetchColumn();

// RECORD BEAT TODAY

$stmt = $pdo->prepare("SELECT valeur, date_score FROM score WHERE DATE(date_score) = CURDATE() ORDER BY date_score ASC");
$stmt->execute();
$scores = $stmt->fetchAll(PDO::FETCH_ASSOC);

$recordBeat = 0;
$actualRecord = null;

// 2. Boucle sur les scores pour détecter les records battus
foreach ($scores as $s) {
    $valeur = floatval($s['valeur']);
    
    // Premier score → c’est le record initial
    if ($actualRecord === null) {
        $actualRecord = $valeur;
    } else {
        // Si un score est inférieur au record actuel → record battu !
        if ($valeur < $actualRecord) {
            $recordBeat++;
            $actualRecord = $valeur; // Nouveau record
        }
    }
}