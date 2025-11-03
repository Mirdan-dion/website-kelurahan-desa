<?php
include '../admin/db.php'; // Koneksi ke database

// Ambil data program dari database
$query = "SELECT * FROM program";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Desa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/index.css">
    <style>
        :root {
            --primary: #006ba8;
            --bg: #010101;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000; /* Latar belakang hitam */
            color: #fff; /* Teks putih */
            margin: 0;
            padding: 20px;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.4rem 7%;
            background-color: rgba(1, 1, 1, 0.8);
            border-bottom: 1px solid #513c28;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        }
        .navbar-logo {
            font-size: 30px;
            font-weight: 700;
            color: #fff;
            font-style: italic;
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            gap: 2rem;
        }

        .navbar-nav a {
            color: #fff;
            font-size: 1.5rem;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar-nav a:hover {
            color:#020202;
            background-color: #ffd700;
            border-radius: 2px;
        }
        
        .menu {
            margin-top: 40px;
    
        }
        
        .menu h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5rem;
            color: #ffd700;
            
        }

        .menu p {
            text-align: center;
            margin-bottom: 30px;
            color: black;
            margin-top: 20px;
        }

        .program-container {
            background-image: url('../img/');
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .program-card {
            background-color: #fff; /* Kartu program */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(230, 210, 210, 0.1);
            width: 300px;
            transition: transform 0.3s;
        }
        .program-card:hover {
            transform: translateY(-5px);
        }
        .program-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .program-card-content {
            padding: 1rem;
        }
        .program-card-title {
            font-size: 1.2rem;
            color: #333; /* Mengatur warna judul menjadi putih */
            margin-bottom: 0.5rem;
            text-align: justify;
        }
        .program-card-date {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 0.75rem;
        }
        .program-card-link {
            color:rgb(0, 174, 255);
            text-decoration: none;
            font-weight: bold;
        }
        .program-card-link:hover {
            color: #007bff;
            text-decoration: underline;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
        .copyright {
            font-size: 14px;
            color: #ccc;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="index.php" class="navbar-logo">Desa<span>Talapiti</span></a>
        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="index.php#about">Tentang</a>
            <a href="index.php#berita">Berita</a>
        </div>
    </nav>

    <section id="program" class="menu">
        <h2><span>Program</span> Desa</h2>
        <p>Berikut adalah program-program yang sedang berjalan di Desa Talapiti:</p>

        <div class="program-container">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="program-card">
                <img src="../img/menu/<?php echo htmlspecialchars($row['foto']); ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>">
                <div class="program-card-content">
                    <h3 class="program-card-title"><?php echo htmlspecialchars($row['judul']); ?></h3>
                    <p class="program-card-date">Tanggal: <?php echo date("d-m-Y", strtotime($row['tanggal'])); ?></p>
                    <a href="program_detail.php?program_id=<?php echo $row['id']; ?>" class="program-card-link">Lihat Detail</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <footer>
        <p class="copyright">&copy; 2024 Desa Talapiti. All rights reserved.</p>
    </footer>

</body>
</html>