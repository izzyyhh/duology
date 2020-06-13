/*
Zweck: MULTIMEDIAPROJEKT 1
Studiengang: MultiMediaTechnology @ FH Salzburg
Autor: Ismail Halili
Email: ihalili.mmt-b2019@fh-salzburg.ac.at
*/

window.addEventListener("DOMContentLoaded", () =>{
    const chatButtons = document.querySelectorAll(".startchat");
    const removeChatButton = document.getElementById("removechat");
    const sendMessageButton = document.getElementById("sendmessage");
    const chatContainer = document.getElementById("chatcontainer");
    const chatWithText = document.querySelector("#chat-with span");
    const chatTextarea = document.getElementById("chatmessage");
    const chatContentBox = document.getElementById("chat-content");
    const chatControllsForm = document.getElementById("chatcontrolls");

    var currentChatTarget = "";
    var isChatOpen = false;

    chatControllsForm.addEventListener("submit", (event)=>{
        event.preventDefault();
    });

    removeChatButton.addEventListener("click", hideChat);

    chatButtons.forEach(chatButton => {
        chatButton.addEventListener("click", event =>{
           event.preventDefault();
            let chatTo = chatButton.value;
            currentChatTarget = chatTo;

            let formData = new FormData(document.getElementById(chatTo));
            loadMessages(formData);

            displayChat(chatTo);
        });
    });

    sendMessageButton.addEventListener("click", ()=>{
        if(chatTextarea.value.length > 0){
            let sendMessageFormData = new FormData();
            sendMessageFormData.append("to", currentChatTarget);
            sendMessageFormData.append("message", getTextareaText());

            fetch("includes/chat/sendmessage.inc.php",{
                method: "post",
                body: sendMessageFormData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                chatTextarea.value ="";
                let currentFormData = new FormData(document.getElementById(currentChatTarget));
                loadMessages(currentFormData);
            });
        } else{
            console.log("no message");
        }
    });

    async function loadMessages(formData){
        fetch("includes/chat/loadmessages.inc.php", {
            method: "post",
            body: formData
        })
        .then(response => response.text())
        .then(messages => {
            
            chatContentBox.innerHTML = messages;
            chatContentBox.scrollTop = chatContentBox.scrollHeight;
        });
    }
    

    function displayChat(chatTo){
        isChatOpen = true;
        chatContainer.style.display = "block";
        chatWithText.textContent = chatTo;
    }

    function hideChat(chatTo){
        isChatOpen = false;
        chatContainer.style.display = "none";
    }
    
    function getTextareaText(){
        return chatTextarea.value;
    }
    /*
    function renderChat(){
        let currentFormData = new FormData(document.getElementById(currentChatTarget));
        if(isChatOpen){
            setInterval(()=>{
                console.log(currentChatTarget);
                loadMessages(currentFormData);
            }, 1000);
        }
    }*/

    //setInterval(renderChat, 2000);

    function enterKeyHandle(){
        if(isChatOpen){
            sendMessageButton.click();
        }
    }

    chatTextarea.addEventListener("keypress", (event)=>{
        if(event.key === "Enter"){
            enterKeyHandle();
        }
    })
});

