<?php

require "admin/koneksi.php";
if (isset($_POST["sign-up"])) {

    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $nomor_hp = $_POST["nomor_hp"];
    $alamat = $_POST["alamat"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $role = "user";

    $result = mysqli_query($conn, "SELECT username from users WHERE username = '$username'");



    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username telah digunakan'); location.href = 'sign-up'; </script>";
        return false;
    }

    if ($password != $password2) {
        echo "<script>alert('Password tidak sesuai'); location.href = 'sign-up';</script>";
        return false;
    }

    $password = password_hash("$password", PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (name, username, nomor_hp, alamat, password, role) value('$nama','$username','$nomor_hp','$alamat','$password','$role')");

    echo "<script>alert('Berhasil, silakan login!'); document.location.href='login'</script>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="css/main.css">
    <title>Sign-Up</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid container">
            <a class="navbar-brand" href="index">Fastcloth ID</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product</a>
                    </li>

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login">Login</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- Optional JavaScript; choose one of the two! -->


    <div class="container">
        <div class="row mt-5 justify-content-center">

            <div class="col-5">
                <h3>Selamat Bergabung dengan <strong>Fastcloth ID</strong>, Bikin baju gak harus ribet!</h3>
                <form class="mt-5" action="" method="POST">
                    <div class="mb-3">
                        <input type="nama" class="form-control" placeholder="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="nomor hp" name="nomor_hp" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="alamat" name="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <div id="password" class="form-text">Buat password</div>
                        <input type="password" class="form-control" placeholder="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="confirm password" name="password2" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="sign-up">Sign Up</button>
                </form>
                <a href="login">Sudah punya akun?</a>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>