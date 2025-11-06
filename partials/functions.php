<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/database.php';

function getUser()
{
    $pdo = getPDO();
    $try = $pdo->query("SELECT * FROM user");
    $results = $try->fetchAll();
    return $results;
}

function getScore()
{
    $pdo = getPDO();
    $try = $pdo->query("SELECT s.*, u.pseudo, u.id, g.game_name FROM score s LEFT JOIN user u ON s.user_id = u.id LEFT JOIN game g ON s.game_id = g.id");
    $results = $try->fetchAll();
    return $results;
}

function active($current_page)
{
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($current_page == $url) {
        echo 'active'; //class name in css 
    } else {
        echo 'unactive';
    }
}

function getBestScore()
{
    $pdo = getPDO();
    $try = $pdo->query("SELECT * FROM score WHERE score.user_id = " . $_SESSION['user']['id'] . " ORDER BY difficulty DESC, SCORE DESC LIMIT 1");
    $bestScore = $try->fetch();
    return $bestScore;
}

function getMessage()
{
    $pdo = getPDO();
    $try = $pdo->query("SELECT * FROM message WHERE created_at > NOW()-INTERVAL 1 DAY");
    $messages = $try->fetchAll();
    return $messages;
}

function getTime($created_at)
{
    $diff = time() - strtotime($created_at);
    if ($diff < 60) {
        return $diff . "s ago";
    } elseif ($diff < 3600) {
        $minutes = floor($diff / 60);
        return $minutes ."mn ago";
    } elseif ($diff < 86400) {
        $hours   = floor($diff / 3600);
        return $hours ."h ago";
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return $days ."d ago";
    } else {
        $dateString = date("M j, Y", strtotime($created_at));
    return $dateString;
    }
}