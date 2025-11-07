<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/partials/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/mailer/mailer.php';
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
elseif(!searchForDigitsInString($password)){
    $flag = true;
}
elseif(!searchForSpecialCharsInString($password)){
    $flag = true;
}
elseif(!searchForUppercaseInString($password)){
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

function tryRegister($post)
{
    define("PASSWORD_MIN_LENGTH", 8);
    define("PSEUDO_MIN_LENGTH", 4);

    $email = $post["email"] ?? "";
    $password = $post["password"] ?? "";
    $confirm_password = $post["confirm_password"] ?? "";
    $pseudo = $post["pseudo"] ?? "";

    $user_data = [$email, $password, $confirm_password, $pseudo];

    cleanDatasInAnArray($user_data);

    if(checkForNoEmptyField($user_data)){
        echo constructErrorMessage("Please fill all field");
        header('Cache-Control: no-cache, must-revalidate');
        return;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo constructErrorMessage("Invalid email format");
        return;
    }
    elseif(!empty(checkDataInDataBase($email, "user", "email"))){
        echo constructErrorMessage("Email already linked to an account");
        return;
    }
    elseif($password != $confirm_password){
        echo constructErrorMessage("Password confirmation different from given password");
        return;   
    }
    elseif(strlen($password) < PASSWORD_MIN_LENGTH){
        echo constructErrorMessage("Password must contain at least 8 characters");
        return;
    }
    elseif(!searchForDigitsInString($password)){
        echo constructErrorMessage("Password must contain a number");
        return;
    }
    elseif(!searchForSpecialCharsInString($password)){
        echo constructErrorMessage("Password must contain a special character");
        return;
    }
    elseif(!searchForUppercaseInString($password)){
        echo constructErrorMessage("Password must contain an uppercase");
        return;
    }
    elseif(strlen($pseudo) < PSEUDO_MIN_LENGTH){
        echo constructErrorMessage("Pseudo must contain 4 characters minimum");
        return;
    }
    elseif (!Empty(checkDataInDataBase($pseudo, "user", "pseudo"))) {
        echo constructErrorMessage("Pseudo already used");
    
        return;
    }
    else{
        $pdo = getPDO();
        $password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO `user`(email, password, pseudo, created_at, updated_at, picture) VALUES (?, ?, ?, NOW(),NOW(),'picture.jpg')");
        $stmt->execute([$email, $password, $pseudo]);
        $getUser = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $getUser->execute([':email' => $email]);
        $user = $getUser->fetch();
        session_start();
        $_SESSION["user"]= $user;
        header('Location: index.php?login=success');
        exit;
    }
}

function trySendingContactMail($post)
{
    $email = $post["email"] ?? "";
    $firstName = $post["firstName"] ?? "";
    $lastName = $post["lastName"] ?? "";
    $message = $post["message"] ?? "";

    $datas = [$email, $firstName, $lastName, $message];

    cleanDatasInAnArray($datas);

    if(checkForNoEmptyField($datas)){
        echo constructErrorMessage("Please fill all field");
        header('Cache-Control: no-cache, must-revalidate');
        return;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo constructErrorMessage("Invalid email format");
        return;
    }

    sendContactMail($firstName, $lastName, $email, $message);
}