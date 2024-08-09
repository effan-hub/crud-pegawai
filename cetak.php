<?php
include 'koneksi.php';

$query = "SELECT * FROM pegawai";
$result = $db->query($query);

while ($data = mysqli_fetch_assoc($result)) {
    $rows[] = $data;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center">Data Pegawai</h1>
        <div class="row mt-2 justify-content-center">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Gaji</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($rows as $row) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['nomorHP']; ?></td>
                            <td><?= $row['tanggalLahir']; ?></td>
                            <td><?= $row['jenisKelamin']; ?></td>
                            <td><?= $row['gaji']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>