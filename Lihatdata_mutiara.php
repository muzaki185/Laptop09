<?php
// Menghubungkan ke file koneksi.php
include 'Koneksi_mutiara.php';
// Query untuk mengambil semua data dari tabel transaksi
$query = "SELECT id, nama, email, nim, password, data_barang FROM transaksi";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chek Transaksi</title>
    <style>
         body{
                background-image: url(MA.png);
                height:100vh ;
                background-size: cover;
                background-position: center;
                min-height: 100px;

        }   
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<h2>Data Transaksi</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>NIM</th>
        <th>Password</th>
        <th>Data Barang</th>
        <th>Aksi</th>
    </tr>
    <?php
        
    // Menampilkan data per baris
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['nim'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        echo "<td>" . $row['data_barang'] . "</td>";
        echo "<td>Edit | Hapus</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
// Menutup koneksi
mysqli_close($conn);
?>
</body>
</html>
