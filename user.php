<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "123456";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");

mysql_select_db("mweb", $connection) or die("Could not select database");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'POST':



        $user_name = $_POST['username'];
        $user_pass = $_POST['password'];


        $sql = "SELECT * from user WHERE user_name='$user_name'and user_pass='$user_pass'";
        $result = mysql_query($sql);

        if ($num_rows > 0) {

            for ($i = 0; $i < $num_rows; $i++) {
                $row = mysql_fetch_array($result);
                // output data of each row
                $message[$i]['user_name'] = $row['user_name'];
                $message[$i]['user_pass'] = $row['user_pass'];
               
            }

            echo json_encode($message);
        }

        break;

    case 'PUT':

        echo "Here is PUT";

        parse_str(file_get_contents("php://input"), $post_vars);

        $user_name = $post_vars['updateusername'];

        $oldpass = $post_vars['oldpass'];

        $newpass = $post_vars['newpass'];

        $checkid = mysql_query("SELECT * from user WHERE user_name='$user_name' and user_pass='$oldpass'") or die("Could not issue MySQL query");

        $records = mysql_num_rows($checkid);

        if ($records > 0) {

            $sqlstring = "update user set user_pass='$newpass' where user_name='$user_name'";

            mysql_query($sqlstring);
        } else {
            echo "No user found";
            return;
        }

        break;


    default:



        break;
}
?>  