<!DOCTYPE html>
<html>

<head>
    <title>Mini Aplikasi Klub Sepak Bola</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        /* Style untuk card */
        .card {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Style untuk form input skor pertandingan */
        form:nth-child(3) {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Mini Aplikasi Klub Sepak Bola</h1>

    <!-- Card Input Data Klub -->
    <div class="card">
        <h2>Input Data Klub</h2>
        <form action="input_klub.php" method="POST">
            <label for="namaKlub">Nama Klub:</label>
            <input type="text" id="namaKlub" name="namaKlub" required>

            <label for="kotaKlub">Kota Klub:</label>
            <input type="text" id="kotaKlub" name="kotaKlub" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

    <!-- Card Input Skor Pertandingan -->
    <div class="card">
        <h2>Input Skor Pertandingan</h2>
        <form action="input_skor.php" method="POST">
            <label for="klub1">Klub 1:</label>
            <input type="text" id="klub1" name="klub1" required>

            <label for="klub2">Klub 2:</label>
            <input type="text" id="klub2" name="klub2" required>

            <label for="score1">Skor Klub 1:</label>
            <input type="number" id="score1" name="score1" required>

            <label for="score2">Skor Klub 2:</label>
            <input type="number" id="score2" name="score2" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

    <!-- Card Tampilkan Klasemen -->
    <div class="card">
        <h2>Tampilkan Klasemen</h2>
        <p><a href="klasemen.php">Lihat Klasemen</a></p>
    </div>

    <!-- Card Tampilkan Klasemen -->
    <div class="card">
        <h2>Tampilkan Klasemen Score</h2>
        <p><a href="tampil_score.php">Lihat Klasemen Score</a></p>
    </div>
</body>

</html>