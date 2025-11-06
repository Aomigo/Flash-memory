<?php
require "database.php";
$pdo = getPDO();

define("PASSWORD_MIN_LENGTH", 8);
define("PSEUDO_MIN_LENGTH", 4);

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"];
$pseudo = $_POST["pseudo"];

$user_data = [$email, $password, $confirm_password, $pseudo];

CleanDatasInAnArray($user_data);

if(CheckForNoEmptyField($user_data)){
    echo "Please fill all field";
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Invalid email format";
}
elseif(!empty(CheckDataInDataBase($email, "user", "email", $pdo))){
    echo "Email already linked to an account";
}
elseif($password != $confirm_password){
    echo "Password confirmation different from given password";   
}
elseif(strlen($password) < PASSWORD_MIN_LENGTH){
    echo "Pass word must contain at least 8 characters";
}
elseif(!SearchForDigitsInString($password)){
    echo "Password must contain a nuber";
}
elseif(!SearchForSpecialCharsInString($password)){
    echo "Password must contain a special character";
}
elseif(!SearchForUppercaseInString($password)){
    echo "Password must contain an uppercase";
}
elseif(strlen($pseudo) < PSEUDO_MIN_LENGTH){
    echo "Pseudo must contain 4 characters minimum";
}
elseif (!Empty(CheckDataInDataBase($pseudo, "user", "pseudo", $pdo))) {
    echo "Pseudo already used";
}
else{
    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO `user`(email, password, pseudo, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$email, $password, $pseudo]);
}

function CleanData($data){
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function SearchForSpecialCharsInString($data){
    return (bool) preg_match('/[&@#$?]/', $data);
}

function SearchForDigitsInString($data){
    return preg_match("/[0-9]/", $data);
}

function SearchForUppercaseInString($data){
    return preg_match("/[A-Z]/", $data);
}

function CheckForNoEmptyField(array $data){
    $emptyField = false;

    foreach($data as $field){
        $emptyField = $emptyField || empty($field);
        if($emptyField) break;
    }

    return $emptyField;
}

function CleanDatasInAnArray(array $array){
    foreach($array as $data){
        $data = CleanData($data);
    }
}

// transfer pdo here was mandatory
function CheckDataInDataBase($dataToCheck, $tableToCheck, $columnToCheck, $pdo){
    $sql = "SELECT `$columnToCheck` FROM `$tableToCheck` WHERE `$columnToCheck` = ?";
    $checkData = $pdo->prepare($sql);
    $checkData->execute([$dataToCheck]);

    return $checkData->fetchColumn();
}