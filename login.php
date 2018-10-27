<?php
$config = require("config.php");
$username = $_POST["inputEmail"]; //Set UserName
$password = $_POST["inputPassword"]; //Set Password
$servername = $config["server"];
$dbusername = $config["dbuser"];
$dbpassword = $config["dbpassword"];
$dbname = $config["dbname"];
// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if(isset($username, $password)) {
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $myusername = mysqli_real_escape_string($conn, $myusername);
    $mypassword = mysqli_real_escape_string($conn, $mypassword);
    $sql="SELECT * FROM admin WHERE username='$myusername' and password='$mypassword'";
    $result=mysqli_query($conn, $sql);
    // Mysql_num_row is counting table row
    $count=mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){
        // Register $myusername, $mypassword and redirect to file "admin.php"
        // session_register("admin");
        // session_register("password");
        // $_SESSION['name']= $myusername;
        header("Location:users.php");
    }
    else {
        $msg = "Wrong Username or Password. Please retry.";
        header("location:index.php?msg=".$msg."");
    }
}
else {
    $msg = "Please enter some username and password.";
    header("location:index.php?msg=".$msg."");
}
?>