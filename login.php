<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "123456";
$connection = mysql_connect($hostname, $username, $password) or die("Could not open connection to database");
mysql_select_db("mweb", $connection) or die("Could not select database");
$user_name = $_POST['username'];
$user_pass = $_POST['password'];
$usernameErr = $passwordErr = '';


$checkid = mysql_query("SELECT * from user WHERE user_name='$user_name'and user_pass='$user_pass'") or die("Could not issue MySQL query");

$records = mysql_num_rows($checkid);

if ($records > 0) {

    $usernameErr = "Welcome Home !";

} else {

    $usernameErr = "No Record !";
}



if ($usernameErr != '' || $passwordErr != '') {
    echo $usernameErr;
} else {
    mysql_select_db("mweb", $connection) or die("Could not select database");
    $result = mysql_query("INSERT INTO user VALUES (null,'$user_name','$user_pass',CURRENT_TIMESTAMP)") or die("Could not issue MySQL query");


    echo "Welcome Home !";
}
?>