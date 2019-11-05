<?php
	ob_start();
	include 'header.php';
	if(!isset($_SESSION['masuk'])){
		echo "<script>alert('Silahkan Login terlebih dahulu untuk melakukan pemesanan')</script>";
    header("location: login.php");
}

$id_produk = $_GET['id_produk'];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
$data = mysqli_fetch_array($query);
$stock = $_GET['jumlah'];
if (!isset($_SESSION['masuk'])) {
    echo "<script>alert('Anda harus login untuk memesan produk ini!'); window.location = 'login.php'</script>";
} elseif ($stock > $data['qty']) {
    echo "<script>alert('Jumlah melebihi stock!'); window.location = 'keranjang.php?kd=$id_produk'</script>";
} elseif (!isset($_GET['total_harga'])) {
    echo "<script>alert('Anda belum memilih produk!'); window.location = 'produk.php'</script>";
} else {
    $id_user = $_SESSION['id_users'];
}	
?>


<style>
	.hero-unit {
	background: #fff url(img/bg-k10.png);
	border-left: 4px solid brown;
	padding: 13px 13px 13px 15px;
	font-style: italic;
	margin: 20px auto;
	-webkit-border-radius: 0px;
     -moz-border-radius: 0px;
          border-radius: 0px;
	font-size: 14px !important;
}
</style>

	<div id="page-title">
		<div id="page-title-inner">
			<div class="container">
				<h2><i class="ico-notes-2 ico-white"></i>Pembayaran</h2>
			</div>
		</div>	
	</div>
<?php
	if(isset($_SESSION['masuk'])){
		$id_user = $_SESSION['id_users'];
	}
	$user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'") or die(mysqli_error($koneksi));
	$p = mysqli_fetch_array($user);
?>
<div id="wrapper">
    <div class="container">
        <div class="table-responsive">
            <div class="title"><h3>Form Checkout</h3></div>
            <div class="hero-unit">Harap isi form ini sesuai dengan tujuan pengiriman</div>
            <div class="hero-unit">Total Belanja Anda Rp. <?php echo number_format($_GET['total_harga']); ?>,00</div> 
            <form id="formku" action="bukti.php" method="POST" enctype="multipart/form-data">
                <table class="table table-condensed">
                    <input type="hidden" name="total_harga" value="<?php echo abs((int) $_GET['total_harga']); ?>">
                    <input type="hidden" name="id_produk" value="<?php echo $_GET['id_produk'] ?>">
                    <input type="hidden" name="jumlah" value="<?php echo $_GET['jumlah'] ?>">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $_SESSION['nama'] ?> </td>  
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?= $p['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><textarea type="text" name="alamat" placeholder="Masukkan Alamat Anda" style="width: 300px; height: 100px"></textarea></td>
                    </tr>
                    <tr>
                        <td>Nomor Telepon</td>
                        <td>:</td>
                        <td><input type="text" name="nohp" placeholder="Masukkan Nomor Telepon" style="width: 240px;"></td>
                    </tr>
                    <tr>
                        <td><a href="index.php" class="btn btn-sm btn-primary">Kembali</a>&nbsp;<input type="submit" value="Pesan Sekarang" name="finish"  class="btn btn-sm btn-primary"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>	
</div>		

<?php
	include 'footer.php';
?>