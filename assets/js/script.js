const chat = document.querySelector('.global-chat');
const button = document.querySelector('.global-button i');
const messageSenderForm = document.querySelector('#messageSenderForm');


document.querySelector('.global-button').addEventListener('click', function() {
    chat.classList.toggle('show');
    button.classList.toggle('switch');
})

messageSenderForm.addEventListener('submit', ()=>{
    preventDefault();
    sendMessage();
})

function sendMessage(){
    fetch()
}

function receiveMessage(){
    fetch()

}