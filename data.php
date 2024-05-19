<?php
require('koneksi.php');

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Pesanan</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nomor Urut</th>
            <th>Nama Pemesan</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal Pesan</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["UrunId"] . "</td>";
                echo "<td>" . $row["SiraNo"] . "</td>";
                echo "<td>" . $row["AdSoyad"] . "</td>";
                echo "<td>" . $row["UrunAdi"] . "</td>";
                echo "<td>" . $row["Fiyat"] . "</td>";
                echo "<td>" . $row["Toplam"] . "</td>";
                echo "<td>" . $row["ToplamFiyat"] . "</td>";
                echo "<td>" . $row["order_date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>