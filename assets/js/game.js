const difficulty = document.querySelector('.difficulty-menu')
const theme = document.querySelector('.game-menu')
const gameField = document.querySelector('.grid')


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