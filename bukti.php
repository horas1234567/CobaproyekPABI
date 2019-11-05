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
            <h2><i class="ico-usd ico-white"></i>Bukti Pembayaran</h2>
        </div>
    </div>	
</div>		

<div id="wrapper">
		<div class="container">
            <div class="table-responsive">
	            <div class="title"><h3>Form Bukti Pembayaran</h3></div>
	        	<div class="hero-unit">Silahkan Transfer kerekening ini 123-456-789 Bank BNI a/n Darwin Siahaan</div>
	           	<div class="hero-unit">Silahkan mengupload bukti pembayaran sesuai dengan total belanja Anda! </div>
	        </div>

    <?php
        $_SESSION['total_harga'] = $_POST['total_harga'];
        $_SESSION['id_produk'] = $_POST['id_produk'];
        $_SESSION['jumlah'] = $_POST['jumlah'];
        $_SESSION['alamat'] = $_POST['alamat'];
        $_SESSION['nohp'] = $_POST['nohp'];
    ?>

<form id="formku" action="selesai.php" method="POST" enctype="multipart/form-data">
	<table class="table table-condensed">
	<tr>
	        			<td>Bukti Pembayaran</td>
	        			<td>:</td> 
	        			<td><input type="file" name="bukti"></td>
	</tr>
	<tr>
	      <td><a href="index.php" class="btn btn-sm btn-primary">Kembali</a>&nbsp;<input type="submit" value="Pesan Sekarang" name="finish"  class="btn btn-sm btn-primary" style="margin-right:-30px;"></td>
	</tr>
		</table>
	</form>
</div>
</div>






<?php
	include 'footer.php';
?>