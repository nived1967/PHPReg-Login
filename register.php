<?php

$servername = "localhost";
$username = "root";
$password = "Project@2024";
$dbname="internship";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "<script>alert('Connected successfully');</script>";
?>

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
        function login()
        {
            window.location.replace("http://localhost:3000/login.php");
        }
function insertUser() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
                  if(xmlhttp.readyState == 4){
                    var ajaxDisplay = document.getElementById('output');
                     ajaxDisplay.innerHTML = xmlhttp.responseText;
                     jsonObject = JSON.parse(xmlhttp.responseText);
                    console.log(jsonObject);
                    if(jsonObject.name!=null)
                    {
                    const nameCol=document.getElementById("name");
                    nameCol.style.backgroundColor="red";
                    document.getElementById("nameErr").innerHTML=jsonObject.name;
                    }

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

                    if(jsonObject.confirmPassword!=null)
                    {
                    const confirmPasswordCol=document.getElementById("confirmPassword");
                    confirmPasswordCol.style.backgroundColor="red";
                    document.getElementById("confirmPasswordErr").innerHTML=jsonObject.confirmPassword;
                    }

                    if(jsonObject.noErrors!=null)
                    {
                    document.getElementById("noErrors").innerHTML=jsonObject.noErrors;
                    window.location.replace("http://localhost:3000/dashboard.php");
                    }
                  }
               }
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
   var password = document.getElementById('password').value;
   var confirmPassword = document.getElementById('confirmPassword').value;

   var str = "http://localhost:3000/insert.php?name=" + name ;
    str +=  "&email=" + email + "&password=" + password + "&confirmPassword=" + confirmPassword;
    xmlhttp.open("GET",str,true);
    xmlhttp.send(null);
}
</script>
</head>
<body>
<div class="container my-5">

<form name="myForm">
<div class="mb-3">
 <label for="name" class="form-label">Name</label>
 <input type="text" class="form-control" id="name" aria-describedby="name" name="name"><span class="error" id="nameErr"></span>
</div>
<div class="mb-3">
 <label for="email" class="form-label">Email</label>
 <input type="email" class="form-control" id="email" name="email"><span class="error" id="emailErr"></span>
</div>
<div class="mb-3">
 <label for="password" class="form-label">Password</label>
 <input type="password" class="form-control" id="password" aria-describedby="password" name="password"><span class="error" id="passwordErr"></span>
</div>
<div class="mb-3">
 <label for="confirmPassword" class="form-label">Confirm Password</label>
 <input type="password" class="form-control" id="confirmPassword" aria-describedby="confirmPassword" name="confirmPassword"><span class="error" id="confirmPasswordErr"></span>
</div>
<input type = 'button' onclick = 'insertUser()' value = 'Submit'/>
</form>
<div class="output">
    <p id="output"></p>
    <p id="noErrors"></p>
</div>
<button onclick='login()'>Login</button>
</div>
</body>
</html>