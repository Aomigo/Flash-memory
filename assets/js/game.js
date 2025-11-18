const difficulty = document.querySelector('.difficulty-menu');
const theme = document.querySelector('.game-menu');
const gameField = document.querySelector('.grid');
const gameForm = document.querySelector('#gameForm');
const timer = document.querySelector('#timer');


difficulty.addEventListener('change', function () {
    switch (difficulty.value) {
        case "easy":
            gameField.innerHTML = ""
            for (let i = 0; i < 16; i++) {
                gameField.classList.remove('medium')
                gameField.classList.remove('hard')
                gameField.classList.add('easy')
                let image = document.createElement('div')
                image.classList.add('card')
                gameField.appendChild(image)
            }

            break;
        case "medium":
            gameField.innerHTML = ""
            for (let i = 0; i < 36; i++) {
                gameField.classList.remove('easy')
                gameField.classList.remove('hard')
                gameField.classList.add('medium')
                let image = document.createElement('div')
                image.classList.add('card')
                gameField.appendChild(image)
            }
            break;
        case "hard":
            gameField.innerHTML = ""
            for (let i = 0; i < 64; i++) {
                gameField.classList.remove('easy')
                gameField.classList.remove('medium')
                gameField.classList.add('hard')
                let image = document.createElement('div')
                image.classList.add('card')
                gameField.appendChild(image)
            }
            break;
    }
})

gameForm.addEventListener('submit', (event) => {
    event.preventDefault();

    gameTimer.startTimer();
})

//debbug to test timer stop, to delete for presentation
timer.addEventListener('click', function(event) {
    gameTimer.stopTimer();
})

let gameTimer = {
    startTime: 0,
    intervalId: null,

    // Methode
    startTimer() {

        //prevent restarting timer
        if(this.intervalId != null){
            return;
        }

        this.startTime  = performance.now();
        this.intervalId = setInterval(function() {
            timer.innerHTML = gameTimer.getTimer();

            clearInterval();
        }, 10);
    },
    getTimer() {
        const elapsedTIme   = performance.now() - this.startTime;

        // Cenvert elapsedTime (milliseconde)
        const minutes       = Math.floor(elapsedTIme / 60000);
        const secondes      = Math.floor((elapsedTIme % 60000) / 1000);
        const millisecondes = Math.floor((elapsedTIme % 1000) / 10);

        // At mm:ss:ms format
        const mm            = String(minutes).padStart(2, '0');
        const ss            = String(secondes).padStart(2, '0');
        const ms            = String(millisecondes).padStart(2, '0');

        return `${mm}:${ss}:${ms}`;
    },
    stopTimer() {

        alert(gameTimer().elapsedTIme);
        clearInterval(this.intervalId);
        this.startTime = 0;

        //document.querySelector('#timer').innerHTML = '';
    }
}