<?php
$koneksi = new mysqli("localhost", "root", "", "klub_sepakbola");

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

