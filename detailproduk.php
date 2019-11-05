<?php
    include 'header.php';
    $id_produk = $_GET['id'];
    $produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'") or die(mysqli_error($koneksi));
    $p = mysqli_fetch_array($produk);
?>
<div class="single_top">
	 <div class="container">
         <div class="single_grid">
             <ul class="back">
                	  <li style="font-size: 16px; margin-left: -13px;"><i class="back_arrow"> </i>Kembali ke <a href="index.php">Beranda</a></li>
                    </ul>
             <div class="grid images_3_of_2">
                 <img src="admin/gambar/<?=$p['gambar']?>" width="300" height="270"/>
                 
						 <div class="clearfix"></div>
				  </div> 
				<div class="desc1 span_1_of_3">
                    <h1><?php echo $p['nama']?></h1>
                    <p><?=$p['keterangan']?></p>
                     <form action="cart.php?act=add&amp;barang_id=<?php echo $p['id_produk'];?>&amp;ref=keranjang.php?kd=<?php echo $p['id_produk'];?>" method="POST">
                     <div class="simpleCart_shelfItem">
                        <div class="price_single">
                                            <div class="head"><h3>Rp. <?= number_format($p['harga'])?>,-</h3></div>
                           <div class="clearfix"></div>
                         </div>
                             <table class="table">
                            <tr>
                                <td width="40">Jumlah</td>
                                <td><input type="number" name="jumlah" class="form-control input-sm" min="1" max="<?php echo $data['qty']; ?>" style="width: 100px;" value="1"></td>
                            </tr>
                        </table>
                          <div class="size_2-right" ><input type="submit" value="Tambahkan ke Keranjang"/></div>
                      
                     </div>
                     </form>
                </div>
                <div class="clearfix"></div>
               </div>
              </div>
</div>


<!--           	  	Baru,masukkan disini komentar nya -->
<div class="container" style="margin-right: 195px;">
<div class="col-md-9 contact_left">
    <form action="komen_proses.php?id=<?=$id_produk?>" method="post">
					<div class="column_3">
	                   <textarea value="Message" style="font-size: 20px;" name="komentar" placeholder="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Masukkan komentar anda tentang produk ini';}">Masukkan komentar anda tentang produk ini</textarea>
	                </div>
	                <div class="form-submit1">
			          <input type="submit" value="Kirim">
					</div>
					<div class="clearfix"> </div>
				  </form>
</div>
<div class="col-md-3 contact_right">
    <div class="clearfix"></div>
</div>
    <div class="col-md-6 box_4">
        <?php
            $komen = mysqli_query($koneksi, "SELECT * FROM komentar  WHERE id_produk = '$id_produk' ORDER BY id_komentar DESC") or die(mysqli_error($koneksi));
            while($k = mysqli_fetch_array($komen)){
                $id_user = $k['id_user'];
        ?>
        
                    <?php
                        $user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id_user'");
                        while($u = mysqli_fetch_array($user)){
                    ?>
			<h4><?=$u['nama']?>&nbsp;|&nbsp;<?=$k['tanggal']?></h4>
                        <p><?= $k['isi']?></p>
                        <div class="clearfix"></div>
                        <?php
                        }
                        ?>
                        <div class="clearfix"></div>
        <?php
            }
        ?>
    </div>
</div>
<?php
    include 'footer.php';
?>
