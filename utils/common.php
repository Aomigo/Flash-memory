<?php

/**
 * 
 */
function getBaseUrl(): string {
    // Détection du protocole
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
        || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

    // Nom du serveur (ex: localhost ou domaine)
    $host = $_SERVER['HTTP_HOST'];

    // Récupère le chemin courant du script, ex: /Flash-memory/games/memory/index.php
    $scriptDir = dirname($_SERVER['SCRIPT_NAME']);

    // Trouve le dossier racine de ton projet (ici "Flash-memory")
    // ==> on extrait la première partie après "/"
    $parts = explode('/', trim($scriptDir, '/'));
    $projectRoot = $parts[0] ?? '';

    // Construit l’URL de base du projet
    return $protocol . $host . '/' . $projectRoot . '/';
}

function RootUrl($url = 'http://localhost/Flash-memory/index.php') {
    $parsed_url = parse_url($url);
    $base_url = $parsed_url['scheme'] . "://" . $parsed_url['host'] . "/";

    echo $base_url;
}