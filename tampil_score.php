

<!DOCTYPE html>
<html>
<head>
    <title>Klasemen Sepak Bola</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        /* Responsif untuk layar kecil */
        @media screen and (max-width: 600px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 6px;
            }
        }
    </style>
</head>
<body>
    <h1>Klasemen Sepak Bola</h1>
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

    // Ambil data klub
    $query = "SELECT NamaKlub FROM Klub";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {

        $klubData = array();
        // var_dump($klubData);
        // Inisialisasi data klub
        // Inisialisasi data klub (mengonversi nama klub ke huruf kecil)
        while ($row = $result->fetch_assoc()) {
            $klubNama = strtolower($row['NamaKlub']); // Konversi ke huruf kecil
            $klubData[$klubNama] = array(
                'Ma' => 0,
                'Me' => 0,
                'S' => 0,
                'K' => 0,
                'GM' => 0,
                'GK' => 0,
                'Point' => 0,
            );
        }

        // Ambil data pertandingan
        $query = "SELECT Klub1, Klub2, Score1, Score2 FROM Pertandingan";
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            // Hitung statistik untuk setiap pertandingan
            while ($row = $result->fetch_assoc()) {
                $klub1 = strtolower($row['Klub1']);
                $klub2 = strtolower($row['Klub2']);

                // Periksa apakah kunci ada dalam $klubData sebelum mengaksesnya
                if (array_key_exists($klub1, $klubData) && array_key_exists($klub2, $klubData)) {
                    $score1 = $row['Score1'];
                    $score2 = $row['Score2'];

                    // Update statistik klub
                    $klubData[$klub1]['Ma']++;
                    $klubData[$klub2]['Ma']++;

                    if ($score1 > $score2) {
                        // Klub 1 menang
                        $klubData[$klub1]['Me']++;
                        $klubData[$klub1]['Point'] += 3;
                        $klubData[$klub2]['K']++;
                    } elseif ($score1 < $score2) {
                        // Klub 2 menang
                        $klubData[$klub2]['Me']++;
                        $klubData[$klub2]['Point'] += 3;
                        $klubData[$klub1]['K']++;
                    } else {
                        // Pertandingan seri
                        $klubData[$klub1]['S']++;
                        $klubData[$klub2]['S']++;
                        $klubData[$klub1]['Point']++;
                        $klubData[$klub2]['Point']++;
                    }

                    // Update jumlah gol
                    $klubData[$klub1]['GM'] += $score1;
                    $klubData[$klub1]['GK'] += $score2;
                    $klubData[$klub2]['GM'] += $score2;
                    $klubData[$klub2]['GK'] += $score1;
                } else {
                    // Handle jika klub tidak ditemukan dalam $klubData
                    echo "Data klub tidak ditemukan: " . $klub1 . " atau " . $klub2;
                }
            }

            // Urutkan data klasemen berdasarkan poin dan selisih gol (descending)
            uasort($klubData, function ($a, $b) {
                $pointA = isset($a['Point']) ? $a['Point'] : 0;
                $pointB = isset($b['Point']) ? $b['Point'] : 0;

                if ($pointA === $pointB) {
                    $goalDiffA = ($a['GM'] - $a['GK']);
                    $goalDiffB = ($b['GM'] - $b['GK']);
                    return $goalDiffB - $goalDiffA;
                }

                return $pointB - $pointA;
            });

            // Tampilkan data klasemen
            echo "<table>";
            echo "<tr><th>No</th><th>Klub</th><th>Ma</th><th>Me</th><th>S</th><th>K</th><th>GM</th><th>GK</th><th>Point</th></tr>";
            $no = 1;
            foreach ($klubData as $klub => $data) {
                echo "<tr>";
                echo "<td>{$no}</td>";
                echo "<td>{$klub}</td>";
                echo "<td>{$data['Ma']}</td>";
                echo "<td>{$data['Me']}</td>";
                echo "<td>{$data['S']}</td>";
                echo "<td>{$data['K']}</td>";
                echo "<td>{$data['GM']}</td>";
                echo "<td>{$data['GK']}</td>";
                echo "<td>{$data['Point']}</td>";
                echo "</tr>";
                $no++;
            }
            echo "</table>";
        } else {
            echo "Belum ada data pertandingan.";
        }
    } else {
        echo "Belum ada data klub.";
    }
    // var_dump($klubData);
    $koneksi->close();
    ?>
</body>
</html>
    