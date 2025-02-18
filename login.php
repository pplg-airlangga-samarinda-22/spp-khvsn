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
</head>

<body>
    <h2>Login Petugas</h2>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <select name="level" id="level">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>