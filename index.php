<?php

include 'db.php';
$query = "SELECT * FROM berita";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query .= "WHERE name LIKE '%$search%'";
}
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelurahan Talapiti</title>
</head>
<body>
   <section id="berita" class="berita">
    <h2><span>Berita</span>Terkini</h2>
    <p>Berikut adalah berita-berita terbaru seputar kelurahan talapiti :</p>

    <div class="new-container">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="new-card">
                <img src="img/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>"class="news-card-img">
                <div class="news-card-content">
                    <h3 class="news-card-title"><?php echo htmlspecialchars ($row['name']); ?></h3>
                    <p class="news-card-date">Tanggal : <?php echo date("d-m-Y", strtotime($row['tanggal'])); ?></p>
                    <a href="lihat_berita.php?berita_id=<?php echo $row['id']; ?>" class="news-card-link">Lihat Berita</a>
                </div>
            </div>
            <?php endwhile; ?>
    </div>
   </section>
</body>
</html>