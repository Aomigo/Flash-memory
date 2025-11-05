<!DOCTYPE html>
<html lang="en">

<?php include 'partials/head.php'; ?>
<link rel="stylesheet" href="assets/css/Echec.css">
</head>
<body>
    <?php include 'partials/header.php'; ?>
    <main>
        <?php if (isset($_GET['login']) && $_GET['login'] === 'success'): ?>
            <p class="success-message">You have successfully logged in, <?php echo $_SESSION['user']['pseudo']?>!</p>
        <?php endif; ?>
        <!--1st section-->

        <section class="banner">

            <p class="text orange">
                <strong>Le texte orange</strong>
            </p>

            <h1>Le Paragraphe principale,<br />qui dois être super grand,<br />et en plusieurs lignes ...<br />J'ai pas
                d'idée</h1>

            <p class="text">Encore un text super long mais pas en h1,<br />bon bah je sais pas quoi mettre encore
                ...<br /> Sinon vous ça vas ? Tout ce passe bien ?</p>

            <a href="********" class="button">Start !</a>

        </section>

        <!--Game selection-->

        <section class="GameSelect">

            <h3>Our Games</h3>
            <div class="Game">
                <figure>
                    <a href="********">
                        <img src="assets\images\5e3cba2fbfa61b5f20863c65578cd03e1ab0a523.jpg" alt="Image not found"
                            class="img" width="300">
                    </a>
                    <figcaption class="text">Power of Memory</figcaption>
                </figure>

                <figure>
                    <a href="********">
                        <img src="assets\images\bf05db6f069cd0d85a1231abce602cf837179a7b.jpg" alt="Image not found"
                            class="img" width="300">
                    </a>
                    <figcaption class="text">Game n°2</figcaption>
                </figure>

                <figure>
                    <a href="********">
                        <img src="assets\images\bf05db6f069cd0d85a1231abce602cf837179a7b.jpg" alt="Image not found"
                            class="img" width="300">
                    </a>
                    <figcaption class="text">Game n°3</figcaption>
                </figure>
            </div>
        </section>

        <!--3d section-->

        <section class="bloc3">

            <h1 class="center">Un text<h1>

                    <h1>Un text<h1>

                            <p class="text">Un text</p>

                            <img src="assets\images\be61ec5cdee17a4986b5e984701816a4cc2b0ee0.jpg" alt="Image not found"
                                class="grandeImg" width="300">

        </section>

        <!--Web site stats-->

        <section class="WebSiteStats">

            <p><strong>Un text</strong></p>
            <p>Un text</p>

            <div>

                <div class="stat blue">
                    <h1>310</h1>
                    <p class="second">Games played</p>
                </div>

                <div class="stat white">
                    <h1>1020</h1>
                    <p class="second">Players online</p>
                </div>

                <div class="stat orange">
                    <h1>10s</h1>
                    <p class="second">Best time</p>
                </div>

                <div class="stat red">
                    <h1>9300</h1>
                    <p class="second">Player registred</p>
                </div>

                <div class="stat orange">
                    <h1>2</h1>
                    <p class="second">Record beat today</p>
                </div>
            </div>

        </section>

        <!--Our team-->

        <section class="Team">
            <h1 class="center">Un text</h1>
            <p class="center">Au revoir</p>
            <div class="teamImg">
                <figure class="teamMem">
                    <img src="assets\images\50036d8bbf9842a13efb8cc735f834a004bf06a9.png" alt="Image not found"
                        class="imgTeam" width="300">
                    <figcaption><strong>********</strong></figcaption>
                </figure>

                <figure class="teamMem">
                    <img src="assets\images\50036d8bbf9842a13efb8cc735f834a004bf06a9.png" alt="Image not found"
                        class="imgTeam" width="300">
                    <figcaption><strong>********</strong></figcaption>
                </figure>

                <figure class="teamMem">
                    <img src="assets\images\50036d8bbf9842a13efb8cc735f834a004bf06a9.png" alt="Image not found"
                        class="imgTeam" width="300">
                    <figcaption><strong>********</strong></figcaption>
                </figure>
            </div>
        </section>

        <!--Stay informed-->

        <section class="contactUs">

            <h1>Un text</h1>

            <p>Allez on devine celui ci, c'est ? ... Bah non c'est un diplodocus pas un text, faut suivre un peux !</p>

            <div>
                <p class="first"><strong>zdvdgerfgsdgergv</strong></p>

                <p class="second">refgesfdvwgrqfsdfg</p>

                <form>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <button type="submit">Validate</button>
                </form>

            </div>
        </section>
    </main>
   <?php include 'partials/footer.php'; ?>
</body>

</html>