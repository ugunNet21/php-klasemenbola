<?php
// Sambungkan ke database 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "klub_sepakbola";

$koneksi = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Terima data yang dikirim dari form
    $klub1 = $_POST['klub1'];
    $klub2 = $_POST['klub2'];
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];


    $checkKlub1 = "SELECT NamaKlub FROM Klub WHERE NamaKlub = '$klub1'";
    $checkKlub2 = "SELECT NamaKlub FROM Klub WHERE NamaKlub = '$klub2'";

    if ($koneksi->query($checkKlub1)->num_rows === 0 || $koneksi->query($checkKlub2)->num_rows === 0) {
        echo "Klub yang dimasukkan tidak valid.";
    } else {
        // Jalankan perintah SQL untuk menyimpan data pertandingan
        $sql = "INSERT INTO Pertandingan (Klub1, Klub2, Score1, Score2) VALUES ('$klub1', '$klub2', $score1, $score2)";

        if ($koneksi->query($sql) === TRUE) {
            echo "Data pertandingan berhasil ditambahkan.";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
}

$koneksi->close();
