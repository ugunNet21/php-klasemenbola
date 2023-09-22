<?php

require_once('koneksi.php');

// data klasemen
$query = "SELECT
    NamaKlub,
    Main AS Ma,         -- Jumlah pertandingan
    Menang AS Me,       -- Jumlah kemenangan
    Seri AS S,          -- Jumlah seri
    Kalah AS K,         -- Jumlah kekalahan
    GoalMenang AS GM,   -- Jumlah gol yang dicetak
    GoalKalah AS GK,    -- Jumlah gol yang kemasukkan
    Point
FROM
    Klub";

//  klasemen
$query = "SELECT NamaKlub, Ma, Me, S, K, GM, GK, Point FROM Klub";
// $query = "SELECT NamaKlub, Point FROM Klub";

$result = $koneksi->query($query);

if ($result->num_rows > 0) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Klasemen Sepak Bola</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid #ccc;
            }

            th,
            td {
                padding: 10px;
                text-align: center;
            }

            th {
                background-color: #f2f2f2;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            h1 {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>Klasemen Sepak Bola</h1>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Klub</th>
                <th>Ma</th>
                <th>Me</th>
                <th>S</th>
                <th>K</th>
                <th>GM</th>
                <th>GK</th>
                <th>Point</th>
            </tr>
            <?php
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row["NamaKlub"] . "</td>";
                echo "<td>" . $row["Ma"] . "</td>";
                echo "<td>" . $row["Me"] . "</td>";
                echo "<td>" . $row["S"] . "</td>";
                echo "<td>" . $row["K"] . "</td>";
                echo "<td>" . $row["GM"] . "</td>";
                echo "<td>" . $row["GK"] . "</td>";
                echo "<td>" . $row["Point"] . "</td>";
                echo "</tr>";
                $no++;
            }
            ?>
        </table>

    </body>

    </html>
<?php
} else {
    echo "Belum ada data klasemen yang tersedia.";
}


$koneksi->close();
?>