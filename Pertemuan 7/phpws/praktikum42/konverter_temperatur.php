<?php
// Nama : Danang Wisnu Prayoga
// NIM  : 24060120140160
// Path : praktikum42\konverter_temperatur.php

// Menghapus cache wsdl
ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 0);

// Membuat fungsi celciusToKelvin()
// Fungsi ini akan dipanggil oleh client, berfungsi untuk mengkonversi suhu dari celcius ke kelvin 
function celciusToKelvin($celcius)
{
    return $celcius + 273.15;
}

// Membuat fungsi celciusToReamur()
// Fungsi ini akan dipanggil oleh client, berfungsi untuk mengkonversi suhu dari celcius ke reamur
function celciusToReamur($celcius)
{
    return (9 / 5) * $celcius + 32;
}

// Inisisasi server
// Membuat instance SoapServer baru untuk mengakses konverter_temperatur_server.php
$server = new SoapServer("http://localhost/phpws/praktikum42/temcon.wsdl");

// Mendaftarkan fungsi celciusToKelvin() dan celciusToReamur() ke server 
$server->addFunction(array("celciusToKelvin", "celciusToReamur"));

// Function handle() akan memproses request dari client 
$server->handle();
