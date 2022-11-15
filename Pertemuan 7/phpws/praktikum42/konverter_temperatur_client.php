<?php
// Nama : Danang Wisnu Prayoga
// NIM  : 24060120140160
// Path : praktikum42\konverter_temperatur_client.php

// Menghapus cache wsdl
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);

// Init client
// Membuat instance SoapClient baru untuk mengakses konverter_temperatur_server.php
// Mengguakan wsdl yang dikirim ke konverter_temperatur_server.php 
// dengan alamat http://localhost/phpws/praktikum42/konverter_temperatur_server.php?wsdl
$wsdl = "http://localhost/phpws/praktikum42/konverter_temperatur.php?wsdl";
$client = new Soapclient($wsdl);

// Menginisiasi variabel
$celcius = 30;

// Memanggil fungsi celciusToKelvin() dari server
// Membawa 1 parameter yaitu 30
$kelvin = $client->__soapCall("celciusToKelvin", array($celcius));

// Memanggil fungsi celciusToReamur() dari server
// Membawa 1 parameter yaitu 30
$reamur = $client->__soapCall("celciusToReamur", array($celcius));

// Menampilkan hasil dari pemanggilan fungsi celciusToKelvin dan celciusToReamur
echo "Konversi suhu dari Celcius ke Kelvin : " . $kelvin . "<br>";
echo "Konversi suhu dari Celcius ke Reamur : " . $reamur . "<br>";
