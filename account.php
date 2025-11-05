<!DOCTYPE html>
<html lang="en">
<?php include 'partials/head.php'; ?>
<link rel="stylesheet" href="assets/css/account.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main>
        <div class="main-wrapper">
            <div class="info">
                <div class="image">
                    <img src="assets/images/default user.jpg" alt="default user">
                    <h2><?php echo $_SESSION['user']['pseudo'] ?></h2>
                </div>
                <div class="text">
                    <p><?php echo $_SESSION['user']['email'] ?></p>
                </div>
            </div>
            <div class="score">
                <h2>Best score :</h2>
                <div>
                    <p class="bold"><?php echo getBestScore()['score'] ?></p>
                    <p class="diff"><?php echo getBestScore()['difficulty'] ?></p>
                </div>
            </div>
            <div class="modify">
                <div class="mail">
                    <form action="#" method="GET">
                        <label for="mail">Change Email</label>
                        <input type="email" id="mail" name="mail" placeholder="Your new email here">
                        <button type="submit" name="mail">Change</button>
                    </form>
                </div>
                <div class="password">
                    <form action="#" method="GET">
                        <label for="password">Change Password</label>
                        <input type="password" name="password" id="password" placeholder="Your new password here">
                        <button type="submit" name="mail">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?>
</body>

</html>