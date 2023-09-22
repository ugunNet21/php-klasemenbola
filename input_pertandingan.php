
<?php
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $klub1 = $_POST['klub1'];
    $klub2 = $_POST['klub2'];
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];

    // Buat query SQL untuk memeriksa apakah data pertandingan sudah ada dalam database
    $checkQuery = "SELECT COUNT(*) AS total FROM Pertandingan WHERE Klub1 = '$klub1' AND Klub2 = '$klub2'";
    $result = $koneksi->query($checkQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total = $row['total'];

        // Jika data pertandingan sudah ada, berikan pesan kesalahan
        if ($total > 0) {
            echo "Data pertandingan antara $klub1 dan $klub2 sudah ada dalam database.";
        } else {
            // Jika data pertandingan belum ada, lakukan operasi INSERT ke dalam database
            $query = "INSERT INTO Pertandingan (Klub1, Klub2, Score1, Score2) VALUES ('$klub1', '$klub2', $score1, $score2)";

            if ($koneksi->query($query) === true) {
                echo "Data pertandingan berhasil ditambahkan.";
            } else {
                echo "Error: " . $query . "<br>" . $koneksi->error;
            }
        }
    } else {
        echo "Gagal memeriksa data pertandingan.";
    }

    $koneksi->close();
}
