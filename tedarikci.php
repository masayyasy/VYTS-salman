<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sirketadi = $_POST['SirketAdi'];
    $address = $_POST['address'];
    $kategori = $_POST['kategori'];
    $telefon = $_POST['Telefon'];

    // Menyimpan data ke tabel tedarikci
    $sql = "INSERT INTO Tedarikci (SirketAdi, addres, Kategori, Telefon) VALUES ('$sirketadi', '$address', '$kategori', '$telefon')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulir Tambah Tedarikçi</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
        }
        .form-container h1 {
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-top: 10px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Tedarikçi</h1>
        <form method="POST" action="">
            <label for="sirketadi">Nama Perusahaan:</label>
            <input type="text" id="sirketadi" name="sirketadi" required>

            <label for="address">Alamat Perusahaan:</label>
            <input type="text" id="address" name="address" required>

            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" required>

            <label for="telefon">Nomor Telepon:</label>
            <input type="text" id="telefon" name="telefon" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
