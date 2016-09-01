<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "123456";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

mysql_select_db("mweb", $connection) or die("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'GET':
        $sql = "SELECT topic_subject, topic_content, topic_id FROM topic";
        $result = mysql_query($sql);
        $num_rows = mysql_num_rows($result);

        if ($num_rows > 0) {

            for ($i = 0; $i < $num_rows; $i++) {
                $row = mysql_fetch_array($result);
                // output data of each row
                $message[$i]['topic_subject'] = $row['topic_subject'];
                $message[$i]['topic_content'] = $row['topic_content'];
                $message[$i]['topic_id'] = $row['topic_id'];
            }

            echo json_encode($message);
        }
        break;


    case 'DELETE':

        parse_str(file_get_contents("php://input"), $post_vars);

        echo "Here is Delete";

        $topic_id = $post_vars['delete_sub'];
echo $post_vars['delete_sub'];
        $checkid = mysql_query("SELECT * from topic WHERE topic_id='$topic_id' ") or die("Could not issue MySQL query");
        $records = mysql_num_rows($checkid);

        echo"The topic deleted.";

        if ($records > 0) {
            $sqlstring = "delete from topic where topic_id='$topic_id'";

            mysql_query($sqlstring);
        } else {

            echo "Fail to delete";
            return;
        }




        break;

    default:



        break;
}
?>  