<?php
include 'db.php'; // Koneksi ke database

if (isset($_GET['judul'])) {
    $judul = $_GET['judul'];
    $query = "SELECT * FROM program WHERE judul='$judul'";
    $result = $conn->query($query);
    $program = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $judul_baru = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_FILES['foto']['name'];
    $target = "../uploads/" . basename($foto);

    $query = "UPDATE program SET judul='$judul_baru', deskripsi='$deskripsi', foto='$foto' WHERE judul='$judul'";
    if ($conn->query($query) === TRUE) {
        move_uploaded_file($_FILES['foto']['tmp_name'], $target);
        echo "<script>alert('Program berhasil diperbarui'); window.location.href='admin_program.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui program: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/gaya.css">
    <title>Edit Program</title>
</head>
<body>
    <header>
        <h1>Edit Program</h1>
    </header>
    <main>
        <form method="post" action="edit_program.php?judul=<?php echo urlencode($judul); ?>" enctype="multipart/form-data">
            <input type="text" name="judul" value="<?php echo htmlspecialchars($program['judul']); ?>" required>
            <textarea name="deskripsi" required><?php echo htmlspecialchars($program['deskripsi']); ?></textarea>
            <input type="file" name="foto">
            <button type="submit" name="update">Perbarui Program</button>
        </form>
    </main>
</body>
</html>