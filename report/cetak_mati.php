<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['id_mendu'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT</title>
</head>

<body>
<center>
	<table>
	<tr>
	<td rowspan="2">
		<img src="gambar.png" style="margin-right: -100px; margin-bottom: -20px;width: 90px;height: 100px; top: 80px"></td>
	<td>
		<center>
		<br>
		<br>
		<font size="5">PEMERINTAH KABUPATEN PATI</font><br>
		<font size= "4"><b>KECAMATAN WEDARIJAKSA</b></font><br>
		<font size= "3">DESA SUWADUK</font>
		<p align="right">
			Kode Pos 59152
		_____________________________________________________________________________________</p>
		</center>
	</td>
	</tr>
		<?php
			$sql_tampil = "select m.id_mendu, m.tgl_mendu, m.sebab, p.nik, p.nama from tb_mendu m inner join tb_pdd p on 
			m.id_pdd=p.id_pend
			where id_mendu ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</table>
	</center>

	<center>
		<h4>
			<u>SURAT KETARANGAN KEMATIAN</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_mendu']; ?>/Ket.Kematian/
			<?php echo $tanggal; ?>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Kepala Desa Suwaduk Kecamatan Wedarijaksa Kabupaten Pati, dengan ini menerangkan
		bahawa :</P>
	<table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
				<td>Tanggal Kematian</td>
				<td>:</td>
				<td>
					<?php echo $data['tgl_mendu']; ?>
				</td>
			</tr>
			<tr>
				<td>Sebab</td>
				<td>:</td>
				<td>
					<?php echo $data['sebab']; ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<p>Benar-benar telah
		<b>Meninggal Dunia</b>, pada waktu yang telah disebutkan diatas.</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right">
		Suwaduk,
		<?php echo $tgl; ?>
		<br> KEPALA DESA SUWADUK
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(JUREMI)
	</p>


	<script>
		window.print();
	</script>

</body>

</html>