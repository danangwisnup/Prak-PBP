<?php
// TODO 1 : setup & connect database
$db_host = 'host:port';
$db_database = 'database';
$db_username = 'username';
$db_password = 'password';


$db = new mysqli($db_host, $db_username, $db_password, $db_database);

if ($db->connect_errno) {
    die("Could not connect to the database: <br/>" . $db->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
