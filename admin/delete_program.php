<?php
include 'db.php'; // Koneksi ke database

if (isset($_GET['judul'])) {
    $judul = $_GET['judul'];
    $query = "DELETE FROM program WHERE judul='$judul'";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Program berhasil dihapus'); window.location.href='admin_program.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus program: " . $conn->error . "'); window.location.href='admin_program.php';</script>";
    }
}
?>