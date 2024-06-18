<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] == 'user') {
    header('Location: ../login.php');
    exit();
}
require '../includes/db.php';

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upload_dir = '../uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $thumnail = '';

        if (isset($_FILES['thumnail']) && $_FILES['thumnail']['error'] == 0) {
            $thumnail = basename($_FILES['thumnail']['name']);
            $thumnail_path = $upload_dir . $thumnail;
            move_uploaded_file($_FILES['thumnail']['tmp_name'], $thumnail_path);
        }

        $stmt = $conn->prepare("INSERT INTO info (title, content, thumnail, user_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $title, $content, $thumnail, $user_id);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $thumnail = '';

        if (isset($_FILES['thumnail']) && $_FILES['thumnail']['error'] == 0) {
            $thumnail = basename($_FILES['thumnail']['name']);
            $thumnail_path = $upload_dir . $thumnail;
            move_uploaded_file($_FILES['thumnail']['tmp_name'], $thumnail_path);
        } else {
            $stmt = $conn->prepare("SELECT thumnail FROM info WHERE id = ? AND user_id = ?");
            $stmt->bind_param("ii", $id, $user_id);
            $stmt->execute();
            $stmt->bind_result($thumnail);
            $stmt->fetch();
            $stmt->close();
        }

        $stmt = $conn->prepare("UPDATE info SET title = ?, content = ?, thumnail = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("sssii", $title, $content, $thumnail, $id, $user_id);
        $stmt->execute();

        if ($stmt->error) {
            echo "Gagal memperbarui data: " . $stmt->error;
        } else {
            echo "Data berhasil diperbarui.";
        }

        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $stmt = $conn->prepare("DELETE FROM info WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $user_id);
        $stmt->execute();

        if ($stmt->error) {
            echo "Gagal menghapus data: " . $stmt->error;
        } else {
            echo "Data berhasil dihapus.";
        }

        $stmt->close();
    }
}

$infos = $conn->query("SELECT * FROM info WHERE user_id = $user_id AND status = 'valid' ORDER BY id DESC");
$info2 = $conn->query("SELECT * FROM info WHERE user_id = $user_id AND status = 'Belum dikonfirmasi' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Info</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        .file-input-wrapper {
            position: relative;
            width: 100%;
            height: 40px;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 0.25rem;
            text-align: center;
            cursor: pointer;
            border: 1px solid #007bff;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .file-input-button:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .file-input-label {
            display: inline-block;
            vertical-align: middle;
            margin-left: 10px;
            font-weight: bold;
            color: #495057;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #FFFAF0;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 20px;
        }
        h2, h3 {
            color: #343a40;
        }
        .form-group label {
            font-weight: bold;
            color: #495057;
        }
        .form-control {
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
        }
        .btn-primary, .btn-danger, .btn-info {
            border-radius: 0.25rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #343a40;
            color: #fff;
        }
        .info-image {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: auto;
        }
    </style>
    <?php include '../includes/header.php'; ?>
    <div class="container">
        <h2>Kelola Info</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <br>
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <br>
                <label for="content">Konten</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div class="form-group">
                <br>
                <label for="thumnail">Gambar</label>
                <div class="file-input-wrapper">
                <div class="file-input-button">Pilih File</div>
                <input type="file" class="form-control" id="thumnail" name="thumnail">
                <span class="file-input-label" id="file-name">Tidak ada file yang dipilih</span>
            </div>
        </div>
            <br><br>
            <button type="submit" name="add" class="btn btn-primary">Tambah Info</button>
        </form>
        <br>
        <hr>
        <br>
        <h3>Daftar Info Yang Sedang Diproses</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($info = $info2->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $info['title']; ?></td>
                        <td><?php echo $info['content']; ?></td>
                        <td>
                            <?php if ($info['thumnail']) { ?>
                                <img src="../uploads/<?php echo $info['thumnail']; ?>" class="info-image" alt="Info Image">
                            <?php } ?>
                        </td>
                        <td>
                            <form method="POST" action="" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                                <button type="button" class="btn btn-info" onclick="editInfo(<?php echo htmlspecialchars(json_encode($info)); ?>)">Edit</button>
                            </form>
                            <form method="POST" action="" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table><br><br>
        <h3>Daftar Info</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($info = $infos->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $info['title']; ?></td>
                        <td><?php echo $info['content']; ?></td>
                        <td>
                            <?php if ($info['thumnail']) { ?>
                                <img src="../uploads/<?php echo $info['thumnail']; ?>" class="info-image" alt="Info Image">
                            <?php } ?>
                        </td>
                        <td>
                            <form method="POST" action="" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                                <button type="button" class="btn btn-info" onclick="editInfo(<?php echo htmlspecialchars(json_encode($info)); ?>)">Edit</button>
                            </form>
                            <form method="POST" action="" style="display: inline-block;">
                                <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
    function editInfo(info) {
        document.getElementById('thumnail').addEventListener('change', function() {
        var fileName = this.files[0] ? this.files[0].name : 'Tidak ada file yang dipilih';
        document.getElementById('file-name').textContent = fileName;});

        
        document.getElementById('title').value = info.title;
        document.getElementById('content').value = info.content;

        var form = document.forms[0];
        form.method = 'POST';
        form.action = '';
        var idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        idInput.value = info.id;
        form.appendChild(idInput);

        var editButton = document.createElement('button');
        editButton.type = 'submit';
        editButton.name = 'edit';
        editButton.className = 'btn btn-primary';
        editButton.textContent = 'Edit Info';
        form.appendChild(editButton);
    }
    </script>
</body>
</html>
