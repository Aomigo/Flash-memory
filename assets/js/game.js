//Search for the menus
const difficulty = document.querySelector('.difficulty-menu');
const theme = document.querySelector('.game-menu');
//Everything related to the grid
const gameBtn = document.querySelector('.game-start');
const gameField = document.querySelector('.grid');
const gameForm = document.querySelector('#gameForm');
const timer = document.querySelector('#timer');
//Everything related to the score popup
const popup = document.querySelector('.finish-popup')
const closePopup = document.querySelector('.ri-close-large-fill')
const replayPopup = document.querySelector('.play-again')
//body
const body = document.querySelector('body')

let themeArray = []
let definiteArray = []
let flag = false
let locked = false
let imgUrl = ""
let choseArray = []

closePopup.addEventListener('click', e => {
    popup.classList.add('hidden')
    body.classList.remove('unscrollable')
    difficulty.removeAttribute('disabled')
    theme.removeAttribute('disabled')
    gameBtn.removeAttribute('disabled')
})


replayPopup.addEventListener('click', e => {
    shuffleArray(definiteArray)
    shuffleArray(definiteArray)
    popup.classList.add('hidden')
    body.classList.remove('unscrollable')
    difficulty.setAttribute('disabled', '')
    theme.setAttribute('disabled', '')
    gameBtn.setAttribute('disabled', '')
    gameOn();
})

//starting the game
gameBtn.addEventListener('click', e => {
    e.preventDefault();
    difficulty.setAttribute('disabled', '')
    theme.setAttribute('disabled', '')
    gameBtn.setAttribute('disabled', '')
    gameOn();
})


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
    gameTimer.startTimer();
    let turned = 0;
    let locked = false;
    let choseArray = [];

    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.classList.remove('found')
        card.style.backgroundColor = 'yellow';
        card.style.backgroundImage = '';
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
                        choosed.forEach(c => {
                            c.classList.remove("turning");
                            c.classList.add("found");
                        });
                        checkForFinish()
                    } else {
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
}

function checkForFinish() {
    let finish = true
    const cards = document.querySelectorAll('.card');
    for (let i = 0; i < cards.length; i++) {
        if (!cards[i].classList.contains('found'))
            finish = false;
    }

    if (finish) {
        let time = document.querySelector('.finish-popup .text h1')
        let diffy = document.querySelector('.finish-popup .text p')
        time.innerHTML = gameTimer.getTimer()
        diffy.innerHTML = difficulty.value
        //Get the data needed
        const data = {}
        data.score = gameTimer.getTimer()
        data.difficulty = difficulty.value
        console.log(gameTimer.getTimer())
        gameTimer.stopTimer()
        popup.classList.remove('hidden')
        body.classList.add('unscrollable')

        //end the game, fetch the useful data to gameChecker.php
        fetch('/Flash-memory/utils/gameChecker.php', {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        }
        )
            .then(res => res.json())
            .then(data => {
                console.log(data);
            })
            .catch(err => console.error(err));
    }
}

//debbug to test timer stop, to delete for presentation
timer.addEventListener('click', function (event) {
    gameTimer.stopTimer();
})

const gameTimer = {
    intervalId: null,
    startTime: 0,
    time: "00:00:00",

    startTimer() {
        if (this.intervalId !== null) return;

        this.startTime = performance.now();

        this.intervalId = setInterval(() => {
            timer.innerHTML = this.getTimer();
        }, 10);
    },

    getTimer() {
        const elapsedTime = performance.now() - this.startTime;

        const minutes = Math.floor(elapsedTime / 60000);
        const seconds = Math.floor((elapsedTime % 60000) / 1000);
        const milliseconds = Math.floor((elapsedTime % 1000) / 10);

        const mm = String(minutes).padStart(2, '0');
        const ss = String(seconds).padStart(2, '0');
        const ms = String(milliseconds).padStart(2, '0');

        this.time = `${mm}:${ss}:${ms}`;
        return this.time;
    },

    stopTimer() {
        clearInterval(this.intervalId);
        this.intervalId = null;  // <-- NECESSARY RESET
        this.startTime = 0;
        this.time = "00:00:00";
        timer.innerHTML = this.time;
    }
};
