<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa - Aplikasi Pembayaran SPP.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="text-center">LOGIN SISWA</h4>
                <div class="card">
                    <div class="card-header">
                        <img src="img/logo-spp.png" width="100%">
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-grup mb-2">
                                <label>NISN</label>
                                <input type="number" name="nisn" class="form-control" placeholder="Masukkan NISN anda.." require><br>
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password anda.." require><br> 
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-primary mb-3">Login</button>
                            </div>
                            <a href="login-petugas.php"> Login Sebagai Administrator / Petugas </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>