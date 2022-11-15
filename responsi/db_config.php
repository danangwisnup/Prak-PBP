<?php
//Danang Wisnu Prayoga (24060120140160)
//Deskripsi : untuk menghubungkan ke database

$db_host = 'localhost';
$db_database = 'pbp_variasi1';
$db_username = 'root';
$db_password = '';


// connect database
$db = new mysqli($db_host, $db_username, $db_password, $db_database);
if ($db->connect_errno) {
    die("Tidak menghubungkan database: <br />" . $db->connect_error);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
