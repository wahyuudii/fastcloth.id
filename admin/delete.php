<?php

session_start();

require "koneksi.php";

if (!isset($_SESSION["login"])) {
    header("Location: ../index");
}

$id_user = $_GET["id_user"];
mysqli_query($conn, "DELETE FROM users WHERE id_user = '$id_user'");

echo "<script>alert('Data telah dihapus!'); document.location.href='customers'</script>";

return mysqli_affected_rows($conn);
