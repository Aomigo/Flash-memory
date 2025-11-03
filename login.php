<!DOCTYPE HTML>
<html lang="fr">
<?php include 'utils/common.php';?>

<?php include 'partials/head.php'; ?>

<body>
    <div id="main">
        <div id = "text" class="container">

            <h1>Nice to see you again ! 👋</h1>
            <p class ="presentationText">Welcome back to our website, you can login here.<br/>Here to beat your best score ?</p>

            <div class="UI">

                <form>
                    <div class="userInfo mb-10px">

                        <div class="formGroup mb-10px">
                            <label for="email">Email :</label>
                            <input class ="definedH" type="email" id="email" placeholder="Example@email.com"/>
                        </div>
                        <div class="formGroup">
                            <label for="password">Password :</label>
                            <input class ="definedH" type="password" id = "password" placeholder="8 characters minimum"/>
                        </div>
                            
                    </div>
                    <a class="link mb-10px " id="forgottenPassword">Forgot your password ?</a>
                    <button type="submit" class="submitButton definedH mb-10px">Connexion</button>
                </form>

                <p class="hasSeparator mb-10px">Or</p>

                <button class="googleButton definedH mb-10px">
                    <img class = "googleIcon" src="assets/images/Google.png" alt="">
                    Connect with Google
                </button>

                <div class = "account">
                    <p>No account ?</p>
                    <a class="link">Register !</a>
                </div>

            </div>
                
        </div>

        <div id = "picture" class="container">
            <figure><img src="assets/images/LoginImage.jpg" alt=""></figure>
        </div>

    </div>
</body>
