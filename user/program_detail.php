<?php
include '../admin/db.php'; // Koneksi ke database

// Dapatkan ID program dari URL
$program_id = isset($_GET['program_id']) ? intval($_GET['program_id']) : 0;

// Ambil detail program berdasarkan ID
$query = "SELECT * FROM program WHERE id = $program_id";
$result = mysqli_query($conn, $query);
$program = mysqli_fetch_assoc($result);

if (!$program) {
    echo "Program tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Program - <?php echo htmlspecialchars($program['judul']); ?></title>
    <link rel="stylesheet" href="../css/index.css">
    <style>
        .detail-section { width: 80%; margin: 20px auto; text-align: center; }
        .detail-section img { max-width: 100%; border-radius: 8px; }
        .detail-content { text-align: left; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .detail-title { font-size: 1.8em; color: #333; margin-bottom: 10px; }
        .detail-date { color: #666; font-size: 0.9em; margin-bottom: 15px; }
        .detail-description { color: #444; line-height: 1.6; }
        .back-link { display: inline-block; margin-top: 20px; color: #006ba8; text-decoration: none; font-weight: bold; }
        .back-link:hover { color: #004e76; }

 body {
    font-family: 'Poppins', sans-serif;
    background-color: #333;
    margin: 0;
    padding: 0;
    padding-left: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
        }
        .detail-section {
            width: 50%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .detail-content {
            display: flex; /* Menggunakan Flexbox untuk tata letak */
            flex-direction: column; /* Mengatur arah kolom */
            align-items: center; /* Menyelaraskan item di tengah secara horizontal */
            padding: 20px;
            background-color: #FFF; /* Latar belakang konten */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .detail-content img {
            max-width: 85%; /* Lebar maksimum gambar */
            border-radius: 10px;
            margin-bottom: 25px; /* Jarak antara gambar dan deskripsi */
            transition: transform 0.3s ease;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .detail-content img:hover{
            transform: scale(1.05);
        }
    
        .detail-title {
            font-size: 2rem;
            color: #333333;
            margin: 10px 0;
            font-weight: 700;;
        }
        .detail-date {
            color: #888888;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }
        .detail-description {
            font-size: 1rem;
            color: #444444;
            text-align: justify;
        }
        .back-link {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #006ba8;
            color: #ffffff;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .back-link:hover {
            background-color: #005480;
            color: #f0f0f0;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="detail-section">
        <h1 class="detail-title"><?php echo htmlspecialchars($program['judul']); ?></h1>
        <p class="detail-date">Tanggal: <?php echo date("d-m-Y", strtotime($program['tanggal'])); ?></p>
        <div class="detail-content">
            <img src="../img/menu/<?php echo htmlspecialchars($program['foto']); ?>" alt="<?php echo htmlspecialchars($program['judul']); ?>">
            <p class="detail-description"><?php echo nl2br(htmlspecialchars($program['deskripsi'])); ?></p>
        </div>
        <a href="program.php" class="back-link">Kembali ke Program Desa</a>
    </div>

    <script src="../js/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>
</html>

<?php
mysqli_close($conn); // Tutup koneksi database
?>