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
        <table class="table table-responsive">
            <thead>
                <tr class="text-center">
                    <th scope="col">no</th>
                    <th scope="col">nama</th>
                    <th scope="col">nomor Hp</th>
                    <th scope="col">status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($users as $row) { ?>
                    <tr class="text-center">
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["nomor_hp"] ?></td>
                        <td><?= $row["role"] ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">edit</a>
                            <a href="delete?id_user=<?= $row['id_user'] ?>" onclick="return confirm('yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<?php include "footer.php" ?>