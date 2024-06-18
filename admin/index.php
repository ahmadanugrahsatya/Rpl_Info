<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        #halaman-pembuka {
            padding-top: 80px;
        }


        .fw-bold {
            font-weight: 600;
        }

        h2, h1 {
            margin-bottom: 1rem;
        }

        h2 {
            font-size: 2rem;
            color: #333;
        }

        h1 {
            font-size: 3rem;
            color: #ff6f61;
        }

        p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .carousel-indicators button {
            background-color: #ff6f61;
            border: none;
            border-radius: 50%;
            width: 10px;
            height: 10px;
            margin: 0 5px;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            border-radius: 15px;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: #ff6f61;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            padding: 5px;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .footer .container span {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <?php include '../includes/header2.php'; ?>
    <div id="halaman-pembuka">
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="my-5">
                        <h2 class="fw-bold">Selamat Datang di Admin Panel</h2>
                        <h1 class="display-1 fw-bold">RPL INFO</h1>
                        <p>Admin memiliki kemampuan untuk membuat, membaca, memperbarui, dan menghapus informasi, memungkinkan pengelolaan penuh atas data yang ada di sistem. Selain itu, admin dapat mengatur notifikasi untuk informasi baru atau perubahan pada informasi yang ada, yang bisa dikirim ke user untuk memastikan mereka tetap update. Admin juga dapat menghapus informasi yang dibuat oleh user, memberikan kontrol penuh atas konten yang tersedia di sistem.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner rounded-3">
                            <div class="carousel-item active">
                                <img src="../aset/admin2.png" class="d-block" alt="..." height="350px">
                            </div>
                            <div class="carousel-item">
                                <img src="../aset/notifikasi_admin.png" class="d-block" alt="..." height="350px">
                            </div>
                            <div class="carousel-item">
                                <img src="../aset/delete_user_admin.png" class="d-block w-100" alt="..." height="350px">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span>RPL Info &copy; 2024</span>
        </div>
    </footer>
</body>
</html>
