<?php
   require_once('header.php');
?>

<style>
</style>

<div id="page-title">
    <div id="page-title-inner">
        <div class="container">
            <h2><i class="ico-shopping-cart ico-white"></i>Keranjang</h2>
        </div>
    </div>	
</div>

  <ul class="tp-hd-lft wow fadeInDown animated" data-wow-delay="0.5s">
<div class="container">
	<div class="check">	 
		<div class="col-md-9 cart-items">
                    <ul class="back">
                	  <li style="font-size: 16px; margin-left: -13px;"><i class="back_arrow"> </i>Pesan lagi di <a href="produk.php">Halaman Produk</a></li>
                    </ul>
			 <h1>Keranjang Belanja</h1>
                        
                        <?php
                $total = 0;
                if (isset($_SESSION['items'])) {
                    foreach ($_SESSION['items'] as $key => $val) {
                        $query = mysqli_query($koneksi, "select * from produk where id_produk = '$key'");
                        $data = mysqli_fetch_array($query);
                        $jumlah_harga = $data['harga'] * $val;
                        $total += $jumlah_harga;
                        $produk = $data['id_produk'];
                        $jumlah = $val;
                        if (isset($_SESSION['username'])) {
                            $id_users = $_SESSION['id_users'];
                            $nama = $_SESSION['nama'];
                        }
                        ?>
			 <div class="cart-header">
                             <a onclick="if(confirm('Apakah anda yakin ingin menghapus pesanan ini ??')){ location.href='cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php';}"><div class="close1"> </div></a>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
                                                    <img src="admin/gambar/<?=$data['gambar']?>" class="img-responsive" alt="" style="height: 190px; width: 170px;"/>
						</div>
					   <div class="cart-item-info">
                                               <h3><a href="detailproduk.php?id=<?=$data['id_produk']?>"><h3><?=$data['nama']?></h3></a><span><h4><?=$data['keterangan']?></h4></span></h3>
						<ul class="qty">
							<li><h3>Jumlah : <?=$jumlah?></h3></li>
                                                        <li><a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" class='btn btn-danger'>Kurang</a></li>
                                                        <li><a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=keranjang.php" class='btn btn-success'>Tambah</a></li>
						</ul>
						<div class="delivery">
                                                    <h3><p> Rp. <?= number_format($jumlah_harga, 2, ",", ".")?></p></h3>
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
		 <div class="col-md-3 cart-total">
				 <div class="price-details" style="font-size: 20px;">
				 <h3>Detail Harga</h3>
				 <span>Total</span>
                                 <span class="total1">Rp. <?= number_format($total, 2, ",", ".")?></span>
				 <span>Diskon</span>
				 <span class="total1">---</span>
				 <span>Ongkos Kirim</span>
				 <span class="total1">---</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4 style="font-size: 15px;">TOTAL</h4></li>	
                           <li class="last_price"><span style="font-size: 15px;">Rp. <?= number_format($total, 2, ",", ".")?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 <div class="clearfix"></div>
		 <a class="continue" href="pembayaran.php?total_harga=<?=$total?>&jumlah=<?=$jumlah?>&id_produk=<?=$produk?>">Continue</a>
			</div>
	 </div>
</div>

<?php
	include 'footer.php';
?>