<?php
include 'db.php';

$berita_id = $_GET['berita_id'];

$query = "DELETE FROM berita WHERE id = '$berita_id'";
mysqli_query($conn, $query);

header('Location: index-admin.php');
?>