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

echo "<title>Lab10_Exercise_7</title>";
echo "<h2 style='text-align: center;'> Lab10_Exercise_7 Delete Posts</h2><br>";
echo "<h3 style='text-align: center;'>Connection Succeeded<br/></h3><br>";

$query = "SELECT post_id FROM Posts";

foreach( $_POST['deletePost'] as $temp){
    $query_Delete = "DELETE FROM Posts WHERE post_id = '".$temp."'";

    if ($result = $mysqli->query($query_Delete)){
        echo "<h4 style='text-align: center;'>Post ID (".$temp.")'s Post has been Delete";
    }
    else{
        echo "<h4 style='text-align: center;'>Can not Delete !!";
    }
}
$mysqli->close();
?>