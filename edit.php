<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "123456";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

mysql_select_db("mweb", $connection) or die("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'POST':



        $topic_id = $_POST['topic_id'];

        $result = mysql_query("SELECT * FROM topic where topic_id='$topic_id'");


        $records = mysql_num_rows($result);

        if ($records > 0) {
            $row = mysql_fetch_array($result);

            echo "<h4><div id='edit_id'>" . $row[0] . "</div>The topic name: <br></div><input id='edit_top' type='text'size='95' value='" . $row[1] . "'><br>";
            echo "The topic message is:<br> <textarea id='edit_mess' rows=6 cols=100 >" . $row[2] . "</textarea>";
        } else {

            echo "Fail to user_name";
            return;
        }
        break;

    case 'PUT':

        echo "Here is PUT";

        parse_str(file_get_contents("php://input"), $post_vars);



        $topic_id = $post_vars['topic_id'];

        $topic_subject = $post_vars['topic_subject'];

        $topic_content = $post_vars['topic_content'];



        $checkid = mysql_query("SELECT * from topic WHERE topic_id='$topic_id'") or die("Could not issue MySQL query");

        $records = mysql_num_rows($checkid);

        if ($records > 0) {

            $sqlstring = "update topic set topic_subject='$topic_subject' where topic_id='$topic_id'";
            $sqlstring1 = "update topic set topic_content='$topic_content' where topic_id='$topic_id'";
            mysql_query($sqlstring);
            mysql_query($sqlstring1);
            echo "success";
        } else {
            echo "No user found";
            return;
        }

        break;

    default:



        break;
}
?>  