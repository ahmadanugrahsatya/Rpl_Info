<?php
require 'includes/db.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 3;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$infos = $conn->query("SELECT * FROM info WHERE status = 'valid' ORDER BY id DESC LIMIT $start, $perPage");
$total = $conn->query("SELECT * FROM info WHERE status = 'valid'")->num_rows;
$pages = ceil($total / $perPage);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <style>
        body{
            background-color: #F0F8FF;
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding: 10px;
            list-style: none;
        }

        .pagination a {
            color: #007bff;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #dee2e6;
            margin: 0 4px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a:hover {
            background-color: #f8f9fa;
            color: #0056b3;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .info {
            position: relative;
            padding: 20px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
            font-size: 20px;
        }

        .info:hover {
            transform: scale(1.1);
            z-index: 10;
        }


        .tulisan {
            color: black;
            text-decoration: none;
            font-size: 20px;
            border-radius: 20px;
        }
        .info-image{
            width: 500px;
            
        }
    </style>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2>Info Terbaru</h2>
        <?php while ($info = $infos->fetch_assoc()) { ?>
            <div class="info">
                <h3><?php echo $info['title']; ?></h3>
                <div class="info-media">
                    <?php if ($info['thumnail']) { ?>
                        <img src="aset/<?= $info['thumnail']; ?>" class="info-image" alt="Info Image">
                    <?php } ?>
                </div>
                <p><?php echo $info['content']; ?></p>
                <a href="detail.php?id=<?= $info['id']; ?>" class="tulisan">Read More</a>
            </div>
        <?php } ?>
        <?php
        // Pagination setup
    $limit = 5; // Number of news items per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
 // Pagination controls
    $result = mysqli_query( $conn = new mysqli($servername, $username, $password, $dbname) ,"SELECT COUNT(*) AS total FROM info");
    $total_data = mysqli_fetch_array($result)['total'];
    $total_pages = ceil($total_data / $limit);
    ?>

    <div class="pagination">
        <?php if($page > 1): ?>
            <a href="?page=1">First</a>
            <a href="?page=<?= $page - 1; ?>">&laquo; Previous</a>
        <?php endif; ?>

        <?php for($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i; ?>" class="<?= $i == $page ? 'active' : ''; ?>"><?= $i; ?></a>
        <?php endfor; ?>

        <?php if($page < $total_pages): ?>
            <a href="?page=<?= $page + 1; ?>">Next &raquo;</a>
            <a href="?page=<?= $total_pages; ?>">Last</a>
        <?php endif; ?>
    </div>
    </div>
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">RPL Info &copy; 2024</span>
            <br>
        </div>
    </footer>
</body>
</html>
                