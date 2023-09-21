<?php
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $klub1 = $_POST['klub1'];
    $klub2 = $_POST['klub2'];
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];

    // Validasi input

    $query = "INSERT INTO Pertandingan (Klub1, Klub2, Score1, Score2) VALUES ('$klub1', '$klub2', $score1, $score2)";

    if ($koneksi->query($query) === true) {
        echo "Data pertandingan berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
