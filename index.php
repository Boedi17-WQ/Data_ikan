<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "simdataikan";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['tambah'])) {
    $kode  = $_POST['kode_ikan'];
    $nama  = $_POST['nama_ikan'];
    $jenis = $_POST['jenis_ikan'];
    $berat = $_POST['berat_ikan'];

    $query = "INSERT INTO ikan (kode_ikan, nama_ikan, jenis_ikan, berat_ikan)
              VALUES ('$kode', '$nama', '$jenis', '$berat')";

    if (mysqli_query($conn, $query)) {
        $pesan = "Data berhasil ditambahkan!";
    } else {
        $pesan = "Gagal menambahkan data: " . mysqli_error($conn);
    }
}

$data_ikan = mysqli_query($conn, "SELECT * FROM ikan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Data Ikan - Responsive VB Style</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #d4d0c8;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border: 2px solid #808080;
            padding: 20px;
            max-width: 700px;
            margin: auto;
            box-shadow: 2px 2px 4px #999;
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #000080;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #000000;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            background-color: #f0f0f0;
            border: 1px solid #808080;
            box-sizing: border-box;
        }
        button {
            background-color: #c0c0c0;
            border: 1px solid #808080;
            padding: 10px 15px;
            margin-top: 15px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #a0a0a0;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 8px;
            border: 1px solid #3c763d;
            margin-top: 10px;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            min-width: 500px;
            border-collapse: collapse;
            background-color: #f8f8f8;
            font-size: 14px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #808080;
            text-align: left;
        }
        th {
            background-color: #c0c0c0;
            color: #000;
        }

        @media screen and (max-width: 600px) {
            .container {
                padding: 15px;
            }
            h2 {
                font-size: 18px;
            }
            .table-responsive {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            table {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Sistem Informasi Data Ikan</h2>

    <?php if (isset($pesan)) echo "<div class='success'>$pesan</div>"; ?>

    <form method="POST">
        <label for="kode_ikan">Kode Ikan:</label>
        <input type="text" name="kode_ikan" id="kode_ikan" required>

        <label for="nama_ikan">Nama Ikan:</label>
        <input type="text" name="nama_ikan" id="nama_ikan" required>

        <label for="jenis_ikan">Jenis Ikan:</label>
        <input type="text" name="jenis_ikan" id="jenis_ikan" required>

        <label for="berat_ikan">Berat Ikan (kg):</label>
        <input type="number" step="0.01" name="berat_ikan" id="berat_ikan" required>

        <button type="submit" name="tambah">Tambah Data</button>
    </form>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Kode Ikan</th>
                    <th>Nama Ikan</th>
                    <th>Jenis Ikan</th>
                    <th>Berat (kg)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($data_ikan)) : ?>
                    <tr>
                        <td><?= htmlspecialchars($row['kode_ikan']) ?></td>
                        <td><?= htmlspecialchars($row['nama_ikan']) ?></td>
                        <td><?= htmlspecialchars($row['jenis_ikan']) ?></td>
                        <td><?= htmlspecialchars($row['berat_ikan']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
