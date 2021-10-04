<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../index");
} elseif ($_SESSION["role"] != "admin") {
    echo "<script> alert('kamu login bukan sebagai Admin'); window.location.href='../index'</script>";
}

require "koneksi.php";

$users = mysqli_query($conn, "SELECT *FROM users");

$result = mysqli_fetch_assoc($users);

?>






<?php include "navbar.php"; ?>
<!-- Optional JavaScript; choose one of the two! -->

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h4>Selamat datang di Dashboard Admin</h4>
    </div>
</main>

<?php include "footer.php" ?>