const button = document.getElementById("new_message_button");

button.addEventListener("click", function (e) {
    e.preventDefault();
    let content = document.getElementById("new_message_input").value;

    if(content) {
        let xhr = new XMLHttpRequest();

        const message = {
            'content': content,
        };

        xhr.open("POST", "../api/messages/index.php");
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.send(JSON.stringify(message));
    }
    document.getElementById("new_message_input").value = "";
})

setInterval(function () {
    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        let messages = JSON.parse(xhr.responseText);
        let div = document.getElementById("chat_message_list");
        div.innerHTML = "";
        for(let message of messages) {
            div.innerHTML += `
                <div class="message_info_div">
                    <div class="message_username">${message.user}</div>
                    <div class="message_date_div">
                        <div> ${message.date} </div>
                        <div class="message_div">${message.content}</div>
                    </div>
                </div>
           
            `
        }
    }

    xhr.open("GET", "../api/messages/index.php");
    xhr.send();
}, 1000);