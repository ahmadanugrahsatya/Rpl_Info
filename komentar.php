<?php
session_start();
include "includes/db.php";

// Memastikan pengguna sudah login
if (!isset($_SESSION['id'])) {
    echo "<script>alert('Anda harus login terlebih dahulu jika ingin komentar!'); window.location.href='login.php'</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $info_id = isset($_GET["id"]) ? $_GET["id"] : null;
    if ($info_id === null) {
         // Handle error, misalnya redirect ke halaman lain
         var_dump($info_id);
         exit();
     }
    
    $user_id = $_SESSION['id']; // Mengambil user_id dari sesi
    $isi = $_POST["isi"];

    // Simpan komentar ke database dengan prepared statement
    $sql = "INSERT INTO komentar (info_id, user_id, isi) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $info_id, $user_id, $isi);
    $query = $stmt->execute();

    if ($query) {
        echo "<script>
            alert('Tambah data Berhasil');
            window.location.href='user/notifications.php';
        </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        .ukuran {
            font-size: 20px;
        }

        .margin {
            margin-top: 200px;
        }
    </style>
    <div class="container margin">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="">
                            <input type="hidden" name="info_id" value="<?php echo isset($_GET['info_id']) ? $_GET['info_id'] : ''; ?>">
                            <div class="mb-3">
                                <b>
                                    <label for="isi" class="form-label ukuran">Komentar:</label>
                                </b>
                                <textarea name="isi" id="isi" class="form-control" rows="4"><?php echo isset($isi) ? $isi : ''; ?></textarea>
                                <?php if (isset($error_message)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_message; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success btn-block">Kirim Komentar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
