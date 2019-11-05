<?php
	include 'koneksi.php';
	session_start();
	if (!isset($_SESSION['username'])) {
		echo "<script>alert('Anda harus login untuk memberikan komentar!'); window.location = 'login.php'</script>";
	}else{
	$id_users = $_SESSION['id_users'];
	$nama = $_SESSION['nama'];
	$id_produk= $_GET['id'];
	$komentar = $_POST['komentar'];
	$status = 'On Progress';
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	if (empty($komentar)) {
		echo "<script>alert('Komentarnya masih belum diisi $nama!'); window.location = 'detailproduk.php?id=". $id_produk ."'</script>";
	}else{

	$sql = mysqli_query($koneksi, "INSERT INTO komentar VALUES('', '$id_users', '$id_produk', '$komentar', '$tanggal', '$status')");
		if ($sql) {
			echo "<script>alert('Terimakasih telah memberikan testimoninya $nama, silahkan tunggu konfirmasi dari admin!'); window.location = 'detailproduk.php?id=". $id_produk ."'</script>";
		}else{
			echo "<script>alert('Gagal memberi testimoni $nama!'); window.location = 'detailproduk.php?id=". $id_produk ."'</script>";
		}
	}
}
?>