<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login-admin.php');
    exit();
}
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $tanggal = $_POST['tanggal'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "img/" . basename($image);

    $query = "INSERT INTO berita (name, tanggal, description, image) VALUES ('$name', '$tanggal', '$description', '$image')";
    mysqli_query($conn, $query);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "<script>alert('berita added successfully');</script>";
    } else {
        echo "<script>alert('Failed to upload image');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Berita</title>
</head>
<body>
    <h2>Welcome, Admin</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Judul Berita" required>
            <input type="date" name="tanggal" placeholder="Tanggal" required>
            <textarea name="description" placeholder="Deskripsi Berita" required></textarea>
            <input type="file" name="image" required>
            <button type="submit" name="submit">Add Berita</button>
        </form>
</body>
</html>