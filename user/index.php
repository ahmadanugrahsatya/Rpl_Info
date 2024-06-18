<?php
session_start();
    if (!isset($_SESSION['id']) || $_SESSION['role'] == 'user') {
    header('Location: ../login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel User</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body>* {
    font-family: 'Poppins';
}

body {
    background-color: #FFE4C4;
}

#halaman-pembuka {
    padding-top: 80px;
}

.margin{
    margin-top: 85px;
}
.container2{
    background-color: #A9A9A9;
}
span{
    font-size: 30px;
    margin-left: 100px; 
}
.lorem{
    margin-left: 100px;
}
</style>
<br><br>
        <div class="container-fluid mb-5 k1">


            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="my-5">
                        <h2 class="fw-bold text-dark">Selamat Datang di Website</h2>
                        <h1 class="display-1 fw-bold text-danger">RPL INFO</h1>
                        <p>User dapat membuat, membaca, memperbarui, dan menghapus informasi mereka sendiri, memberikan kebebasan untuk mengelola konten secara mandiri. Selain itu, user akan menerima notifikasi ketika ada komentar baru pada informasi mereka, membantu user tetap terhubung dengan interaksi yang terjadi pada konten mereka.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner rounded-3 margin">
                            <div class="carousel-item active">
                                <img src="../aset/crud_info_user2.png"
                                    class="d-block" alt="..." height="350px" width="790px">
                            </div>
                            <div class="carousel-item">
                                <img src="../aset/notifikasi_user.png"
                                    class="d-block" alt="..." height="100px" width="700px">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <footer class="footer mt-auto py-3 container2">
    <div class="container">
        <span class="text-muted">RPL Info &copy; 2024</span>    
    </div>
</footer>
</body>
</html>
    