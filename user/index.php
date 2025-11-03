<?php
include '../admin/db.php'; // Koneksi ke database

// Initialize the query to select from berita table
$query = "SELECT * FROM berita";

// Check if a search term is provided
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query .= " WHERE name LIKE '%$search%'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DESA TALAPITI</title>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    
    <!-- feather icons-->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- style css -->
    <link rel="stylesheet" href="../css/index.css" />
</head>
<style>
    .hero {
  min-height: 120vh;
  display: flex;
  align-items: center;
  background-image: url("../img/foto.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  margin-top: -10px;
  background-position: center;
  position: relative;
  opacity: 1;
}

.features {
  text-align: center;
  padding: 50px 20px;
  background-color:hsl(170, 58.00%, 65.50%);
}

.features h2 {
  font-size: 24px;
  color: #333;
  margin-bottom: 20px;
}

.features h2 span {
  color: #ffd700; /* Warna biru untuk highlight */
  text-shadow: 1px 1px 3px rgb(19, 19, 18);
}

.feature-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 20px;
  justify-items: center;
  max-width: 1200px;
  margin: 0 auto;
}

.feature-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  padding: 20px;
  width: 100%;
  max-width: 180px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  text-align: center;
}

.feature-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.feature-item img {
  width: 80px;
  height: 80px;
  margin-bottom: 10px;
}

.feature-item p {
  font-size: 16px;
  color: #333;
  margin: 0;
}

.feature-item a {
  text-decoration: none;
  color: inherit;
}


    .news-container {
    display: flex;
    gap: 1.5rem;
    overflow: hidden;
    justify-content: center;
    align-items: stretch;
    padding: 1.5rem 0;
}

.news-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s;
}

.news-card p{
    color: black;
}

.news-card:hover {
    transform: translateY(-5px);
}

.news-card-img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.news-card-content {
    padding: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.news-card-title {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 0.5rem;
    text-align: center;
}

.news-card-date {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 0.75rem;
    margin-top: 10px;
}

.news-card-description {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 1rem;
}

.news-card-link {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
    text-align: center;
}

.news-card-link:hover {
    text-decoration: underline;
}

/* Centering the button within its container */
.button-container {
    text-align: center; /* Center-aligns contents inside this container */
    margin-top: 1rem; /* Adjust spacing above the button as needed */
}

.read-more-btn {
    display: inline-block; /* Ensures the button adjusts according to its content */
    padding: 0.3rem 0.8rem; /* Reduced padding for a shorter button */
    background-color: #ffd700;
    font-weight: 500;
    color: #000;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.8rem; /* Smaller font size */
    transition: background-color 0.3s;
}

.read-more-btn:hover {
    background-color: #0056b3;
}




  </style>
<body>
    <!-- Navbar Start -->
    <div class="navigasi">
        <nav class="navbar">
            <!-- Logo dan Judul -->
            <div class="navbar-logo-container">
                <img src="../img/mbozo.png" alt="Logo Kota Bima" title="Logo Kota Bima" class="navbar-logo-img">
                <div class="navbar-title">
                    <h3><a href="#" class="navbar-logo">Desa<span>Talapiti</span></a></h3>
                    <p class="navbar-subtitle">Kecamatan Ambalawi</p>
                    <p class="navbar-subtitle">Kabupaten Bima</p>
                    <p class="navbar-subtitle">Provinsi NTB</p>
                </div>
            </div>
    
            <!-- Hamburger Menu -->
            <div id="hamburger-menu" class="hamburger-menu">
                <i class="menu-icon"></i>
            </div>
    
            <!-- Navigasi -->
            <ul class="navbar-nav">
                <li><a class="navbar-link" href="#">Home</a></li>
                <li><a class="navbar-link" href="#about">Tentang</a></li>
                <li><a class="navbar-link" href="#berita">Berita</a></li>
                <li><a class="navbar-link" href="../admin/login-admin.php">Admin</a></li>
            </ul>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Selamat Datang Di Website Desa <span>Talapiti</span></h1>
            <h3>Anda bisa melihat beberapa informasi desa yang kami sediakan pada website ini</h3>
            <a href="detail.php" class="cta">Berita Terkini</a>
        </main>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <section id="about" class="about">
        <h2><span>Tentang Desa</span> Talapiti</h2>
        <p class="description">Desa Talapiti adalah sebuah desa yang terletak di wilayah yang subur dan kaya akan budaya. Dengan masyarakat yang ramah dan beragam, desa ini memiliki berbagai potensi alam dan sumber daya yang mendukung kehidupan sehari-hari. Desa Talapiti berkomitmen untuk mengembangkan infrastruktur dan pelayanan publik yang lebih baik demi kesejahteraan warganya.</p>
        <div class="row">
            <div class="about-img">
                <img src="../img/per.jpg" alt="Tentang Kami" width="600" height="500" />
            </div>
            <div class="content">
                <h3>Visi</h3>
<p>"Mewujudkan desa talapiti yang maju, mandiri, dan berbudaya, dengan mengedepankan partisipasi masyarakat untuk pembangunan yang berkelanjutan."</p>

<h3>Misi</h3>
<p>1. Meningkatkan kualitas hidup masyarakat melalui peningkatan infrastruktur, kesehatan, dan pendidikan.</p>

<p>2. Mengembangkan potensi ekonomi lokal melalui pertanian, pariwisata, dan industri kecil.</p>

<p>3. Mempromosikan kebudayaan dan kearifan lokal untuk mempertahankan identitas desa.</p>

<P>4. Meningkatkan kesadaran lingkungan dan mengembangkan praktik berkelanjutan.</P>

<p>5. Membangun tata kelola pemerintahan yang transparan, akuntabel, dan partisipatif.</p>
            </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Berita Section Start -->
    <section id="berita" class="menu">
    <h2><span>Berita</span> Terkini</h2>
    <p>Berikut adalah berita-berita terbaru seputar Desa Talapiti :</p>

    <div class="news-container">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="news-card">
            <img src="../img/menu/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="news-card-img">
            <div class="news-card-content">
                <h3 class="news-card-title"><?php echo htmlspecialchars($row['name']); ?></h3>
                <p class="news-card-date">Tanggal: <?php echo date("d-m-Y", strtotime($row['tanggal'])); ?></p>
                </p>
                <a href="lihat_berita.php?berita_id=<?php echo $row['id']; ?>" class="news-card-link">Lihat Berita</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <div class="button-container">
    <a href="detail.php" class="read-more-btn">Berita Terkini</a>
</div>

</section>


    <!-- Berita Section End -->

    <!-- Features Section Start -->
    <section id="features" class="features">
        <h2><span>Informasi</span> Lanjutan</h2>
        <div class="feature-grid">
            <div class="feature-item">
                <a href="info_penduduk.php"><img src="../img/diagram.jpeg" alt="Data Wilayah" /></a>
                <p>Informasi Penduduk</p>
            </div>
            <div class="feature-item">
                <a href="program.php"><img src="../img/kerja.jpg" alt="Lapak Desa" /></a>
                <p>Program Desa</p>
            </div>
            <div class="feature-item">
                <a href="struktur.php"><img src="../img/kerja.jpg" alt="Golongan Darah" /></a>
                <p>Struktur Organisasi</p>
            </div>
            <div class="feature-item">
                <a href="peta.php"><img src="../img/map.jpeg" alt="Pembangunan" /></a>
                <p>Peta Desa Talapiti</p>
            </div>
            <div class="feature-item">
                <a href="penghargaan.php"><img src="../img/peta.png" alt="Pembangunan" /></a>
                <p>Penghargaan</p>
            </div>
        </div>
    </section>
    <!-- Features Section End -->

    <!-- Footer Start -->
    <footer>
        <div class="socials">
            <a href="https://www.instagram.com/kyy2ez/?hl=en"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
            <a href="https://wa.me/qr/MOLWMNOP7DXZM1"><i data-feather="phone"></i></a>
        </div>
        <div class="credit">
            <p>Created By <a href="#">Fakultas Teknik & Ilmu Komputer UM BIMA</a> | &copy; 2024</p>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- Custom JavaScript -->
    <script src="js/script.js"></script>
</body>
</html>
