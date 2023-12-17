// active modal 
let account = document.querySelector(' .header');
let container = document.querySelector('.container');
let modal = document.querySelector('.modal');
let avatar =  document.querySelector('.image');
let changeAccount = document.querySelector('.name-user i');
let modalChangeAccount = document.querySelector('.modal-changeAcc');
let list_chat_user = document.querySelector('.user-list-chat');
let btn_closeModalChangeAcc = document.querySelector('.Done');

// active modal
avatar.addEventListener('click',function(e){
    modal.classList.add('active-modal');
})

document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
        modal.classList.toggle('active-modal');
    }
});

// đóng modal khi click bên ngoài !
container.addEventListener('click',function(e){
    //  console.log();
 if((!modal.contains(e.target) && e.target.tagName !== 'IMG' ) && !e.target.matches('.Done')){
    modal.classList.remove('active-modal');
  
 } 
});
// active modal changeAccount
changeAccount.addEventListener('click',function(e){
    // console.log('haha');
    modalChangeAccount.classList.add('active-modalChangeAcc');
})
btn_closeModalChangeAcc.addEventListener('click',function(e){
    modalChangeAccount.classList.remove('active-modalChangeAcc');
})

/**
 *    <a href="./coversation.php?user_id=<?php echo $user['user_id'] ?>" class="user-item-chat active">
                    <div class="img">
                        <img src="./public/img/thuynguyen.jpg" alt="">
                    </div> 
                    <div class="content">
                        <div class="name">Em bé</div>
                    <div class="message">Bạn : uci 20:15 </div>
                    </div>
            </a>
 */
let old_data;
            function fetchData(){
                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            old_data =xhr.response;
                            let data = JSON.parse(xhr.response);
                                   
                            render_user(data);
                        }
                }
                xhr.open('GET', `./PHP/user.php`, true);
                xhr.setRequestHeader('content-Type','application/x-www-form-urlencoded');
                xhr.send();
            }
    fetchData();
// setInterval(()=>{
//    fetchData();
// },10000);
//will call again with time is 500ms
function render_user(data){
    let template= "";
    data.forEach(element => {
         template +=`
         <a href="./coversation.php?user_id=${element['user_id']}" class="user-item-chat active">
         <div class="img">
             <img src="./public/img/${element['avatar']}" alt="">
         </div> 
         <div class="content">
             <div class="name">${element['username']}</div>
         <div class="message">Bạn : uci 20:15 </div>
         </div>
 </a>`;
    });
    list_chat_user.insertAdjacentHTML('afterbegin',template);
}