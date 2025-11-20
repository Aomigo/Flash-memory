const chat = document.querySelector('.global-chat');
const button = document.querySelector('.global-button i');
const messageSenderForm = document.querySelector('#messageSenderForm');
const message = document.querySelector('#text');

document.querySelector('.global-button').addEventListener('click', function() {
    chat.classList.toggle('show');
    button.classList.toggle('switch');
})

messageSenderForm.addEventListener('submit', (event)=>{
    event.preventDefault();

    const message = messageSenderForm.querySelector('#text').value;

    sendMessage(message);
})

function sendMessage(message){

    if(message.lenght < 3){
        return;
    }

    const url           = "saveMessage.php";
    const formData      = {};
    formData.message    = message;

    console.log("Sending message:", message); //debbug

    fetch(url, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(formData)
        }
    )
    .then(res => res.json(),
        console.log(res)
        )
    .then(data => {
        alert(data.message);
        
    })
    .catch(err => console.error(err));
}

function receiveMessage(){
    fetch()

}