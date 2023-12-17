// let start Ajax with validate 
const formElement =  document.querySelector('.form-signup');
const btn_submit = formElement.querySelector('button');
const message_error = document.querySelector('.message');

// ngăn chặn hành vi mặc định của thẻ submit -> ko reload
formElement.addEventListener('submit',function(e){
 e.preventDefault();
})

function handl_Ajax(e){
     // khởi tạo đối tượng XMLHTTP 
     let formData  =new FormData(formElement);
    //  console.log(formData);
     let xhr =  new XMLHttpRequest();
     xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
              //case : not success
              let data =xhr.response;
              
              if(data !== 'success'){
                   let data = JSON.parse(xhr.response);
                   console.log(data);
                   for(let key in data){
                        if(data.hasOwnProperty(key)){ 
                                let fiel = key ;
                                message_error.style.display = 'block';            
                                message_error.textContent =  fiel +` : ${data[key].hasOwnProperty('require') ?data[key]['require'] : data[key]['invalid']}`  ;
                        break;
                         }
                       }
              }else {
                window.location.href = "./login.php";
                message_error.style.display = 'none';     
              }
              
                
        }        
        
     }
     xhr.open('POST', `./PHP/validate.php`, true);
     xhr.send(formData);
}
btn_submit.addEventListener('click',handl_Ajax);

