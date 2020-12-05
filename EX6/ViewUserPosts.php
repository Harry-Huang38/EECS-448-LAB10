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

echo "<title>Lab10_Exercise_6</title>";
echo "<h2 style='text-align: center;'> Lab10_Exercise_6 View Posts</h2><br>";
echo "<h3 style='text-align: center;'>Connection Succeeded<br/></h3><br>";

$userID = $_POST["ID"];
$query_Post = "SELECT content FROM Posts WHERE author_id = '".$userID."'";

if ($result = $mysqli->query($query_Post)){
    echo "<table style='text-align:center'; align = 'center' border = '1' cellpadding = '0' cellspacing='0';>";
        echo "<tr>";
        echo "<th> User (".$userID.")'s Post</th>";
        echo"</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td> ".$row["content"]." </td>";
            echo"</tr>";
        }
    echo "</table>";
}
else{
    echo "The user does not have Post";
}
$mysqli->close();
?>

