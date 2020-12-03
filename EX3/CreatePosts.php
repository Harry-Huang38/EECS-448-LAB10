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
echo "Connection Succeeded<br/>";

$authorID = $_POST["authorID"];
$content = $_POST["content"];
$query_User = "SELECT user_id FROM Users";
$isMatch = false;


if($authorID == ''){
    echo "Please Do Not Leave the authorID Empty !!<br/>";
}
if($content == ''){
    echo "The Post Has No Text !!<br/>";
}

if ($result = $mysqli->query($query_User)){
    while ($row = $result->fetch_assoc()) {
        if ($row["user_id"] == $authorID){
            $isMatch = true;
            break;
        }
    }
    if($isMatch == false){
        echo "Can not Post! Please input with correct USER ID<br/>";
    }
    else if($isMatch == true){
        echo "Log in Successfully!<br/>";
        $query_Posts= "INSERT INTO Posts (content, author_id) VALUES ('".$content."', '".$authorID."')";
        if(!$mysqli->query($query_Posts)){
            echo "Can not Stored in Database. Something Error";
        }
        else{
            echo "New Post added Successfully !!";
        }
    }
}
$mysqli->close();
?>
