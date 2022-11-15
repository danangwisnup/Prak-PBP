<?php
require_once('db_config.php');

if (isset($_GET['id_provinsi'])) {
    $id = $_GET['id_provinsi'];
    $result = $db->query("SELECT * FROM kabupaten WHERE id_provinsi = '$id'");

    echo "<option value=''>Pilih Kabupaten</option>";
    while ($data = $result->fetch_object()) {
        echo "<option value='$data->id'>$data->nama</option>";
    }
    $db->close();
}
