<header>
    <?php if(!isset($_SESSION['user'])) {
        header("Location:". RootUrl() ."login.php");
    }
    ?>
    <!--the nav composed of 4 elements-->
    <nav>
        <div class="logo"> <img src="<?php echo RootUrl(); ?>assets/images/logo.png" alt="logo">
            <div class="logo-wrapper">
                <strong>Power of memory</strong>
                <?php if (isset($_SESSION['user'])) {
                    echo '<p class="feint">' . $_SESSION['user']['pseudo'] . '</p>';
                } ?>
            </div>
        </div>
        <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <ul class="nav">
            <li>
                <a class="<?php active('index.php') ?>" href="<?php echo RootUrl(); ?>index.php">Home</a>
                <a class="<?php active('score.php') ?>" href="<?php echo RootUrl(); ?>games/memory/score.php">Score</a>
                <a class="<?php active('account.php') ?>" href="<?php echo RootUrl(); ?>account.php">My account</a>
                <a href="<?php echo RootUrl(); ?>contact.php"><button>Contact Us</button></a>
            </li>
        </ul>
    </nav>
</header>