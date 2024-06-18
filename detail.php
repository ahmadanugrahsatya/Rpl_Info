<?php
require 'includes/db.php';

// Mendapatkan ID dari query string
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Mengambil informasi berdasarkan ID
$info = $conn->query("SELECT * FROM info WHERE id = $id AND status = 'valid'")->fetch_assoc();

if (!$info) {
    // Jika tidak ada informasi yang ditemukan
    echo "Informasi tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Info</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <style>
        /* styles/style.css */

body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #89f7fe, #66a6ff);
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #007bff;
}

.info-media {
    text-align: center;
    margin-bottom: 20px;
}

.info-image {
    max-width: 100%;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}

p {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.btn-container {
    display: flex;
    justify-content: space-between;
}

.btn-primary, .btn-secondary {
    color: #fff;
    border-radius: 4px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

.footer {
    text-align: center;
    padding: 10px 0;
    background-color: #f1f1f1;
    border-top: 1px solid #e7e7e7;
    border-radius: 0 0 8px 8px;
}

.footer .text-muted {
    color: #6c757d;
}

    </style>
    <?php include 'includes/header.php'; ?>
    <div class="container">
        <h2><?php echo $info['title']; ?></h2>
        <div class="info-media">
            <?php if ($info['thumnail']) { ?>
                <img src="aset/<?= $info['thumnail']; ?>" class="info-image" alt="Info Image">
            <?php } ?>
        </div>
        <p><?php echo $info['content']; ?></p>
        <div class="btn-container">
            <a href="home.php" class="btn btn-primary">Back to Home</a>
            <a href="komentar.php?id=<?php echo $info['id']; ?>" class="btn btn-secondary">Comment</a>
        </div>
    </div>
</body>
</html>
