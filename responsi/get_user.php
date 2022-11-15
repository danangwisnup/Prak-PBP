<?php
require_once('db_config.php');

$email = $_GET['email'];

$sql = "SELECT * FROM user WHERE email = '$email'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "false";
} else {
    echo "true";
}

$db->close();
