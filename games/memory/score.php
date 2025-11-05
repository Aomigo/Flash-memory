<!DOCTYPE html>
<html lang="en">
<?php require_once '../../partials/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/score.css">
</head>

<body>
    <?php require_once '../../partials/header.php'; ?>
    <main>
        <div class="main-wrapper">
            <div class="pres">
                <h1>Scores</h1>
                <p>Do you have the spirit of competition ?</p>
                <p>Try and beat those Scores, and prove your worth !</p>
            </div>

            <section class="table">
                <table>
                    <thead>
                        <tr>
                            <td>#</td>
                            <th>JEU</th>
                            <th>JOUEUR</th>
                            <th>DIFFICULTE</th>
                            <th>SCORE</th>
                            <th>DATE</th>
                        </tr>
                    </thead>
                    <!--A RENDRE DYNAMIQUE-->
                    <tbody>
                        <?php
                        $s = 1;
                        var_dump($_SESSION['user']['id']);
                            foreach(getScore() as $i) {
                                echo ($i['id'] == $_SESSION['user']['id']) ? '<tr class="me">' : '<tr>';
                                ?>
                            <td><?php echo $s ?></td>
                            <th class="th_img"><img class="score_img" src="<?php echo RootUrl(); ?>assets/images/memory.jpg" alt="memory">Power
                                Of memory</th>
                            <th> <?php echo $i['pseudo'] ?></th>
                            <th><?php echo $i['difficulty'] ?></th>
                            <th><?php echo $i['score'] ?></th>
                            <th><?php echo $i['created_at'] ?></th>
                                </tr>
                                <?php
                                $s++;
                            }
                        ?>
                    </tbody>
                </table>
            </section>
            <div class="space-maker">

            </div>
            <section class="section-wrapper">
                <div class="text-wrapper">
                    <div>
                        <h2>Try out a new way to play, <p>OUR way to play.</p></h2>
                    </div>
                    <div class="min-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse scelerisque in tortor vitae
                        sollicitudin. Aliquam lacus augue, rhoncus eget porta et, egestas ut augue.Lorem ipsum dolor sit
                        amet, consectetur adipiscing elit. Suspendisse scelerisque in tortor vitae sollicitudin. Aliquam
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
    </main>
    <?php include '../../partials/footer.php'; ?>
</body>

</html>