<?php
	include 'koneksi.php';
    include 'header.php';
?>


  <ul class="tp-hd-lft wow fadeInDown animated" data-wow-delay="0.5s">
<div class="slider-wrapper">
	<p style="color: green; font-size: 60px; margin-bottom:-20px;  margin-left: 200px; font-family: Comic Sans MS;" >SELAMAT DATANG DI TOBA LAKE</p>

	<div id="da-slider" class="da-slider" style="background: url();
	border-top: 8px solid chocolate;
	border-bottom: 8px solid chocolate;
	padding-top: 20px;">
	 <div class="col-md-12">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>   
      </ol>
 
      <!-- deklarasi carousel -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img  style="width: 100%" src="img/logo2.png" alt="gambar">
          <div class="carousel-caption">
          
          </div>
        </div>
        <div class="item">
          <img style="width: 100%" src="img/logo2.png" alt="gambar">
          <div class="carousel-caption">
           
          </div>
        </div>
        <div class="item">
          <img style="width: 100%" src="img/logo2.png" alt="gambar">
          <div class="carousel-caption">
          </div>
        </div>        
      </div>
      <!-- membuat panah next dan previous -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

<!--menu pada index-->
  <ul class="tp-hd-lft wow fadeInDown animated" data-wow-delay="0.5s">
			<div class="" ="content_top">
				<h3 class="future" style="font-family: 'Sofia';font-size: 22px;">PRODUK BARU</h3><br>
				<div class="container">
					<div class="box_1">
					<div class="">
						<?php
	$produk = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang LIMIT 6");
	while($p = mysqli_fetch_array($produk)){
?>
<div class="grids_of_4">
<div class="col-md-4">
				<div class="col-md 7">
				<div class="content_box"><a href="detailproduk.php?id=<?=$p['id_produk']?>">
			   	  <div class="view view-fifth">
			   	   	<img src="<?php echo 'admin/gambar/'.$p['gambar']; ?>" width="200" height="200"/>
			   	   	  	<div class="mask1">
	                        <div class="info"> </div>
			            </div>
				   </div>
				   	  </a>
				    <h5 style="margin-left: -20px;"><a href="detailproduk.php?id=<?=$p['id_produk']?>"> <?= $p['nama']?></a></h5>
				     <div class="size_1">
				     	<span class="item_price">Rp. <?= number_format($p['harga'])?>,-</span>
		      		    <div class="clearfix"></div>
		      		  </div>
			     </div>
			</div><br>
				</div>
					</div>
				<?php }?>
				</div>
	</div>
</div>
</ul>
</div>

<div class="container" style=" padding-left: 971px;"">
  <ul class="pager">
    <li><a href="produk.php" class="a" style="background: #4CAF50;">Lihat produk lainnya»</a></li>
  </ul>
</div>
<?php
    include 'footer.php';
?>
<style type="text/css">
	.a{	
		color: #ffff;

	}
</style>

