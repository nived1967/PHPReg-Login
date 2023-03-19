<?php
include 'connect.php';
$flag=0;
$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$confirmPassword=$_REQUEST["confirmPassword"];
if(ctype_alpha(str_replace(' ','',$name))==true && !empty($name))
{

}
else
{
    $flag=1;
    $errorMessage['name']="Name must contain only alphabets";
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    
}
else
{
    $flag=1;
    $errorMessage['email']="Invalid email format";
}

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

if($uppercase && $lowercase && $number && strlen($password) >= 8) {
    
}
else
{
    $flag=1;
    $errorMessage['password']="Password must contain atleast 8 characters, 1 uppercase, 1 lowercase and 1 number and it should have size atleast 8";
}

if($password===$confirmPassword)
{

}
else
{
    $flag=1;
    $errorMessage['confirmPassword']="Password and Confirm Password must be same";
}

$sql = "INSERT INTO `information` (`name`, `email`, `password`, `cpassword`) VALUES ('$name', '$email', '$password', '$confirmPassword')";

if ($flag==0) {
    $result=mysqli_query($conn, $sql);
    session_start();
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    $_SESSION['confirmPassword']=$confirmPassword;
    if($result)
    {
    $errorMessage['noErrors']="Data inserted successfully";
  header("Content-Type: application/json");
echo json_encode($errorMessage);
    }
    else
    {
        $errorMessage['errors']="Data not inserted";
}}else {
    $errorMessage['errors']="Data not inserted";
  header("Content-Type: application/json");
echo json_encode($errorMessage);
}
?>