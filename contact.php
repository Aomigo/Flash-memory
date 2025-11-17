<!DOCTYPE HTML>
<html lang="fr">

<?php
    require_once 'partials/head.php';
    require_once 'utils/validators.php';
?>

<link rel="stylesheet" href="assets/css/contact.css">
</head>
<body>

    <?php require_once 'partials/header.php'; ?>

    <h2>Lorem Ipsum is simply dummy text of the printing and.</h2>
    <p class="centeredText mt-10px">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

    <figure class="mt-large"><img class="map" src="assets/images/map.png" alt="Image couldn't be found"></figure>

    <div class="infoContainer">
        <div class="logosContainer">
            <p>
                Suivez-nous
            </p>
            <div class="logo-link">
                <i class="ri-facebook-box-fill"></i>
                <i class="ri-instagram-fill"></i>
                <i class="ri-twitter-x-fill"></i>
                <i class="ri-linkedin-box-fill"></i>
            </div>
        </div>
        <hr class="horizontalDivider phoneView"/>
        <hr class="verticalDivider"/>
        <div class="phoneInfo">
            <i class="ri-phone-fill"></i>
            <p>
                +33 6 01 02 03 04
            </p>
        </div>
        <hr class="horizontalDivider phoneView"/>
        <hr class="verticalDivider">
        <div class="addressInfo">
            <i class="ri-map-pin-fill"></i>
            <p>
                10 rue de la Paix </br> 75002 Paris
            </p>
        </div>
    </div>

    <hr class="horizontalDivider"/>

    <h2 class="thinText contactSubtitle mt-large">Contact us !</h2>
    <p class="centeredText smallText">Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing Elit <br/>Suspendisse scelerisque in tortor vitae sollicitudin.</p>

    <form action="contact.php" method="POST">
        <?php 
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                trySendingContactMail($_POST);
            }
        ?>
        <div>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id = "firstName" value="<?=cleanData($_POST['firstName'] ?? '')?>"/>
        </div>

        <div>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id = "lastName" value="<?=cleanData($_POST['lastName'] ?? '')?>"/>
        </div>

        <div class="fullWidth">
            <label for="email">Email Adress</label>
            <input type="email" name="email" id = "email" value="<?=cleanData($_POST['email'] ?? '')?>"/>
        </div>

        <div class="fullWidth">
            <label for="message">Message</label>
            <textarea type="text" name="message" id="message"><?=cleanData($_POST['message'] ?? '')?></textarea>
        </div>
        
        <button class="submitButton" type="submit">Send</button>

    </form>

    <?php include 'partials/footer.php'; ?>

</body>