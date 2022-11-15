<!-- Danang Wisnu Prayoga (24060120140160) -->

<?php
//File: delete_customer.php
//Deskripsi: untuk menghapus customer

//Mencegah user mengakses halaman ini secara langsung
session_start();
if (!isset($_SESSION['username'])) {
     header('Location: login.php');
}

//Memanggil file koneksi database
require_once('db_login.php');

$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

$query = " DELETE FROM customers WHERE customerid=" . $id . " ";

//Execute the query
$result = $db->query($query);
$db->close();
header('Location: view_customer.php');
?>