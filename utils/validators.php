<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/partials/functions.php';
@session_start();
function tryLogin($post)
{
    if (!isset($post['password'], $post['email'])) {
        echo 'ERROR, email or password not set';
        return;
    }

    if (strlen($post['password']) < 8) {
        echo 'ERROR, password should contain at least 8 characters';
        return;
    }
    $users = getUser(); // ideally this should query by email only
    foreach ($users as $user) {
        if ($post['email'] === $user['email']) {
            if (password_verify($post['password'], $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                $_POST['login'] = 'Success, currently logged in as ' . $user['pseudo'];
                header('Location: index.php?login=success');
                exit;
            } else {
                echo 'ERROR, Invalid credentials';
                return;
            }
        }
    }

    echo 'ERROR, Email not found';
}

function trySending($post)
{
    if (!isset($post['text'])) {
        echo 'Send a message';
        return;
    }
    $pdo = getPDO();
    $try = $pdo->prepare("INSERT INTO message (game_id, user_id, message, created_at) VALUES (?,?,?,NOW())");
    $exec = $try->execute(['1', $_SESSION['user']['id'], $post['text']]);
    header('Location: game.php');
    exit;
}

function changeEmail($mail)
{
    $flag = false;
    $pdo = getPDO();
    $stmt = $pdo->query("SELECT * FROM user");
    $users = $stmt->fetchAll();
    foreach ($users as $user) {
        if ($user['email'] == $mail) {
            $flag = true;
        }
    }
    if ($flag) {
        header('location: account.php?mail=error');
        return;
    }

    $changeMail = $pdo->prepare('UPDATE user SET email = ? WHERE id = ?');
    $changeMail->execute([$mail, $_SESSION['user']['id']]);
    $_SESSION['user']['email'] = $mail;
    header('location: account.php?mail=success');
    return;
}

function changePassword($password)
{
    $flag = false;
    $pdo = getPDO();
 if(strlen($password) < PASSWORD_MIN_LENGTH){
    $flag = true;
}
elseif(!SearchForDigitsInString($password)){
    $flag = true;
}
elseif(!SearchForSpecialCharsInString($password)){
    $flag = true;
}
elseif(!SearchForUppercaseInString($password)){
    $flag = true;
}

    if($flag) {
        header('location: account.php?password=error');
        return;

    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $changePassword= $pdo->prepare('UPDATE user SET password = ? WHERE id= ?');
    $changePassword->execute([$password, $_SESSION['user']['id']]);
    $_SESSION['user']['password'] = $password;
    header('location: account.php?password=success');
    return;
}

