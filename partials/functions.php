<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/database.php';

//Get all users
function getUser()
{
    $pdo = getPDO();
    $try = $pdo->query("SELECT * FROM user");
    $results = $try->fetchAll();
    return $results;
}
//Get the score of all users
function getScore()
{
    $pdo = getPDO();
    $try = $pdo->query("SELECT s.*, u.pseudo, u.id, g.game_name FROM score s LEFT JOIN user u ON s.user_id = u.id LEFT JOIN game g ON s.game_id = g.id ORDER BY s.difficulty DESC, s.score DESC ");
    $results = $try->fetchAll();
    return $results;
}

//To put an underline whenever said page is used
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
//Finds the best score of the user to display
function getBestScore()
{
    $pdo = getPDO();
    $try = $pdo->query("SELECT * FROM score WHERE score.user_id = " . $_SESSION['user']['id'] . " ORDER BY difficulty DESC, SCORE DESC LIMIT 1");
    $bestScore = $try->fetch();
    return $bestScore;
}

//Get all messages
function getMessage()
{
    $pdo = getPDO();
    $try = $pdo->query("SELECT m.*, u.picture FROM message m LEFT JOIN user u ON m.user_id=u.id WHERE m.created_at > NOW()-INTERVAL 1 DAY");
    $messages = $try->fetchAll();
    return $messages;
}

//Get the time for the chat box
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

//Functions that verifies password liabilty
function searchForSpecialCharsInString($data){
    return (bool) preg_match('/[&@#$?]/', $data);
}

function searchForDigitsInString($data){
    return preg_match("/[0-9]/", $data);
}

function searchForUppercaseInString($data){
    return preg_match("/[A-Z]/", $data);
}

function cleanData($data){
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function checkForNoEmptyField(array $data){
    $emptyField = false;

    foreach($data as $field){
        $emptyField = $emptyField || empty($field);
        if($emptyField) break;
    }

    return $emptyField;
}

function cleanDatasInAnArray(array $array){
    foreach($array as $data){
        $data = cleanData($data);
    }
}

function checkDataInDataBase($dataToCheck, $tableToCheck, $columnToCheck){
    $pdo = getPDO();
    $sql = "SELECT `$columnToCheck` FROM `$tableToCheck` WHERE `$columnToCheck` = ?";
    $checkData = $pdo->prepare($sql);
    $checkData->execute([$dataToCheck]);

    return $checkData->fetchColumn();
}

function constructErrorMessage($message){
    return "<p class='errorMessage fullWidth'>" . $message . "</p>";
}

//Fetch of the cat Api, Meow :3
function getCat() {
    $url = "https://api.thecatapi.com/v1/images/search?mime_types=gif";
    $response = file_get_contents( $url );
    $data = json_decode( $response, true);

    echo "<img class='cat-img' src='" . $data[0]['url'] . "' alt='cat gif'>";
    return;
}

function insertScore() {
    $pdo = getPDO();
    $stmt = $pdo->prepare("INSERT INTO score (user_id,game_id,difficulty,score,created_at) VALUES (?,1,?,?,NOW())");
    $stmt->execute([$_SESSION['user']['id'], rand(1,3), rand(100, 4000)]);
    return;
}

function retrieveUserPicture($userId)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/utils/common.php';
    
    $pdo = getPDO();
    $getPicture = $pdo->prepare('SELECT picture FROM user WHERE id = ?');
    $getPicture->execute([$userId]);
    $pictureName = $getPicture->fetchColumn();
    
    // Check if user has a custom uploaded picture in their folder
    $baseDir = 'assets/images/';
    $userDir = $baseDir . $userId . '/';


    $customPicturePath = $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/' . $userDir . $pictureName;
    
    if(file_exists($customPicturePath)) {
        return $userDir . $pictureName;
    }
    
    // Otherwise return the default picture path from database
    return $baseDir. $pictureName;
}

function sendPictureToDatabase($userId, $pictureName)
{
    $pdo = getPDO();
    $updatePicture = $pdo->prepare('UPDATE user SET picture = ? WHERE id = ?');
    $updatePicture->execute([$pictureName, $userId]);
}

function savePictureOnDisk($userId, $pictureName)
{
    $pdo = getPDO();
    // Expected path
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/assets/images/' . $userId . '/';
    
    // Create directory if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    } else {
        // Get the old picture name from database
        $query = $pdo->prepare('SELECT picture FROM user WHERE id = ?');
        $query->execute([$userId]);
        $oldPictureName = $query->fetchColumn();

        // Delete old file on disk if it exists
        $oldPicturePath = $targetDir . $oldPictureName;
        if (file_exists($oldPicturePath)) {
            unlink($oldPicturePath);
        }
    }
    
    // Save new picture
    $newPicturePath = $targetDir . basename($pictureName);
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $newPicturePath)) {
        sendPictureToDatabase($userId, basename($pictureName));
        return true;
    }
    
    return false;
}