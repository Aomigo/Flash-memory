<?php

require 'database.php';

// Récupération de la saisis de l'utilisateur

if (isset($_GET['search'])) {
    $recherche = trim($_GET['search']);
} else {
    $recherche = '';
}

// Préparation et envoie de la recherche avec des jokers pour les recherche flou

$stmt = $pdo->prepare("SELECT * FROM user WHERE username LIKE :pseudo ORDER BY pseudo ASC");

$stmt->execute(['recherche' => "%$recherche%"]);

$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>