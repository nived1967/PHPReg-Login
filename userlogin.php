<?php
include 'connect.php';
$flag=0;
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];

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


$sql = "SELECT * from `information` where email='$email' and password='$password'";

if ($flag==0) {
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['name']=$row['name'];
    $_SESSION['email']=$row['email'];
    $_SESSION['password']=$row['password'];
    $_SESSION['confirmPassword']=$row['cpassword'];
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