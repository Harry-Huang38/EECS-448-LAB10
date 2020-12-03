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
echo "<title>Lab10_Exercise_5</title>";
echo "<h2 style='text-align: center;'> Lab10_Exercise_5 View User</h2><br>";

echo "<h3 style='text-align: center;'>Connection Succeeded<br/></h3>";

$query_User = "SELECT user_id FROM Users";
$count = 0;
if ($result = $mysqli->query($query_User)){
    echo "<table style='text-align:center'; align = 'center' border = '1' cellpadding = '0' cellspacing='0';>";
    echo"<tr style = \"background-color:#6699FF\">";
    echo "<th>User#</th>";
    echo "<th>User_ID</th>";
    while ($row = $result->fetch_assoc()) {
        $count += 1;
        echo "<tr>";
        echo "<td style = \"background-color:#FFFFCC\"> ".$count."</td>";
        echo "<td> ".$row["user_id"]."</td>";
        echo"</tr>";
    }
    echo "</table>";
}
else{
    echo "Can not access";
}
$mysqli->close();
?>
