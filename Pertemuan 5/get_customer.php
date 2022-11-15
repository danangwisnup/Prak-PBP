<?php
//Danang Wisnu Prayoga (24060120140160)
?>

<?php
require_once 'db_login.php';
$customerid = $_GET['customerid'];

$query = "SELECT * FROM customers WHERE customerid = $customerid";
$result = $db->query($query);
if (!$result) {
    die("Could not query the database: <br />" . $db->error);
} else {
    while ($row = $result->fetch_object()) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Name: ' . $row->name . '<br />';
        echo 'Address: ' . $row->address . '<br />';
        echo 'City: ' . $row->city . '<br />';
        echo '</div>';
    }
}
$result->free();
$db->close();
