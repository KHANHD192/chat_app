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
              console.log(data);
              if(data !== 'success'){
                message_error.style.display = 'block';
                message_error.textContent="Thông tin tài khoản không chính xác";
              }else {
                window.location.href = "./home.php";
                message_error.style.display = 'none';     
              }
              
                
        }        
        
     }
     xhr.open('POST', `./PHP/sigin.php`, true);
     xhr.send(formData);
}
btn_submit.addEventListener('click',handl_Ajax);