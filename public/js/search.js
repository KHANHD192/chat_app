let searchBar = document.querySelector('.header_searchBar');
let activeUser = document.querySelector('.header_user-active');
let list_chat = document.querySelector('.user-list-chat');
let result_search = searchBar.querySelector('.result_search ');
let list_item_search = document.querySelector('.result_search .list-item');
let inputelement = searchBar.querySelector('input');
searchBar.addEventListener('click',function(e){
    //change modal
    result_search.style.display = "block";
// back icon 

let icon = searchBar.querySelector('i');
icon.classList.remove('fa-magnifying-glass');
icon.classList.add('fa-arrow-left');

icon.addEventListener('click',function(e){
    // console.log(e.target);
    e.stopPropagation();
    result_search.style.display = "none";
icon.classList.add('fa-magnifying-glass');
icon.classList.remove('fa-arrow-left');
})
 
})
//let start  ajax
inputelement.addEventListener('keyup',function(e){
    let input ='';
    input+=e.target.value;

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
               if(input!==""){
                let data =JSON.parse( xhr.response);
                 render(data);
               }

            }
    }
    xhr.open('POST', `./PHP/search.php`, true);
    xhr.setRequestHeader('content-Type','application/x-www-form-urlencoded');
    xhr.send("key="+input);
})


function render(data){
    list_item_search.innerHTML="";
    let template= "";
    data.forEach(element => {
         template +=`
<li>
<a href="./coversation.php" class="">
    <div class="img_container">
        <img src="./public/img/${element['avatar']}" alt="">
    </div>
    <div class="name">
        <p class="">${element['username']}</p>
    </div>
</a>
</li>`;
    });
    list_item_search.insertAdjacentHTML('afterbegin',template);
}