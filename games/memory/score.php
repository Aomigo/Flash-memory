<!DOCTYPE html>
<html lang="en">
<?php include '../../utils/common.php';?>

<?php include '../../partials/head.php'; ?>

<body>
    <?php include '../../partials/header.php'; ?>
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
                        <tr>
                            <td>1</td>
                            <th class="th_img"><img class="score_img" src="assets/images/memory.jpg" alt="memory">Power
                                Of memory</th>
                            <th>John Doe</th>
                            <th>Impossible</th>
                            <th>1mn36s</th>
                            <th>29/09/25</th>
                        </tr>
                        <tr>
                            <td>2</td>
                            <th class="th_img"><img class="score_img" src="assets/images/memory.jpg" alt="memory">Power
                                Of memory</th>
                            <th>Bernard</th>
                            <th>Hard</th>
                            <th>1mn12s</th>
                            <th>29/09/25</th>
                        </tr>
                        <tr>
                            <td>3</td>
                            <th class="th_img"><img class="score_img" src="assets/images/memory.jpg" alt="memory">Power
                                Of memory</th>
                            <th>Goose</th>
                            <th>Hard</th>
                            <th>2mn12s</th>
                            <th>29/09/25</th>
                        </tr>
                        <tr>
                            <td>4</td>
                            <th class="th_img"><img class="score_img" src="assets/images/memory.jpg" alt="memory">Power
                                Of memory</th>
                            <th>John Doe</th>
                            <th>Medium</th>
                            <th>55s</th>
                            <th>29/09/25</th>
                        </tr>
                        <tr>
                            <td>5</td>
                            <th class="th_img"><img class="score_img" src="assets/images/memory.jpg" alt="memory">Power
                                Of memory</th>
                            <th>Rose</th>
                            <th>Hard</th>
                            <th>1mn07s</th>
                            <th>29/09/25</th>
                        </tr>
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