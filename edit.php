<?php
include 'koneksi.php';

$id=$_GET['id'];
$query = "SELECT * FROM pegawai WHERE id=$id";
$result = $db->query($query);

$row = mysqli_fetch_assoc($result);


if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $gaji = $_POST['gaji'];

    $query = "UPDATE pegawai SET nama = '$nama', alamat = '$alamat', nomorHP = '$noHP', tanggalLahir='$tanggalLahir', jenisKelamin= '$jenisKelamin', gaji=$gaji WHERE id=$id";
    $result = $db->query($query);

    if ($db->affected_rows > 0) {
        echo "<script>
        alert('Data berhasil diupdate');
        document.location.href = 'index.php'
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diupdate');
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
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $row['nama'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <input type="text" name="alamat" id="alamat" class="form-control"  value="<?= $row['alamat'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="noHP" class="form-label">Nomor HP</label>
                        <input type="text" name="noHP" id="noHP" class="form-control"  value="<?= $row['nomorHP'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggalLahir" id="tanggalLahir" class="form-control"  value="<?= $row['tanggalLahir'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin:</label>
                        <div class="form-check">
                            <input type="radio" name="jenisKelamin" id="Laki-laki" value="Laki-laki" class="form-check-input" <?= ($row['jenisKelamin'] == 'Laki-laki') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="Laki-laki">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="jenisKelamin" id="Perempuan" value="Perempuan" class="form-check-input" <?= ($row['jenisKelamin'] == 'Perempuan') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="Perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="number" name="gaji" id="gaji" class="form-control"  value="<?= $row['gaji'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name='submit'>Simpan</button>
                    <a href="index.php" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>