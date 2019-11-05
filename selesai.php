<?php
	include 'header.php';
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
				<h2><i class="ico-usd ico-white"></i>Akhir Checkout</h2>
			</div>
		</div>	
	</div>

<div id="wrapper">
	<div class="container">
		<div class="table-responsive">
		<div class="title"><h3>Checkout Selesai</h3>
			<div class="hero-unit">Terima kasih Anda sudah berbelanja di Toko Online kami dan berikut ini adalah data yang perlu anda catat.</div>
			<div class="hero-unit">
    <?php
			if($_POST['finish']){
				$id_user = $_SESSION['id_users'];
				$id_produk = $_SESSION['id_produk'];
				$nama = $_SESSION['nama'];
                                $query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
                                $produk = mysqli_query($koneksi, $query);
                                $p= mysqli_fetch_array($produk);
                                $nama_produk = $p['nama'];
				$alamat = $_SESSION['alamat'];
				$nohp = $_SESSION['nohp'];
				$jumlah = $_SESSION['jumlah'];
				$total = $_SESSION['total_harga'];
				$bukti = 'pembayaran/'.$nama_produk.'.jpg';

				if ($_FILES['bukti']['name']) {
					move_uploaded_file($_FILES['bukti']['tmp_name'], 'pembayaran/'.$nama_produk.'.jpg');
					$bukti = 'pembayaran/'.$nama_produk.'.jpg';
				}
                                if (!$bukti) {
					echo "<script>alert('Bukti pembayaran belum diupload $nama!'); window.location = 'bukti.php'</script>";
				}
				date_default_timezone_set('Asia/Jakarta');
				$tanggal = date('Y-m-d');
				$sql  = mysqli_query($koneksi, "INSERT INTO pemesanan VALUES('', '$id_user', '$id_produk', '$jumlah', '$total', '$bukti', '$tanggal', 'Belum Dikirim')") or die(mysqli_error($koneksi));
				$prod = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
				$user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
				$user_id = mysqli_fetch_assoc($user);
				$data = mysqli_fetch_array($prod);
				$qty = $data['qty'];
				$stock = ($qty - $jumlah);
				$q_stock= mysqli_query($koneksi, "UPDATE produk set qty='$stock' where id_produk='$id_produk'");
				if (!$sql) {
					echo 'Gagal Checkout!';
            	}else{
            		echo 'Total biaya untuk pembelian Produk adalah Rp. '.$total.',- dan biaya bisa di kirimkan melalui Rekening Bank BNI cabang Balige dengan nomor rekening 123-234-56347-8 atas nama Pak Diva Ulos.<br>';
					echo 'Dan barang akan kami kirim ke alamat di bawah ini:<br><br>';
					echo 'Nama Lengkap : '.$_SESSION['nama'].'<br>';
					echo 'Email&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : '.$user_id['email'].'<br>';
					echo 'Alamat&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : '.$alamat.'<br>';
	                echo 'No Telepon&nbsp&nbsp&nbsp&nbsp : '.$nohp.'<br>';
	                echo 'Total Belanja&nbsp : Rp. '.number_format($total).',-<br>';
                        unset($_SESSION['items']);
                        unset($_SESSION['$id_produk']);
                        unset($_SESSION['alamat']);
                        unset($_SESSION['nohp']);
                        unset($_SESSION['total_harga']);
                        unset($_SESSION['jumlah']);
            	}
			}else{
				header("Location: index.php");
			}
			?>
            </div>
		</div>
	</div>
        </div>
        </div>
<?php
	include 'footer.php';
?>