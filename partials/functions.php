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

function active($current_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($current_page == $url){
      echo 'active'; //class name in css 
  } else {
      echo 'unactive';
  }
}