<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script>
        var jsonObject;
        function register()
        {
            window.location.replace("http://localhost:3000/register.php");
        }
        function logUser() {
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
              if(xmlhttp.readyState == 4){
                var ajaxDisplay = document.getElementById('output');
                 ajaxDisplay.innerHTML = xmlhttp.responseText;
                 jsonObject = JSON.parse(xmlhttp.responseText);
                console.log(jsonObject);

                if(jsonObject.email!=null)
                {
                const emailCol=document.getElementById("email");
                emailCol.style.backgroundColor="red";
                document.getElementById("emailErr").innerHTML=jsonObject.email;
                }

                if(jsonObject.password!=null)
                {
                const passwordCol=document.getElementById("password");
                passwordCol.style.backgroundColor="red";
                document.getElementById("passwordErr").innerHTML=jsonObject.password;
                }

                if(jsonObject.noErrors!=null)
                {
                document.getElementById("noErrors").innerHTML=jsonObject.noErrors;
                window.location.replace("http://localhost:3000/dashboard.php");
                }
              }
           }

var email = document.getElementById('email').value;
var password = document.getElementById('password').value;
var str = "http://localhost:3000/userlogin.php?email=" + email ;
str +=  "&password=" + password;
xmlhttp.open("GET",str,true);
xmlhttp.send(null);
}
    </script>
</head>
<body>
<div class="container my-5">

<form name="myForm">
<div class="mb-3">
 <label for="email" class="form-label">Email</label>
 <input type="email" class="form-control" id="email" name="email"><span class="error" id="emailErr"></span>
</div>
<div class="mb-3">
 <label for="password" class="form-label">Password</label>
 <input type="password" class="form-control" id="password" aria-describedby="password" name="password"><span class="error" id="passwordErr"></span>
</div>
<input type = 'button' onclick = 'logUser()' value = 'Submit'/>
</form>
<div class="output">
    <p id="output"></p>
    <p id="noErrors"></p>
</div>
<button onclick='register()'>Register</button>
</div>
</body>
</html>