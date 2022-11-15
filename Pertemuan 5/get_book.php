<?php
//Danang Wisnu Prayoga (24060120140160)
?>

<?php
require_once 'db_login.php';

$title = $db->real_escape_string($_GET['title']);

$query = "SELECT * FROM books WHERE title LIKE '%$title%' LIMIT 5";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br />" . $db->error);
} else {
    while ($row = $result->fetch_object()) {
        echo '<div class="alert alert-success" role="alert">';
        echo 'Title: ' . $row->title . '<br />';
        echo 'Author: ' . $row->author . '<br />';
        echo 'ISBN: ' . $row->isbn . '<br />';
        echo 'Price: ' . $row->price . '<br />';
        echo '</div>';
    }
}
