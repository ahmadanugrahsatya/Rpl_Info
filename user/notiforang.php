<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] == 'user') {
    header('Location: ../login.php');
    exit();
}
require '../includes/db.php';

$user_id = $_SESSION['id'];

// Query untuk mendapatkan komentar yang ditujukan untuk informasi yang diunggah oleh pengguna yang sedang login
$notifications = $conn->query("
    SELECT k.info_id, k.isi 
    FROM komentar k
    JOIN info i ON k.info_id = i.id
    WHERE i.user_id = $user_id 
    ORDER BY k.id DESC
");
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
<?php include '../includes/header.php'; ?>
<div class="container">
    <h2>Notifikasi</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Info ID</th>
                <th>Komentar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($notification = $notifications->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $notification['info_id']; ?></td>
                    <td><?php echo $notification['isi']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>
