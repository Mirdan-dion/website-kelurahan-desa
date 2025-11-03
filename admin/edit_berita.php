<?php
include 'db.php';

$berita_id = $_GET['berita_id'];

$query = "SELECT * FROM berita WHERE id = '$berita_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

?>

<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .container {
    width: 80%;
    margin: 40px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 10px;
  }

  .form-group input[type="text"], .form-group input[type="date"], .form-group input[type="file"] {
    width: 100%;
    height: 40px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
  }

  .form-group input[type="submit"] {
    width: 100%;
    height: 40px;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .form-group input[type="submit"]:hover {
    background-color: #3e8e41;
  }
</style>

<div class="container">
  <form action="update_berita.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="berita_id" value="<?php echo $row['id']; ?>">
    <label for="name">Nama Berita:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">
    <br>
    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" value="<?php echo $row['tanggal']; ?>">
    <br>
    <label for="image">Gambar:</label>
    <input type="file" name="image">
    <br>
    <input type="submit" value="Simpan Perubahan">
  </form>
</div>