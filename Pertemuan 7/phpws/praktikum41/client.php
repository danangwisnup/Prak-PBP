<?php
// Nama : Danang Wisnu Prayoga
// NIM  : 24060120140160
// Path : praktikum41\client.php

// Init client
// Membuat instance SoapClient baru untuk mengakses service.php
// Membuatnya menggunakan parameter null dan array(uri, location) 
// yang dikirim ke service.php dengan alamat http://localhost/phpws/service.php
$client = new SoapClient(null, array(
    'uri' => 'http://localhost/phpws/praktikum41/service.php',
    'location' => 'http://localhost/phpws/praktikum41/service.php',
));

// Memanggil fungsi tambah() dari server
// dengan membawa 2 buah bilangan yaitu 3 dan 2
$return = $client->__soapCall("tambah", array(3, 2));

// Menampilkan hasil dari pemanggilan fungsi tambah
echo "Hasil penumlahan web service 3+2 = " . $return;
