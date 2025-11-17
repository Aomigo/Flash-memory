<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Flash-memory/utils/validators.php';
if (isset($_POST['text'])) {
    trySending($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partials/head.php'; ?>
<link rel="stylesheet" href="assets/css/game.css">
</head>

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
                        <select class="difficulty-menu" name="difficulty" id="difficulty">
                            <option style="display:none" value="default" selected>Select an option</option>
                            <option value="easy">4x4</option>
                            <option value="medium">6x6</option>
                            <option value="hard">8x8</option>
                        </select>
                    </div>
                    <div class="theme">
                        <label for="theme">Choose a theme</label>
                        <select class="game-menu" name="theme" id="theme">
                            <option style="display:none" value="default" selected>Select an option</option>
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
                <div class="foreign-text text">
                    <img class="pp" src="assets/images/picture.jpg" alt="profile picture">
                    <div class="wrapper-bubble">
                        <div class="bubble">
                            <p><?php  getCat() ?></p>
                        </div>
                    </div>
            </div>
                <?php
                foreach (getMessage() as $message) {
                    if($message['picture'] !== 'picture.jpg') {
                        $profile = $message['user_id'] .'/'. $message['picture'];
                    } else {
                        $profile = $message['picture'];
                    }
                    if ($message['user_id'] == $_SESSION['user']['id']) { ?>
                        <div class="my-text text">
                            <div class="wrapper-bubble me">
                                <div class="bubble">
                                    <p><?php echo $message['message'] ?></p>
                                </div>
                                <p class="timestamp"><?php echo getTime($message['created_at']) ?></p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="foreign-text text">

                            <img class="pp" src="assets/images/<?php echo $profile ?>" alt="profile picture">
                            <div class="wrapper-bubble">
                                <div class="bubble">
                                    <p><?php echo $message['message'] ?></p>
                                </div>
                                <p class="timestamp"><?php echo getTime($message['created_at']) ?></p>
                            </div>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
            <form action="" method="POST">
                <textarea name="text" id="text" placeholder="Your message..."></textarea>
                <button class="send-button" type="submit" value="Send"><i class="ri-send-plane-fill"></i></button>
            </form>
        </div>
        <div class="global-button"><i class="ri-arrow-down-s-line"></i></div>
    </main>
    <?php include 'partials/footer.php'; ?>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/game.js"></script>
</body>

</html>