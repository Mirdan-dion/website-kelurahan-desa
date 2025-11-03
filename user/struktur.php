<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Organisasi Kelurahan</title>
    <style>
        :root {
            --primary1: #000000;
            --primary: #006ba8;
            --secondary: #f39c12;
            --bg: #f9f9f9;
            --text-dark: #333;
            --text-light: white;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Arial", sans-serif;
        }

        body {
            background-image: url('../img/ltr.jpg');
            background-color: var(--bg);
            padding: 20px;
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.4rem 7%;
            background-color: rgb(1, 1, 1, 0.8);
            border-bottom: 1px solid #513c28;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        }

        .navbar-nav {
            display: flex; /* Ensure it uses flexbox */
            gap: 2rem; /* Space between links */
        }

        .hidden {
            display: none; /* Hide menu */
        }

        .navbar .navbar-logo {
            text-decoration: none;
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            font-style: italic;
        }

        .navbar .navbar-logo span {
            color: #ffd700;
        }

        .navbar .navbar-nav a {
            text-decoration: none;
            color: #fff;
            display: inline-block;
            font-size: 1.2rem;
            margin: 0 1rem;
            transition: color 0.3s; /* Smooth color transition */
        }

        .navbar .navbar-nav a:hover {
            color: var(--primary);
        }

        .navbar .navbar-nav a::after {
            content: "";
            display: block;
            padding-bottom: 0.5rem;
            border-bottom: 0.1rem solid var(--primary);
            transform: scaleX(0);
            transition: 0.2s linear;
        }

        .navbar .navbar-nav a:hover::after {
            transform: scaleX(0.5);
        }

        .navbar .navbar-extra a {
            color: #fff;
            margin: 0 0.5rem;
        }

        .navbar .navbar-extra a:hover {
            color: var(--primary);
        }

        h1 {
            font-size: 20px;
            color: var(--primary);
            margin-bottom: 30px;
            text-align: center;
            padding: 55px;
            margin-top: 40px;
        }

        .organization-chart {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1200px;
            width: 100%;
        }

        .level {
            display: flex;
            flex-wrap: wrap; /* Allow multiple rows */
            justify-content: center;
            margin-bottom: 20px;
            gap: 15px; /* Adjust the space between the positions */
        }
        .position {
            background-color: white;
            border: 2px solid var(--primary1);
            border-radius: 8px;
            padding: 10px 15px;
            text-align: center;
            min-width: 180px;
            max-width: 220px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          
        }

        .position h3 {
            color: var(--primary);
            font-size: 16px;
            margin-bottom: 8px;
        }

        .position p {
            font-size: 14px;
            color: var(--text-dark);
        }

        .line {
            width: 100%;
            height: 2px;
            background-color: var(--primary);
            position: relative;
            margin: -10px 0 20px 0;
        }
        .line .level h3 {
            color: var(--primary);
            margin-bottom: 30px;
            text-align: center;
            padding: 60px;
        }

        .photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid var(--secondary);
            margin-bottom: 8px;
        }

        @media (max-width: 768px) {
            .level {
                flex-direction: column;
                align-items: center;
            }

            .line {
                display: none;
            }

            .position {
                flex: 1 1 calc(50% - 15px); /* For smaller screens, show 2 items per row */
            }
        }
    </style>
</head>
<body>
<nav class="navbar">
        <a href="index-admin.php#" class="navbar-logo">Desa<span>Talapiti</span></a>
        <div class="navbar-nav">
            <a href="index-admin.php#">Home</a>
            <a href="index-admin.php#about">Tentang</a>
            <a href="index-admin.php#berita">Berita</a>
        </div>
    </nav>

    <h1>Struktur Organisasi Desa Talapiti</h1>
    <div class="organization-chart">
        <!-- Level 1 -->
        <div class="level">
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="Kepala Desa">
                <h3>Kepala Desa </h3>
                <p>Herman Abdara, S.Pd</p>
                <p>NIAP:-</p>
            </div>
        </div>
        <!-- Level 2 -->
        <div class="level">
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="Sekretaris">
                <h3>Sekretaris</h3>
                <p>Syah Iran, A.Ma</p>
                <p>NIP:19761216 200604 1 016</p>
            </div>

        </div>
        <!-- Level 2 -->
        <div class="level">
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="Kasi pemerintahan">
                <h3>Kabid Aset dan Umum</h3>
                <p>Feriansyah</p>
                <p>NIP:19820310 200701 1 007</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="Kasi ekonomi">
                <h3>Kabid Umum dan Keuangan</h3>
                <p>Hamdan</p>
                <p>NIP:19770725 200604 1 021</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="Kasi pembangunan">
                <h3>Kabid Perencanaan dan Pelaporan</h3>
                <p>Iwan Setiawan, S.Pd</p>
                <p>NIP:19830502 200901 1 013</p>
            </div>
        </div>
        <!-- Level 3 -->
        <div class="level">
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="RW 01">
                <h3>Kasi Pembangunan</h3>
                <p>M.Yasin</p>
                <p>--</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="RW 02">
                <h3>Kasi Pemerintahan</h3>
                <p>Rahmat Riyadi</p>
                <p>--</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="RW 03">
                <h3>Kasi Pembinaan Kemasyarakatan</h3>
                <p>M.Alwan Wijaya</p>
                <p>--</p>
            </div>
        </div>
        <!-- Level 4 -->
        <div class="level">
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="RW 03">
                <h3>Kadus Nggaro Nangga</h3>
                <p>Indratno</p>
                <p>--</p>
                
            </div>
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="RW 03">
                <h3>Kadus Tolowata</h3>
                <p>Amrun</p>
                <p>--</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="RW 03">
                <h3>Kadus Tala Na'e</h3>
                <p>Maman Husen</p>
                <p>--</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="RW 03">
                <h3>Kadus Tala Rasabou</h3>
                <p>Israudin, S.Pd</p>
                <p>--</p>
            </div>
            <div class="position">
                <img class="photo" src="../img/fkd.jpg" alt="RW 03">
                <h3>Kadus Talaboka</h3>
                <p>Mahmud Bakar</p>
                <p>--</p>
            </div>
        </div>
            
    </div>
</body>
</html>