<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login-admin.php');
    exit();
}
include 'db.php'; // Connect to the database

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_FILES['foto']['name'];
    $target = "../img/menu/" . basename($foto);

    // Insert program data into the database
    $query = "INSERT INTO program (judul, tanggal, deskripsi, foto) VALUES ('$judul', '$tanggal', '$deskripsi', '$foto')";
    mysqli_query($conn, $query);

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
        echo "<script>alert('Program added successfully');</script>";
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
    <title>Admin Dashboard - Program</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color:rgb(221, 255, 252);
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .navbar {
            background-color: #ffd700;
            padding: 20px;
            text-align: center;
            color: white;
            text-decoration: none;
        }

        .navbar-logo {
            text-decoration: none;
            color: white;
            font-size: 1.2rem;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="file"] {
            margin: 10px 0;
        }

        button {
            background-color: #ffd700;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="index-admin.php" class="navbar-logo">Dashboard<span> Admin</span></a>
    </div>

    <h2>Welcome, Admin</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="judul" placeholder="Judul Program" required>
        <input type="date" name="tanggal" placeholder="Tanggal" required>
        <textarea name="deskripsi" placeholder="Deskripsi Program" required></textarea>
        <input type="file" name="foto" required>
        <button type="submit" name="submit">Add Program</button>
    </form>
</body>
</html>