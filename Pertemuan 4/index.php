<?php
session_start(); //memulai session

//Mengarahkan user ke halaman login jika belum login
//dan mengarahkan user ke halaman view_customer.php jika sudah login
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else {
    header('Location: view_customer.php');
}
