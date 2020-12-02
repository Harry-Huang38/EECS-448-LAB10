<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
    
$database_URL = 'mysql.eecs.ku.edu';
$my_user = 'maokunhuang';
$my_password = 'Cohh7che';
$database_name = 'maokunhuang';

$mysqli = new mysqli($database_URL, $my_user, $my_password, $database_name);
if($mysqli->connect_errno){
    printf("Connect failed:%s\n", $mysqli->connect_error);
    exit();
}
echo 'Connection Succeeded<br />';

mysqli_query($mysqli , "set names utf8");

$ID = $_POST["ID"];
if($ID == ''){
    echo "Please Do Not Leave the Text Empty";
}
else{
    $query = "INSERT INTO USER_ID (ID) VALUES ('".$ID."')";
    
    if(!$mysqli->query($query)){
        echo "User ID(".$ID.") Can not Stored in Database. The User Already Exists";
    }
    else{
        echo "New User(".$ID.") was Successfully Stored in the Database.";
    }
}
$mysqli->close();
?>
