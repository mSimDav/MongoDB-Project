<?php
$host="localhost";
$username="root";
$password="";
$db_name="log";
$tbl_name="login";
$con=mysqli_connect("$host","$username","$password","$db_name")or die("cannotconnect");
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$myusername=stripslashes($myusername);
$mypassword= stripslashes($mypassword);
$myusername= mysqli_real_escape_string($con,$myusername);
$mypassword= mysqli_real_escape_string($con,$mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result= mysqli_query($con,$sql);
$count=mysqli_num_rows($result);
if($count==1){
    session_start();
    $_SESSION["myusername"]=$myusername;
    
    header("location:login_succes.php");
    
}

else{
    echo "Wrong Username or Password";
}

?>




