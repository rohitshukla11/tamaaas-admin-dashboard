<?php 
$config = require("config.php");
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    $servername = $config["server"];
    $dbusername = $config["dbuser"];
    $dbpassword = $config["dbpassword"];
    $dbname = $config["dbname"];
// Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    $update = "UPDATE matchmaking SET status = 1 WHERE id = '".$id."'";

    if (mysqli_query($conn, $update))
    {
        echo "Account approved successfully";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($connect);
    }
    die;
}
?>