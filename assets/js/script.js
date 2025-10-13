const chat = document.querySelector('.global-chat')
const button = document.querySelector('.global-button i')


document.querySelector('.global-button').addEventListener('click', function() {
    chat.classList.toggle('show')
    button.classList.toggle('switch')
})