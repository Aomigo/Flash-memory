const chat = document.querySelector('.global-chat');
const button = document.querySelector('.global-button i');
const messageSenderForm = document.querySelector('#messageSenderForm');
const message = document.querySelector('#text');

document.querySelector('.global-button').addEventListener('click', function() {
    chat.classList.toggle('show');
    button.classList.toggle('switch');
})

// Need to check if messageSenderForm exists to avoid errors 
if (messageSenderForm) {
    messageSenderForm.addEventListener('submit', (event)=>{
        event.preventDefault();

        const message = messageSenderForm.querySelector('#text').value;
        const userId = messageSenderForm.querySelector('#user_id').value;
        const gameId = messageSenderForm.querySelector('#game_id').value;

        sendMessage(message, userId, gameId);
    })
}

function sendMessage(message, userId, gameId){

    if(message.length < 3){
        return;
    }

    const url           = "saveMessage.php";
    const formData      = {};
    formData.message    = message;
    formData.user_id    = userId;
    formData.game_id    = gameId;

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
        }
    )
    .then(res => res.json())
    .then(data => receiveMessage())
    .catch(err => alert(err));
}

function receiveMessage(){

    fetch("getMessage.php")
    .then(res => res.json())
    .then(data => updateChat(data.messages))
}

function updateChat(messages){

    const currentUserText = document.querySelector('.chat');
    const cat = document.querySelector('#cat');

    message.value = '';

    currentUserText.innerHTML = '';
    currentUserText.appendChild(cat);

    messages.forEach(e => {
        const newMessage = document.createElement("div");
        newMessage.setAttribute('class', "my-text text");
        newMessage.setAttribute('id', "myText");

        newMessage.innerHTML = `<div class="wrapper-bubble me">
                                    <div class="bubble">
                                        <p>${e.message}</p>
                                    </div>
                                    <p class="timestamp">${e.timestamp}</p>
                                </div>`

      currentUserText.appendChild(newMessage);
    });
    
    currentUserText.scrollTop = currentUserText.scrollHeight;
}