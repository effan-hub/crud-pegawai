<?php 
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM pegawai WHERE id=$id";

mysqli_query($db,$query);

if($db->affected_rows > 0) {
    echo '<script>
    alert("Data Berhasil dihapus");
    document.location.href = "index.php";
    </script>';
}
?>