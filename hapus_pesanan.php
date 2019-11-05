<?php

	include 'koneksi.php';
	$id_pemesanan = $_GET['id_pemesanan'];
	$id_produk = $_GET['id_produk'];
	$pemesanan = mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pemesanan = '$id_pemesanan' AND id_produk = '$id_produk'");
	header("Location: pesanan.php");
?>