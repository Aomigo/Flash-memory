<?php
require_once 'utils/validators.php';
?>
<!DOCTYPE HTML>
<html lang="fr">

<?php include 'partials/head.php'; ?>
<link rel="stylesheet" href="assets/css/logs.css">
</head>
<body>
    <div id="main">

        <div id ="text" class="container">

            <h1>Welcome among us ! 👋</h1>
            <p class ="presentationText">Welcome to our website, you can register here.<br/>Do you have what it takes to climb up the leaderboard?</p>

            <div class="UI">
                <form action ="register.php" method="POST">
                    <?php 
                    if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        tryRegister($_POST);
                    }
                    ?>
                    <div class="userInfo mb-10px">

                        <div class="formGroup mb-10px">
                            <label for="email">Email :</label>
                            <input class="definedH" type="email" name="email" id="email" placeholder="Example@email.com" value="<?= cleanData($_POST['email'] ?? '') ?>"/>
                        </div>
                        <div class="formGroup mb-10px">
                            <label for="password">Password :</label>
                            <input class="definedH" type="password" name="password" id = "password" placeholder="8 characters minimum" value="<?= cleanData($_POST['password'] ?? '') ?>"/>
                        </div>
                        <div class="formGroup mb-10px">
                            <label for="confirm_password">Confirm password :</label>
                            <input class="definedH" type="password" name="confirm_password" id = "confirm_password" placeholder="Confirm password" value="<?= cleanData($_POST['confirm_password'] ?? '') ?>"/>
                        </div>
                        <div class="formGroup mb-10px">
                            <label for="pseudo">Pseudo :</label>
                            <input class="definedH" type="pseudo" name="pseudo" id = "pseudo" placeholder="4 characters minimum" value="<?= cleanData($_POST['pseudo'] ?? '') ?>"/>
                        </div>
                            
                        <button type="submit" class="submitButton definedH">Sign up</button>
                    </div>     
                </form>

                <p class="hasSeparator">Or</p>

                <button class="googleButton definedH">
                    <img src="assets/images/Google.png" alt="">
                    Sign up with Google
                </button>

                <div class = "account">
                    <p class="account">Already got an account ?</p>
                    <a src="Login.html" class="link">Connect !</a>
                </div>

            </div>   
        </div>

        <div id ="picture" class="container">
            <figure><img src="assets/images/LoginImage.jpg" alt=""></figure>
        </div>
    </div>
    
</body>