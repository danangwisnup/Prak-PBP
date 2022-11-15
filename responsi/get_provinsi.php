<?php
require_once('db_config.php');

$sql = "SELECT * FROM provinsi";
$result = $db->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
}
$db->close();