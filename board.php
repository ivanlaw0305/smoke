<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "123456";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

mysql_select_db("mweb", $connection) or die("Could not select database");



$sql = "SELECT topic_subject, topic_content FROM topic";
$result = mysql_query($sql);
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {

    for ($i = 0; $i < $num_rows; $i++) {
        $row = mysql_fetch_array($result);
        // output data of each row
        $message[$i]['topic_subject'] = $row['topic_subject'];
        $message[$i]['topic_content'] = $row['topic_content'];
    }

    echo json_encode($message);
}


?>