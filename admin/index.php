<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Barlow&display=swap');

        body {
            font-family: 'Barlow', sans-serif;
        }

        a:hover {
            text-decoration: none;
        }

        .border-left {
            border-left: 2px solid var(--primary) !important;
        }


        .sidebar {
            top: 0;
            left: 0;
            z-index: 100;
            overflow-y: auto;
        }

        .overlay {
            background-color: rgb(0 0 0 / 45%);
            z-index: 99;
        }

        /* sidebar for small screens */
        @media screen and (max-width: 767px) {

            .sidebar {
                max-width: 18rem;
                transform: translateX(-100%);
                transition: transform 0.4s ease-out;
            }

            .sidebar.active {
                transform: translateX(0);
            }

        }
    </style>

    <!-- overlay -->
    <div id="sidebar-overlay" class="overlay w-100 vh-100 position-fixed d-none"></div>

    <!-- sidebar -->
    <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
        <h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
        <div class="list-group rounded-0">
            <a href="index.php?page=beranda" class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
                <span class="bi bi-border-all"></span>
                <span class="ml-2">Dashboard</span>
            </a>
            <a href="index.php?page=daftar_pesan" class="list-group-item list-group-item-action border-0 align-items-center">
                <span class="bi bi-box"></span>
                <span class="ml-2">Daftar pesanan</span>
            </a>

            <button class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center" data-toggle="collapse" data-target="#sale-collapse">
                <div>
                    <span class="bi bi-cart-dash"></span>
                    <span class="ml-2">Customer</span>
                </div>
                <span class="bi bi-chevron-down small"></span>
            </button>
            <div class="collapse" id="sale-collapse" data-parent="#sidebar">
                <div class="list-group">
                    <a href="index.php?page=chatcs" class="list-group-item list-group-item-action border-0 pl-5">Keluhan customer</a>
                </div>
            </div>

            <a href="logout.php" class="list-group-item list-group-item-action border-0 d-flex justify-content-between align-items-center">
                <div>
                    <span class="bi bi-box-arrow-right"></span>
                    <span class="ml-2">Logout</span>
                </div>
            </a>

        </div>
    </div>

    <!-- Main content -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Admin Pariwisata</h1>
            <i class="fas fa-user-cog fa-2x"></i>
        </div>

        <div class="content">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                switch ($page) {
                    case 'beranda':
                        include 'dashboard.php';
                        break;
                    case 'daftar_pesan':
                        include 'data-pesan/daftar_pesan.php';
                        break;
                    case 'editpesan':
                        include 'edit.php';
                        break;

                    case 'logout':
                        include 'logout.php';
                        break;

                    case 'chatcs':
                        include 'chatcs.php';
                        break;

                    default:
                        echo "<h2 class='text-danger'>404 Page Not Found</h2>";
                        break;
                }
            } else {
                echo "<h2>Welcome to the Dashboard!</h2>";
            }
            ?>
        </div>
    </main>


    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>