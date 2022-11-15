<?php
// Nama : Danang Wisnu Prayoga
// NIM  : 24060120140160
// Path : praktikum41\service.php

// Membuat fungsi tambah()
// Fungsi ini akan dipanggil oleh client, berfungsi untuk menjumlahkan 2 buah bilangan parameter a dan b
function tambah($a, $b)
{
    return $a + $b;
}

// Inisisasi server
// Membuat instance SoapServer baru untuk mengakses service.php
// Membuatnya menggunakan parameter null dan array(uri)
$server = new SoapServer(null, array(
    'uri' => 'http://localhost/phpws/praktikum41/service.php',
));

// Mendaftarkan fungsi tambah() ke server
$server->addFunction("tambah");

// Function handle() akan memproses request dari client
$server->handle();
