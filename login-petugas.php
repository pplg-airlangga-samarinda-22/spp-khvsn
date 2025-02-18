<?php
session_start();
require 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = 'SELECT id_petugas, nama_petugas, password FROM petugas WHERE username = ? AND level = ?';
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ss", $username, $_POST['level']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION['id_petugas'] = $row['id_petugas'];
        $_SESSION['nama_petugas'] = $row['nama_petugas'];
        $_SESSION['level'] = $_POST['level'];

        header('Location: index.php');
        exit();
    } else {
        echo 'Username atau password salah';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="text-center">LOGIN PETUGAS</h4>
                <div class="card">
                    <div class="card-header">
                        <img src="img/logo-spp.png" width="100%">
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group mb-2">
                                <label for="username">Username: </label>
                                <input type="text" id="username" name="username" class="form-control" required>
                                <br>
                                <label for="password">Password: </label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                <br>
                                <!-- <label for="password">Se:</label> -->
                                <select name="level" id="level" class="form-control ">
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                <br>
                                <button type="submit" value="login" class="btn btn-primary mb-3">Login</button><br>
                                  
                                <a href="login.php"> Login Sebagai Siswa/Siswi </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>