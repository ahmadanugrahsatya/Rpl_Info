<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] == 'user') {
    header('Location: ../login.php');
    exit();
}
require '../includes/db.php';

$user_id = $_SESSION['id'];
$notifications = $conn->query("SELECT user_id, title FROM info ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #FFFAF0;
    margin: 0;
    padding: 0;
}

.container {
    margin-top: 20px;
}

h2 {
    color: #343a40;
}

.table {
    margin-top: 20px;
}

.table th, .table td {
    vertical-align: middle;
    text-align: center;
}

.table th {
    background-color: #343a40;
    color: #fff;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}
    </style>
    <?php include '../includes/header2.php'; ?>
    <div class="container">
        <h2>Notifikasi</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID users</th>
                    <th>Judul info</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($notification = $notifications->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $notification['user_id']; ?></td>
                        <td><?php echo $notification['title']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
