<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/partials/functions.php';
function tryLogin($post) {
    if(!isset($post['password'], $post['email'])) {
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
            if ($post['password'] === $user['password']) {
                session_start();
                $_SESSION['user'] = $user;
                $_POST['login'] = 'Success, currently logged in as '. $user['pseudo'];
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

//password_verify($post['password'], $user['password'])
?>