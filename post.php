<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "123456";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

mysql_select_db("mweb", $connection) or die("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];
echo $method;
switch ($method) {
    case 'POST':

        $topic_id = $_POST['topic_id'];

        $checkid = mysql_query("SELECT * from topic WHERE topic_subject='$topic_subject'") or die("Could not issue MySQL query");

        $records = mysql_num_rows($checkid);

        if ($records > 0) {

            echo "The subject is already posted. Please post other name.";
            return;
        } else {

            $sqlstring = "insert into topic (topic_subject,topic_content,topic_by_name) values ('$topic_subject', '$topic_content','$topic_by_name')";

            mysql_query($sqlstring);
            echo "You have posted a message.";
        }


        break;
}

?>