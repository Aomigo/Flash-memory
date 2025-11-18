const difficulty = document.querySelector('.difficulty-menu');
const theme = document.querySelector('.game-menu');
const gameBtn = document.querySelector('.game-start');
const gameField = document.querySelector('.grid');
const gameForm = document.querySelector('#gameForm');
const timer = document.querySelector('#timer');


let themeArray = []
let definiteArray = []
let flag = false
let locked = false
let imgUrl = ""
let choseArray = []


// Adding the layer of difficulty
difficulty.addEventListener('change', function () {
    //repopulate if changing while theme is already selected
    if (theme.value !== 'default') {
        themed(difficulty.value)
        implementing()
    }
    switch (difficulty.value) {
        case "easy":
            gameField.innerHTML = ""
            for (let i = 0; i < 16; i++) {
                gameField.classList.remove('medium')
                gameField.classList.remove('hard')
                gameField.classList.add('easy')
                let image = document.createElement('div')
                image.classList.add('card')
                image.id = i
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
                image.id = i
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
                image.id = i
                gameField.appendChild(image)
            }
            break;
    }
})

//Adding the image theme, following the difficulty grid
theme.addEventListener('change', function () {
    imgUrl = theme.value
    switch (theme.value) {
        case "flowers":
            themed(difficulty.value)
            break;
        case "lord":
            themed(difficulty.value)
            break;
        case "animals":
            themed(difficulty.value)
            break;
    }
    implementing()
})
//starting the game
gameBtn.addEventListener('click', e => {
    e.preventDefault();
    gameOn();
})


//Populate the image array
function themed(difficulty) {
    themeArray = []
    switch (difficulty) {
        case 'easy':
            for (let i = 0; i < 8; i++) {
                random()
            }
            console.log(themeArray)
            break;
        case 'medium':
            for (let i = 0; i < 16; i++) {
                random()
            }
            console.log(themeArray)
            break;
        case 'hard':
            for (let i = 0; i < 32; i++) {
                themeArray.push(i + 1)
            }
            console.log(themeArray)
            break;
    }

}
//while the number is the same, reroll it
function random() {
    let rand = Math.floor(Math.random() * (32 - 1) + 1)
    console.log(rand)
    if (themeArray.includes(rand)) {
        random()
    } else {
        themeArray.push(rand)
    }

}

//Double the images, and shuffle them in the definite array
function implementing() {
    definiteArray = []
    for (i = 0; i < themeArray.length; i++) {
        definiteArray.push(`assets/themes/${imgUrl}/${themeArray[i]}.webp`)
        definiteArray.push(`assets/themes/${imgUrl}/${themeArray[i]}.webp`)
        //envoyer en back, avec le themeArray, les divs dans l'ordre. On compare la bas
    }
    shuffleArray(definiteArray)
    console.log(definiteArray)
}

//shuffle the definite array
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

//game starting
function gameOn() {
    let turned = 0;
    let locked = false;
    let choseArray = [];

    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('click', () => {

            // Prevent nonsense clicks
            if (locked) return;
            if (choseArray.includes(card)) return;
            if (card.classList.contains('found')) return;

            turned++;
            card.classList.add('turning');
            choseArray.push(card);

            // Flip visuals
            setTimeout(() => {
                card.style.backgroundColor = 'transparent';
                card.style.backgroundImage = `url('${definiteArray[card.id]}')`;
            }, 150);

            // Compare when two card are turned and lock animation
            if (turned === 2) {
                locked = true;
                turned = 0;

                const choosed = document.querySelectorAll('.turning');

                setTimeout(() => {
                    const match =
                        choseArray[0].style.backgroundImage === choseArray[1].style.backgroundImage;

                    if (match) {
                        console.log("found");
                        choosed.forEach(c => {
                            c.classList.remove("turning");
                            c.classList.add("found");
                        });
                    } else {
                        console.log("missed");
                        choosed.forEach(c => {
                            c.classList.remove("turning");
                            c.classList.add("turning-back");

                            setTimeout(() => {
                                c.style.backgroundColor = 'yellow';
                                c.style.backgroundImage = '';
                            }, 400);

                            setTimeout(() => {
                                c.classList.remove("turning-back");
                            }, 700);
                        });
                    }

                    // Reset
                    choseArray = [];
                    locked = false;

                }, 500);
            }
        });
    });

    gameTimer.startTimer();
}


//debbug to test timer stop, to delete for presentation
timer.addEventListener('click', function(event) {
    gameTimer.stopTimer();
})

let gameTimer = {
    startTime: 0,
    intervalId: null,
    time: 0,

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
        const elapsedTime   = performance.now() - this.startTime;

        // Cenvert elapsedTime (milliseconde)
        const minutes       = Math.floor(elapsedTime / 60000);
        const secondes      = Math.floor((elapsedTime % 60000) / 1000);
        const millisecondes = Math.floor((elapsedTime % 1000) / 10);

        // At mm:ss:ms format
        const mm            = String(minutes).padStart(2, '0');
        const ss            = String(secondes).padStart(2, '0');
        const ms            = String(millisecondes).padStart(2, '0');

        this.time = `${mm}:${ss}:${ms}`;

        return this.time;
    },
    stopTimer() {

        clearInterval(this.intervalId);
        this.startTime = 0;
        timer.innerHTML = '00:00:00';

        this.time = 0;

        //document.querySelector('#timer').innerHTML = '';
    }
}