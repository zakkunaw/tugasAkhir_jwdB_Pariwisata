<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            height: 500px;
            object-fit: cover;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 15px;
            border-radius: 5px;
        }

        .carousel-caption h5 {
            color: white;
        }

        .carousel-caption p {
            color: white;
            text-align: justify;
        }

        .search-container {
            position: relative;
            margin-bottom: 30px;
        }

        .search-container input {
            width: calc(100% - 100px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-container button {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            background-color: #007bff;
            border: none;
            padding: 0 20px;
            color: white;
            border-radius: 0 5px 5px 0;
        }

        .card {
            margin-bottom: 30px;
        }

        .youtube-video {
            width: 100%;
            margin-bottom: 30px;
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            margin-top: 30px;
        }

        footer .footer-text {
            text-align: center;
            color: #6c757d;
        }

        .video-title {
            margin-bottom: 20px;
        }
    </style>
    <script>
        function selectDestination(price) {
            localStorage.setItem('selectedPrice', price);
            window.location.href = 'form_pesan.php';
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="asset/wisataku.png" alt="Logo Wisata" width="80">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="hasil_pesan.php">Hasil Pesanan</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php" style="background-color: crimson; border-radius: 10%;">Admin</a>
                </li>
            </ul>
        </div>
    </nav>



    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="asset/carousel1.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pantai Kuta Bandung</h5>
                    <p>Selain keindahan alamnya, Pantai Kuta menawarkan berbagai fasilitas wisata seperti bar, restoran, hotel, dan toko-toko kelontong1. Akses ke pantai ini sangat mudah, hanya sekitar 10 menit dari Bandara Internasional Ngurah Rai1.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/carousel2.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pantai Derawan Kalimantan Timur</h5>
                    <p>Pantai ini terkenal dengan keindahan bawah lautnya, termasuk terumbu karang dan berbagai jenis ikan. Pulau Derawan juga dikenal sebagai tempat untuk berenang dengan ubur-ubur tak beracun3.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/carousel3.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Air Terjun Tumpak Sewu, Jawa Timur</h5>
                    <p>Sering disebut sebagai “Niagara-nya Indonesia,” air terjun ini memiliki ketinggian sekitar 120 meter dan menawarkan pemandangan yang spektakuler1.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Search Feature -->
    <div class="container mt-5">
        <div class="search-container">
            <input type="text" placeholder="Cari destinasi...">
            <button>Cari</button>
        </div>

        <!-- YouTube Embed and Destinasi Wisata Cards -->
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <img src="asset/card1.jpg" class="card-img-top" alt="Destinasi 1">
                            <div class="card-body">
                                <h5 class="card-title">Destinasi 1</h5>
                                <p class="card-text">Deskripsi singkat tentang destinasi 1.</p>
                                <button class="btn btn-primary" onclick="selectDestination()">Pilih</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <img src="asset/card2.jpg" class="card-img-top" alt="Destinasi 2">
                            <div class="card-body">
                                <h5 class="card-title">Destinasi 2</h5>
                                <p class="card-text">Deskripsi singkat tentang destinasi 2.</p>
                                <button class="btn btn-primary" onclick="selectDestination()">Pilih</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <img src="asset/card3.jpg" class="card-img-top" alt="Destinasi 3">
                            <div class="card-body">
                                <h5 class="card-title">Destinasi 3</h5>
                                <p class="card-text">Deskripsi singkat tentang destinasi 3.</p>

                                <button class="btn btn-primary" onclick="selectDestination()">Pilih</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <img src="asset/card4.jpg" class="card-img-top" alt="Destinasi 4">
                            <div class="card-body">
                                <h5 class="card-title">Destinasi 4</h5>
                                <p class="card-text">Deskripsi singkat tentang destinasi 4.</p>
                                <button class="btn btn-primary" onclick="selectDestination()">Pilih</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- YouTube Video -->
            <div class="col-lg-4">
                <h5 class="video-title">Video Destinasi</h5>
                <div class="youtube-video embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/iM4Gf9XkfKY?si=-HYG5zEd9Lu0zTKL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>Wisata is a leading travel agency that offers exclusive tours and vacation packages to exotic destinations around the world.</p>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p>Email: info@wisata.com</p>
                    <p>Phone: +62 123 456 789</p>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <p>
                        <a href="#">Facebook</a><br>
                        <a href="#">Instagram</a><br>
                        <a href="#">Twitter</a>
                    </p>
                </div>
            </div>
            <div class="footer-text mt-4">
                &copy; JWD B - MUHAMMAD DZAKY KURNIAWAN
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>