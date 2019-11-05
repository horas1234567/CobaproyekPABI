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
				<h2><i class="ico-list ico-white"></i>Pesanan</h2>
			</div>
		</div>	
	</div>


<div class="container">
             
	<div class="check">	 
		<div class="col-md-9 cart-items">
                    <ul class="back">
                	  <li><i class="back_arrow"> </i>Kembali ke <a href="index.php">Beranda</a></li>
                    </ul>
			 <h1>Daftar Pesanan</h1>
                        
                        <?php
                        $id_user = $_SESSION['id_users'];
                        $query = mysqli_query($koneksi, "select * from pemesanan where id_user = '$id_user'");
                        while($data = mysqli_fetch_array($query)){
                            $id_produk = $data['id_produk'];
                            $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                            while($p = mysqli_fetch_array($produk)){
                        ?>
			 <div class="cart-header">
                             <a onclick="if(confirm('Apakah anda yakin ingin menghapus pesanan ini ??')){ location.href='hapus_pesanan.php?id_produk=<?=$data['id_produk']?>&id_pemesanan=<?=$data['id_pemesanan']?>';}"><div class="close1"> </div></a>
                             <div class="cart-sec simpleCart_shelfItem">
                                           <div class="cart-item cyc">
                                                    <img src="admin/gambar/<?=$p['gambar']?>" class="img-responsive" alt="" style="height: 190px; width: 170px;"/>
						</div>
					   <div class="cart-item-info">
                                               <h3><a href="detailproduk.php?id=<?=$data['id_produk']?>"><h3><?=$p['nama']?></h3></a><span><h4><?=$p['keterangan']?></h4></span></h3>
						<ul class="qty">
							<li><h3>Jumlah : <?=$data['jumlah']?></h3></li>
                                                        <?php
                                    if($data['status'] == 'Belum Dikirim'){
                                        echo '<li>Belum Dikirim</li>';
                                    }else if($data['status'] == 'Telah Dikirim'){
                                        echo '<li>Telah Dikirim</li>';
                                    }
                                ?>
						</ul>
						<div class="delivery">
                                                    <h3><p> Rp. <?= number_format($data['total_harga'], 2, ",", ".")?></p></h3>
							 <div class="clearfix"></div>
                                                         
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>	
                     <?php
                        }
                        }
                     ?>
		 </div>
</div>
</div>

<?php
    include 'footer.php';
?>