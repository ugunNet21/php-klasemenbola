<?php
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Terima data yang dikirim dari form
    $namaKlub = $_POST['namaKlub'];
    $kotaKlub = $_POST['kotaKlub'];

    // cek tabel klub
    $checkKlubQuery = "SELECT NamaKlub FROM Klub WHERE NamaKlub = '$namaKlub'";

    $result = $koneksi->query($checkKlubQuery);

    if ($result->num_rows > 0) {
  
        echo "Data klub berhasil diperbarui.";
    } else {
        // Klub belum ada dalam database, lakukan operasi penyisipan data klub di sini (misalnya, INSERT query)
        $insertKlubQuery = "INSERT INTO Klub (NamaKlub, KotaKlub, Point) VALUES ('$namaKlub', '$kotaKlub', 0)";

        if ($koneksi->query($insertKlubQuery) === TRUE) {
            echo "Data klub berhasil ditambahkan.";
        } else {
            echo "Error: " . $insertKlubQuery . "<br>" . $koneksi->error;
        }
    }
    $koneksi->close();
}
 
?>
