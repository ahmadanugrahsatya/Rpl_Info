<style>
    .container1 {
        background-color: #696969;
        color: white; /* Menggunakan color untuk mengatur warna teks */
    }
</style>
<nav class="navbar navbar-expand-lg container1">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">RPL Info</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="row w-100">
                <div class="col-8">
                    <ul class="navbar-nav">
                        <?php if (isset($_SESSION['id'])) { ?>
                            <?php if ($_SESSION['role'] != 'admin') { ?>
                                <?php $currentPage = basename($_SERVER['SCRIPT_NAME']); ?>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo ($currentPage == 'crud_info.php') ? 'active' : ''; ?>" aria-current="page" href="../user/crud_info.php">Manage Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo ($currentPage == 'notifications.php') ? 'active' : ''; ?>" href="../user/notifications.php">History Komentar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo ($currentPage == 'notiforang.php') ? 'active' : ''; ?>" href="../user/notiforang.php">Notifications</a>
                                    </li>
                                </ul>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-4 d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <?php if (isset($_SESSION['id'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php">Logout</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link {
        color: inherit;
    }
</style>