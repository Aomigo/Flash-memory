<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/utils/validators.php';
if (isset($_POST["password"])) {
    changePassword($_POST["password"]);
}
if (isset($_POST["mail"])) {
    changeEmail($_POST["mail"]);

}


?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partials/head.php'; ?>
<link rel="stylesheet" href="assets/css/account.css">
</head>

<body>
    <?php include 'partials/header.php'; ?>
    <main>
        <?php if (isset($_GET['mail']) && $_GET['mail'] === 'success'): ?>
            <p class="success-message">Mail successfully changed !</p>
        <?php endif; ?>
        <?php if (isset($_GET['mail']) && $_GET['mail'] === 'error'): ?>
            <p class="success-message">Mail already used, try again</p>
        <?php endif; ?>
        <?php if (isset($_GET['password']) && $_GET['password'] === 'success'): ?>
            <p class="success-message">Password successfully changed !</p>
        <?php endif; ?>
        <?php if (isset($_GET['password']) && $_GET['password'] === 'error'): ?>
            <p class="success-message">Password is used or wrong, try again </p>
        <?php endif; ?>
        <div class="main-wrapper">
            <div class="info">
                <div class="image">
                    <img src="<?php echo retrieveUserPicture($_SESSION['user']['id']); ?>" alt="default user">
                    <h2><?php echo $_SESSION['user']['pseudo'] ?></h2>
                </div>
                <div class="text">
                    <p><?php echo $_SESSION['user']['email'] ?></p>
                </div>
            </div>
            <div class="score">
                <h2>Best score :</h2>
                <div>
                    <?php
                    if (isset(getBestScore()['score'])) {
                        ?>
                        <p class="bold"><?php echo getBestScore()['score'] ?></p>
                        <p class="diff"><?php echo getBestScore()['difficulty'] ?></p>
                    <?php } else { ?>
                        <p class="bold">No score set yet ! </p>
                    <?php } ?>
                </div>
            </div>
            <div class="modify">
                <div class="mail">
                    <form action="" method="POST">
                        <label for="mail">Change Email</label>
                        <input type="email" id="mail" name="mail" placeholder="Your new email here">
                        <button type="submit">Change</button>
                    </form>
                </div>
                <div class="password">
                    <form action="" method="POST">
                        <label for="password">Change Password</label>
                        <input type="password" name="password" id="password" placeholder="Your new password here">
                        <button type="submit">Change</button>
                    </form>
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['picture'])) {
                    if (savePictureOnDisk($_SESSION['user']['id'], $_FILES['picture']['name'])) {
                        header('Location: account.php');
                        exit;
                    } else {
                        echo '<p class="errorMessage">Error while uploading picture, please try again.</p>';
                    }
                }
                ?>
                <div class="picture">
                    <!-- the enctype is mandatory for file uploads -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="picture">Change Picture</label>
                        <input type="file" name="picture" id="picture" accept="image/*">
                        <button type="submit">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?>
</body>

</html>