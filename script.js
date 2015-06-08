$(document).ready(function() {
  $('#loginForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
       type: "POST",
       url: 'login.php',
       data: $(this).serialize(),
       success: function(data)
       {
          if (data === 'Login') {
            window.location = 'main.php';
          }
          else {
            alert('Wrong username/password!');
          }
       }
   });
 });
});

function checkRegLength(){
    x=document.regForm
    input=x.username.value
	input2=x.password.value
    if (input.length>10 || input.length<4){
        alert("Username must be 4-10 characters")
        return false
    } else if (input2.length>20 || input2.length<6){
        alert("Password must be 6-20 characters")
        return false
    }else {
        return true
    }
}

function checkAddLength(){
    x=document.itemSubmit
    input=x.category.value
	input2=x.price.value
	input3=x.item.value
	input4=x.message.value
    if (input.length>30 || input.length<3){
        alert("Category must be 3-30 characters")
        return false
    } else if (input2.length>13 || input2.length<1){
        alert("Price must be 1-13 numbers")
        return false
    }else if (input3.length>20 || input3.length<3){
        alert("Item must be 3-20 characters")
        return false
    }else if (input4.length>30){
        alert("Message must be less than 30 characters")
        return false
    }else if (input5.length>200){
        alert("Icon URL must be less than 200 characters")
        return false
    }else {
        return true
    }
}

