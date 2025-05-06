<?php
session_start();

if (!$_SESSION["is_login"] === TRUE) {
    header("location: login.php");
    exit;
}

include 'connection.php';
// menyimpan data id kedalam variabel
$inv   = $_GET['inv'];
// query SQL untuk insert data
$query="DELETE Identity,Barang FROM Identity INNER JOIN Barang 
ON Identity.Invoice=Barang.Invoice WHERE Identity.Invoice='$inv'";

mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:list.php");
?>
