<?php
	include 'koneksi.php';
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$nohp = $_POST['nohp'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = 2;
		$konpass = $_POST['konfirmpass'];
		if(empty($nama) || empty($password) || empty($konpass))
		{
			echo "<script>alert('Data yang diisi belum lengkap'); window.location = 'register.php'</script>";
		}
		else
		{
			if($password == $konpass){
				$query = mysqli_query($koneksi, "SELECT * FROM user WHERE nama='$nama'");
				$hasil = mysqli_num_rows($query);
				if($hasil == NULL){
					mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nama', '$alamat', '$email', '$nohp', '$username', '$password', '$role')");
				echo "<script>alert('Daftar Berhasil $nama, Silahkan login'); window.location = 'login.php'</script>";
				}
				else
				{
				echo "<script>alert('Nama pengguna sudah terdaftar!'); window.location = 'register.php'</script>";
				}
			}
			else{
				echo "<script>alert('Password tidak sama!'); window.location = 'register.php'</script>";			
			}
		}
?>