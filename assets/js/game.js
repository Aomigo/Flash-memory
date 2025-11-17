const difficulty = document.querySelector('.difficulty-menu')
const theme = document.querySelector('.game-menu')
const gameBtn = document.querySelector('.game-start')
const gameField = document.querySelector('.grid')


let themeArray = []
let definiteArray = []
let flag = false
let imgUrl = ""


// `card, ${i}`
// Adding the layer of difficulty
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

    for (i = 0; i < themeArray.length; i++) {
        definiteArray.push(`assets/themes/${imgUrl}/${themeArray[i]}.webp`)
        definiteArray.push(`assets/themes/${imgUrl}/${themeArray[i]}.webp`)
        //envoyer en back, avec le themeArray, les divs dans l'ordre. On compare la bas
    }
    shuffleArray(definiteArray)
    console.log(definiteArray)
})

gameBtn.addEventListener('click', e => {
    e.preventDefault();
    gameOn()
})



function random() {
    let rand = Math.floor(Math.random() * (32 - 1) + 1)
    console.log(rand)
    if (themeArray.includes(rand)) {
        random()
    } else {
        themeArray.push(rand)
    }

}

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

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}


function gameOn() {
    let turned = 0;
    //need to disable button
    const cards = document.querySelectorAll('.card')
    cards.forEach(card => {
        card.addEventListener('click', e => {
            turned++
            card.classList.add('turning')
            setTimeout(() => {
                card.style.backgroundColor = 'transparent'
                card.style.backgroundImage = `url('${definiteArray[card.id]}')`
            }, 500);


            /*fetch("../Flash-memory/utils/gameChecker.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ array: themeArray }) // Send as JSON
            })
                .then(response => response.json()) 
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error("Error :", error);
                });*/
        })
    });

}