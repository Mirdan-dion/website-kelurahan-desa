<?php
include '../admin/db.php'; // Koneksi ke database

$result = $conn->query("SELECT * FROM penghargaan ORDER BY tahun DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghargaan Kelurahan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/index.css">
    <style>
        /* Global Styles */
        :root {
            --primary: #006ba8;
            --bg: #010101;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 70px;
            background-color: #f3f4f6;
            color: #333;
            line-height: 1.6;
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
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            font-style: italic;
            text-decoration: none;
        }

        .navbar-logo span {
            color: #ffd700;
        }

        .navbar-nav {
            display: flex;
            gap: 2rem;
        }

        .navbar-nav a {
            color: #fff;
            font-size: 1.2rem;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar-nav a:hover {
            color: var(--primary);
        }
        .container {
            margin-top: 10px;
            max-width: 900px;
            margin: 70px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #007b3d;
            margin-bottom: 30px;
        }

        /* Penghargaan Cards */
        .penghargaan {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 15px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: box-shadow 0.3s ease;
        }
        .penghargaan:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .penghargaan img {
            max-width: 200px;
            height: auto;
            border-radius: 6px;
            margin-right: 15px;
            object-fit: cover;
        }
        .penghargaan h3 {
            margin: 0;
            font-size: 1.2em;
            color: #007b3d;
        }
        .penghargaan p {
            margin: 10px 0 0;
            font-size: 0.95em;
            color: #555;
        }

        /* Navbar Start */
.navigasi {
  background-color: rgb(1, 1, 1, 0.8);
  border-bottom: 1px solid #513c28;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  width: 100%;
  z-index: 1000;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
}

.navbar-logo-container {
  display: flex;
  align-items: center;
  gap: 10px; /* Jarak antara logo dan teks */
}

.navbar-logo-img {
  width: 50px;
  height: 50px;
  object-fit: contain;
  border-radius: 5px; /* Logo bulat */
}

.navbar-text-container {
  display: flex;
  flex-direction: column;
}

.navbar-logo {
  font-size: 24px;
  color: #fff;
  text-decoration: none;
}

.navbar-logo span {
  color: #ffd700;
}

.navbar-subtitle {
  font-size: 14px;
  color: #fff;
  margin-top: -5px;
}

.navbar-nav {
  display: flex;
  list-style: none;
  gap: 20px;
  transition: all 0.3s ease-in-out;
}

.navbar-nav.active {
  display: block;
  position: absolute;
  top: 70px;
  right: 20px;
  background-color: #004d40;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.navbar-link {
  color: #fff;
  text-decoration: none;
  padding: 10px 15px;
  transition: all 0.3s ease;
}

.navbar-link:hover {
  background-color:#e5fc1b;
  color: #000;
  border-radius: 4px;
}

/* Hamburger Menu */
.hamburger-menu {
  display: none;
  cursor: pointer;
}

.hamburger-menu .menu-icon {
  width: 20px;
  height: 5px;
  background-color: #fff;
  position: relative;
  transition: all 0.3s ease;
}

.hamburger-menu .menu-icon::before,
.hamburger-menu .menu-icon::after {
  content: "";
  position: absolute;
  width: 25px;
  height: 5px;
  background-color: #fff;
  transition: all 0.3s ease;
}

.hamburger-menu .menu-icon::before {
  top: -8px; /* Baris atas */
  right: 90%;
}

.hamburger-menu .menu-icon::after {
  top: 8px; /* Baris bawah */
  right: 90%;
}

/* Active Hamburger Animation */
.hamburger-menu.active .menu-icon {
  background-color: transparent;
}

.hamburger-menu.active .menu-icon::before {
  transform: rotate(45deg) translate(5px, 5px);
}

.hamburger-menu.active .menu-icon::after {
  transform: rotate(-45deg) translate(5px, -5px);
}
/* Navbar End */
/* hero section *

        /* Responsive Design */
        @media (max-width: 768px) {
            .penghargaan {
                flex-direction: column;
                align-items: center;
            }
            .penghargaan img {
                max-width: 100%;
                margin-bottom: 15px;
            }
            .penghargaan h3 {
                text-align: center;
            }
            .penghargaan p {
                text-align: justify;
            }
        }
    </style>
</head>
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
            </ul>
        </nav>
    </div>
    <!-- Navbar End -->
    <div class="container">
        <h1>Penghargaan Kelurahan</h1>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="penghargaan">
                <?php if ($row['foto']): ?>
                    <img src="../img/menu/<?= $row['foto']; ?>" alt="Foto Penghargaan">
                <?php else: ?>
                    <img src="../img/menu/default.png" alt="Foto Default Penghargaan">
                <?php endif; ?>
                <div>
                    <h3><?= $row['nama_penghargaan']; ?> (<?= $row['tahun']; ?>)</h3>
                    <p><?= nl2br($row['deskripsi']); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
