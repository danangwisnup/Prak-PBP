<?php
//Danang Wisnu Prayoga (24060120140160)
?>

<?php
require_once 'db_login.php';

$name = $db->real_escape_string($_POST['name']);
$address = $db->real_escape_string($_POST['address']);
$city = $db->real_escape_string($_POST['city']);

$query = "INSERT INTO customers (name, address, city) VALUES ('$name', '$address', '$city')";
$result = $db->query($query);

if (!$result) {
    echo '<div class="alert alert-danger" role="alert">Error: ' . $db->error . '</div>';
} else {
    echo '<div class="alert alert-success" role="alert">
    <strong>Success!</strong> Data has been added. <br />
    Name: ' . $name . ' <br />
    Address: ' . $address . ' <br />
    City: ' . $city . '</div>';
}
$db->close();
