<!DOCTYPE html>
<html lang="en">
<!--the head that imports remixicon's link, aswell as the needed stylesheets-->

<?php include 'utils/common.php';?>

<?php include 'partials/head.php'; ?>

<body>
    <?php include 'partials/header.php'; ?>
    <main>
        <div class="main-wrapper">
            <div class="pres">
                <h1>The Power Of Memory</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse scelerisque in tortor vitae
                    sollicitudin.</p>
            </div>
            <div class="game-wrapper">
                <form action="#" method="get">
                    <div class="difficulty">
                        <label for="difficulty">Grid Difficulty</label>
                        <select name="difficulty" id="difficulty">
                            <option value="easy">4x4</option>
                            <option value="medium">6x6</option>
                            <option value="hard">8x8</option>
                            <option value="impossible">10x10</option>
                        </select>
                    </div>
                    <div class="theme">
                        <label for="theme">Choose a theme</label>
                        <select name="theme" id="theme">
                            <option value="flowers">Flowers</option>
                            <option value="lord">Lord of the rings</option>
                            <option value="instruments">instruments</option>
                        </select>
                    </div>
                    <button type="submit">Generate a grid</button>
                </form>
                <div class="grid">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/sword.jpg" alt="turned card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                    <img src="assets/images/card.jpg" alt="unturned memory card">
                </div>
            </div>

            <section class="section-wrapper">
                <div class="text-wrapper">
                    <div>
                        <h2>Try out a new way to play, <p>OUR way to play.</p>
                        </h2>
                    </div>
                    <div class="min-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse scelerisque in tortor
                            vitae
                            sollicitudin. Aliquam lacus augue, rhoncus eget porta et, egestas ut augue.Lorem ipsum dolor
                            sit
                            amet, consectetur adipiscing elit. Suspendisse scelerisque in tortor vitae sollicitudin.
                            Aliquam
                            lacus augue, rhoncus eget porta et, egestas ut augue.</p>
                        <p>Find it cool ? Come and play with us now.</p>
                    </div>
                    <div class="button-text">
                        <button class="play_btn">Play</button>
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="assets/images/controller.jpg" alt="xbox controller">
                </div>
            </section>
        </div>
        <div class="global-chat">
            <div class="global-header">
                <i class="ri-arrow-left-s-line"></i>
                <p>Power Of Memory</p>
            </div>
            <div class="chat">
                <div class="text-1">
                    <img src="assets/images/Frame 31284.png" alt="profile picture">
                    <div class="bubble">
                        <p>👋 Hey ! Well done Clément !</p>
                    </div>
                </div>
                <div class="text-2">
                    <div class="bubble">
                        <p>Yes ! Well done Clément !</p>
                    </div>
                </div>
                <div class="text-3">
                    <img src="assets/images/Avatars.png" alt="profile picture">
                    <div class="bubble">
                        <p>TYSM !!</p>
                    </div>
                </div>
            </div>
            <form action="">
                <textarea name="" id="" placeholder="Your message..."></textarea>
            </form>
        </div>
        <div class="global-button"><i class="ri-arrow-up-s-line"></i></div>
    </main>
    <?php include 'partials/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>

</html>