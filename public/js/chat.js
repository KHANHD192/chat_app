let formElement = document.querySelector('form');
let boxchat = document.querySelector('.box-chat');
formElement['btn-send'].addEventListener('click',function(e){
    e.preventDefault();
    let formData  =new FormData(formElement);
    let incoming_id = formElement['imcoming'].value;
    let outgoing_id = formElement['outgoing'].value;
    let message = formElement['message'].value;
    //insert db
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                     console.log(xhr.response);

            }
    }
    xhr.open('POST', `./PHP/insert_chat.php`, true);
    // xhr.setRequestHeader('content-Type','application/x-www-form-urlencoded');
    // set default header 
    xhr.send(formData);

    formElement['message'].value = "";
})
setInterval(() => {
    let xhr = new XMLHttpRequest();
    let formData  =new FormData(formElement);
    xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                     let data = JSON.parse(xhr.response);
                       render(data);
                    // console.log(data);
            }
    }
    xhr.open('POST', `./PHP/get_chat.php`, true);
    // xhr.setRequestHeader('content-Type','application/x-www-form-urlencoded');
    // set default header 
    xhr.send(formData);

},500);
function render(data){
    boxchat.innerHTML="";
    let incoming_id = formElement['imcoming'].value;
    let outgoing_id = formElement['outgoing'].value;
    let template='';
    data.forEach(element => {
    if(element['outgoing_id'] == outgoing_id){
           template+=`<div class="chat outgoing">
           <p class="message">
              ${element['message']}
           </p>
       </div>`;
    }else {
        template+=` <div class="chat imcoming">
        <div class="avatar-imcoming">
            <img src="./public/img/thuydang.jpg" alt="">
        </div>
        <p class="message">
        ${element['message']}
        </p>
    </div>`;
    }

        
    });
    boxchat.insertAdjacentHTML('afterbegin',template);
}
