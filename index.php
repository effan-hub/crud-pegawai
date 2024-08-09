<?php
include 'koneksi.php';

if (isset($_POST['submitCari'])) {
    $cari = $_POST['cari'];
    $query = "SELECT * FROM pegawai WHERE nama LIKE '%$cari%' OR alamat LIKE '%$cari%' OR nomorHP LIKE '%$cari%' OR tanggalLahir LIKE '%$cari%' OR jenisKelamin LIKE '%$cari%' OR gaji LIKE '%$cari%'";
} else {
    $query = "SELECT * FROM pegawai";
}
$result = $db->query($query);

while ($data = mysqli_fetch_assoc($result)) {
    $rows[] = $data;
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $gaji = $_POST['gaji'];

    $query = "INSERT INTO pegawai (nama, alamat, nomorHP, tanggalLahir, jenisKelamin, gaji) VALUES ('$nama', '$alamat', '$noHP', '$tanggalLahir', '$jenisKelamin', $gaji)";
    $result = $db->query($query);

    if ($db->affected_rows > 0) {
        echo "<script>
        alert('Data berhasil disimpan');
        </script>";
    } else {
        echo "<script>
        alert('Data gagal disimpan');
        </script>";
        echo mysqli_error($db);
    }
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
        <h1>Data Pegawai</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama Pegawai:</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <input type="text" name="alamat" id="alamat" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="noHP" class="form-label">Nomor HP</label>
                        <input type="text" name="noHP" id="noHP" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggalLahir" id="tanggalLahir" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin:</label>
                        <div class="form-check">
                            <input type="radio" name="jenisKelamin" id="Laki-laki" value="Laki-laki" class="form-check-input">
                            <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="jenisKelamin" id="Perempuan" value="Perempuan" class="form-check-input">
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="number" name="gaji" id="gaji" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" name='submit'>Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </form>
            </div>
        </div>

        <hr>
        <div class="row mt-5">
            <div class="col-md-6">
                <form action="" class="form-inline" method="post">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control mb-2 mr-2" id="cari" name="cari">
                        <button type="submit" class="btn btn-primary mb-2" name="submitCari">Cari</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <a href="cetak.php" target="_BLANK" class="btn btn-info">Cetak</a>
            </div>
        </div>
        <div class="row mt-2">
            <table class="table table-bordered">
                <thead>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
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
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>