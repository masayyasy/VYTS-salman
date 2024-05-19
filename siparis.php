<?php
include 'koneksi.php';

// Mendapatkan data dari tabel siparisdetail
$sql = "SELECT DetailId, SiparisId, MenuId, Toplam, Fiyat FROM siparisdetail";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siparis Detail</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Siparis Detail</h1>
    <table>
        <tr>
            <th>Detail ID</th>
            <th>Siparis ID</th>
            <th>Menu ID</th>
            <th>Toplam</th>
            <th>Fiyat</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Menampilkan data dari setiap baris
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['DetailId'] . "</td>";
                echo "<td>" . $row['SiparisId'] . "</td>";
                echo "<td>" . $row['MenuId'] . "</td>";
                echo "<td>" . $row['Toplam'] . "</td>";
                echo "<td>" . $row['Fiyat'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data ditemukan</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
