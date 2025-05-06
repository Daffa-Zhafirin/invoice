<?php
session_start();

if (!$_SESSION["is_login"] === TRUE) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="public/graindashboard/css/print.css">
<link rel="stylesheet" type="text/css" media="print" href="css/printOut.css">
<head>
	<meta charset="utf-8">
	<title>Sam One Cargo Malang - Print AWB</title>
</head>
<body>


<?php
    if(isset($_GET['inv'])){
        $inv    =$_GET['inv'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "connection.php";
    $query    =mysqli_query($koneksi, "SELECT * FROM Identity WHERE Invoice='$inv'");
    $result    =mysqli_fetch_array($query);

	$query2   =mysqli_query($koneksi, "SELECT * FROM Barang WHERE Invoice='$inv'");
    $result2    =mysqli_fetch_array($query2);

	$JumlahTBerat    =mysqli_query($koneksi, "SELECT SUM(TotalBerat) AS Besar FROM Barang WHERE Invoice='$inv'");
	$data1    =mysqli_fetch_array($JumlahTBerat);
	$NilaiBerat = $data1['Besar'];

	$Totalharga=$NilaiBerat*$result['HargaKilo']+$result['HargaPacking']+$result['SMU'];

	$JumlahInv=mysqli_query($koneksi,"SELECT Invoice, COUNT(Invoice) AS jumlahInv FROM Barang WHERE Invoice='$inv'");
	$dataInv=mysqli_fetch_array($JumlahInv);
	$JumlahTInv=$dataInv['jumlahInv'];
?>


<b>
	<div class="wrapper">
		<div class="section1">

			<div class="baris1">
				<div class="logo"><img src="https://www.socmalang.com/wp-content/uploads/2021/08/2.png">
				</div>
			</div>

			<div class="baris-kota">
				<div style="width: 50%;text-align: center;">
				<label>ASAL</label> : <b>MLG</b>
				</div>
				<div style="width: 50%;text-align: center;">
				<label>TUJUAN</label> : <?php echo $result['KodeTujuan']?>
				</div>
			</div>


			<div class="baris2">
				<div class="baris2-kolom1">
				<label>AWB</label>
				<p><?php echo $result['Invoice']?></p>
				</div>
				<div class="baris2-kolom2">
				<label>JUMLAH</label>
				<p><?php echo $JumlahTInv?> Koli</p>
				</div>
				<div class="baris2-kolom3">
				<label>BERAT</label>
                <p>
					<?php 
						if($NilaiBerat == 0){
							echo "-";
						}else{
							echo "$NilaiBerat Kg";
						}
					?>
				</p>
				</div>
				<div class="baris2-kolom4" style="border-right: 1px solid;">
				<label>VOLUME</label>
				<p>
				<?php 
					$HitungVolume=mysqli_query($koneksi,"SELECT Panjang,Lebar,Tinggi,Volume AS TotalVolume FROM Barang WHERE Invoice='$inv'");
					while($row = mysqli_fetch_array($HitungVolume)){
						if($row[3] == 0){
							echo "-";
						}else
							echo "$row[0]/$row[1]/$row[2]=$row[3]";
							echo "<br />";
						 }
				?>
				</p>
				</div>
			</div>

			<div class="baris3">
				<div class="baris3-kolom1">
					<label>From :</label><br><br>
						<?php echo $result['NamaPengirim']?><br>
						<?php echo $result['HpPengirim']?><br>
						<?php echo 'Malang'?><br>	
				</div>				
				<div class="baris3-kolom2">
					<label>To :</label><br><br>
						<?php echo $result['NamaPenerima']?><br>
						<?php echo $result['HpPenerima']?><br>
						<?php echo $result['Alamat']?><br>
				</div>
			</div>

			<div class="barist" style="display: flex;">
				<div class="barist-kolom1" style="width: 50%; border: 1px solid; border-top: none; border-right: none; padding: 10px;">
					<?php echo $result['Armada']?>
				</div>				
				<div class="barist-kolom2" style="width: 50%; border: 1px solid; border-top: none; padding: 10px;">
					<label>Barang : </label> <?php echo $result['IsiBarang']?>
				</div>
			</div>

			<div class="baris4">
				<div class="baris4-kolom1">
					<label>SMU	: <?php echo number_format($result['SMU'], 0, ',', '.') ?></label><br>
					<label>Packing	: <?php echo number_format($result['HargaPacking'], 0, ',', '.')?></label><br>
					<label>Harga / Kg 	: <?php echo number_format($result['HargaKilo'], 0, ',', '.') ?></label><br>
					<label style="border: none">Total Harga	: <?php echo number_format($Totalharga, 0, ',', '.') ?></label><br>
				</div>

				<div class="baris4-kolom2">
					<img src="https://www.socmalang.com/wp-content/uploads/2021/08/qr-code.svg">
				</div>				
			</div>

			<div class="baris-ttd">
				<div class="ttd" style="border-left: 1px solid;">
					<label>TTD Pengirim</label>
				</div>				
				<div class="ttd">
					<label>PICK UP</label>
					<p><?php echo $result['tanggal']?></p>
				</div>
				<div class="ttd">
					<label>TTD Penerima</label>
				</div>
			</div>

			<div class="baris5">
				<div class="baris5-kolom1">
					<img src="https://www.socmalang.com/wp-content/uploads/2021/07/Banner-Home-Page-2.png">
				</div>				
			</div>
		</div>


		<div class="cut" style="height: auto; border: 2px dashed;"></div>


		<div class="section2">

			<div class="baris1">
				<div class="logo"><img src="https://www.socmalang.com/wp-content/uploads/2021/08/2.png">
				</div>
			</div>

			<div class="baris-kota">
				<div style="width: 50%;text-align: center;">
				<label>ASAL</label> : <b>MLG</b>
				</div>
				<div style="width: 50%;text-align: center;">
				<label>TUJUAN</label> : <?php echo $result['KodeTujuan']?>
				</div>
			</div>


			<div class="baris2">
				<div class="baris2-kolom1">
				<label>AWB</label>
				<p><?php echo $result['Invoice']?></p>
				</div>
				<div class="baris2-kolom2">
				<label>JUMLAH</label>
				<p><?php echo $JumlahTInv?> Koli</p>
				</div>
				<div class="baris2-kolom3">
				<label>BERAT</label>
                <p>
					<?php 
						if($NilaiBerat == 0){
							echo "-";
						}else{
							echo "$NilaiBerat Kg";
						}
					?>
				</p>
				</div>
				<div class="baris2-kolom4" style="border-right: 1px solid;">
				<label>VOLUME</label>
				<p>
				<?php 
					$HitungVolume=mysqli_query($koneksi,"SELECT Panjang,Lebar,Tinggi,Volume AS TotalVolume FROM Barang WHERE Invoice='$inv'");
					while($row = mysqli_fetch_array($HitungVolume)){
						if($row[3] == 0){
							echo "-";
						}else
							echo "$row[0]/$row[1]/$row[2]=$row[3]";
							echo "<br />";
						 }
				?>
				</p>
				</div>
			</div>

			<div class="baris3">
				<div class="baris3-kolom1">
					<label>From :</label><br><br>
						<?php echo $result['NamaPengirim']?><br>
						<?php echo $result['HpPengirim']?><br>
						<?php echo 'Malang'?><br>	
				</div>				
				<div class="baris3-kolom2">
					<label>To :</label><br><br>
						<?php echo $result['NamaPenerima']?><br>
						<?php echo $result['HpPenerima']?><br>
						<?php echo $result['Alamat']?><br>
				</div>
			</div>

			<div class="barist" style="display: flex;">
				<div class="barist-kolom1" style="width: 50%; border: 1px solid; border-top: none; border-right: none; padding: 10px;">
					<?php echo $result['Armada']?>
				</div>				
				<div class="barist-kolom2" style="width: 50%; border: 1px solid; border-top: none; padding: 10px;">
					<label>Barang : </label> <?php echo $result['IsiBarang']?>
				</div>
			</div>

			<div class="baris4">
				<div class="baris4-kolom1">
					<label>SMU	: <?php echo number_format($result['SMU'], 0, ',', '.') ?></label><br>
					<label>Packing	: <?php echo number_format($result['HargaPacking'], 0, ',', '.')?></label><br>
					<label>Harga / Kg 	: <?php echo number_format($result['HargaKilo'], 0, ',', '.') ?></label><br>
					<label style="border: none">Total Harga	: <?php echo number_format($Totalharga, 0, ',', '.') ?></label><br>
				</div>

				<div class="baris4-kolom2">
					<img src="https://www.socmalang.com/wp-content/uploads/2021/08/qr-code.svg">
				</div>				
			</div>

			<div class="baris-ttd">
				<div class="ttd" style="border-left: 1px solid;">
					<label>TTD Pengirim</label>
				</div>				
				<div class="ttd">
					<label>PICK UP</label>
					<p><?php echo $result['tanggal']?></p>
				</div>
				<div class="ttd">
					<label>TTD Penerima</label>
				</div>
			</div>

			<div class="baris5">
				<div class="baris5-kolom1">
					<img src="https://www.socmalang.com/wp-content/uploads/2021/07/Banner-Home-Page-2.png">
				</div>				
			</div>
		</div>


	</div>


	<div class="wrapper">

	<div class="section1">

<div class="baris1">
	<div class="logo"><img src="https://www.socmalang.com/wp-content/uploads/2021/08/2.png">
	</div>
</div>

<div class="baris-kota">
	<div style="width: 50%;text-align: center;">
	<label>ASAL</label> : <b>MLG</b>
	</div>
	<div style="width: 50%;text-align: center;">
	<label>TUJUAN</label> : <?php echo $result['KodeTujuan']?>
	</div>
</div>


<div class="baris2">
	<div class="baris2-kolom1">
	<label>AWB</label>
	<p><?php echo $result['Invoice']?></p>
	</div>
	<div class="baris2-kolom2">
	<label>JUMLAH</label>
	<p><?php echo $JumlahTInv?> Koli</p>
	</div>
	<div class="baris2-kolom3">
	<label>BERAT</label>
                <p>
					<?php 
						if($NilaiBerat == 0){
							echo "-";
						}else{
							echo "$NilaiBerat Kg";
						}
					?>
				</p>
	</div>
	<div class="baris2-kolom4" style="border-right: 1px solid;">
	<label>VOLUME</label>
	<p>
	<?php 
		$HitungVolume=mysqli_query($koneksi,"SELECT Panjang,Lebar,Tinggi,Volume AS TotalVolume FROM Barang WHERE Invoice='$inv'");
		while($row = mysqli_fetch_array($HitungVolume)){
			if($row[3] == 0){
				echo "-";
			}else
				echo "$row[0]/$row[1]/$row[2]=$row[3]";
				echo "<br />";
			 }
	?>
	</p>
	</div>
</div>

<div class="baris3">
	<div class="baris3-kolom1">
		<label>From :</label><br><br>
			<?php echo $result['NamaPengirim']?><br>
			<?php echo $result['HpPengirim']?><br>
			<?php echo 'Malang'?><br>	
	</div>				
	<div class="baris3-kolom2">
		<label>To :</label><br><br>
			<?php echo $result['NamaPenerima']?><br>
			<?php echo $result['HpPenerima']?><br>
			<?php echo $result['Alamat']?><br>
	</div>
</div>

<div class="barist" style="display: flex;">
	<div class="barist-kolom1" style="width: 50%; border: 1px solid; border-top: none; border-right: none; padding: 10px;">
		<?php echo $result['Armada']?>
	</div>				
	<div class="barist-kolom2" style="width: 50%; border: 1px solid; border-top: none; padding: 10px;">
		<label>Barang : </label> <?php echo $result['IsiBarang']?>
	</div>
</div>

<div class="baris4">
	<div class="baris4-kolom1">
		<label>SMU	: <?php echo number_format($result['SMU'], 0, ',', '.') ?></label><br>
		<label>Packing	: <?php echo number_format($result['HargaPacking'], 0, ',', '.')?></label><br>
		<label>Harga / Kg 	: <?php echo number_format($result['HargaKilo'], 0, ',', '.') ?></label><br>
		<label style="border: none">Total Harga	: <?php echo number_format($Totalharga, 0, ',', '.') ?></label><br>
	</div>

	<div class="baris4-kolom2">
		<img src="https://www.socmalang.com/wp-content/uploads/2021/08/qr-code.svg">
	</div>				
</div>

<div class="baris-ttd">
	<div class="ttd" style="border-left: 1px solid;">
		<label>TTD Pengirim</label>
	</div>				
	<div class="ttd">
		<label>PICK UP</label>
		<p><?php echo $result['tanggal']?></p>
	</div>
	<div class="ttd">
		<label>TTD Penerima</label>
	</div>
</div>

<div class="baris5">
	<div class="baris5-kolom1">
		<img src="https://www.socmalang.com/wp-content/uploads/2021/07/Banner-Home-Page-2.png">
	</div>				
</div>
</div>

		<div class="cut" style="height: auto; border: 2px dashed;"></div>


		<div class="section2">

<div class="baris1">
	<div class="logo"><img src="https://www.socmalang.com/wp-content/uploads/2021/08/2.png">
	</div>
</div>

<div class="baris-kota">
	<div style="width: 50%;text-align: center;">
	<label>ASAL</label> : <b>MLG</b>
	</div>
	<div style="width: 50%;text-align: center;">
	<label>TUJUAN</label> : <?php echo $result['KodeTujuan']?>
	</div>
</div>


<div class="baris2">
	<div class="baris2-kolom1">
	<label>AWB</label>
	<p><?php echo $result['Invoice']?></p>
	</div>
	<div class="baris2-kolom2">
	<label>JUMLAH</label>
	<p><?php echo $JumlahTInv?> Koli</p>
	</div>
	<div class="baris2-kolom3">
	<label>BERAT</label>
                <p>
					<?php 
						if($NilaiBerat == 0){
							echo "-";
						}else{
							echo "$NilaiBerat Kg";
						}
					?>
				</p>
	</div>
	<div class="baris2-kolom4" style="border-right: 1px solid;">
	<label>VOLUME</label>
	<p>
	<?php 
		$HitungVolume=mysqli_query($koneksi,"SELECT Panjang,Lebar,Tinggi,Volume AS TotalVolume FROM Barang WHERE Invoice='$inv'");
		while($row = mysqli_fetch_array($HitungVolume)){
			if($row[3] == 0){
				echo "-";
			}else
				echo "$row[0]/$row[1]/$row[2]=$row[3]";
				echo "<br />";
			 }
	?>
	</p>
	</div>
</div>

<div class="baris3">
	<div class="baris3-kolom1">
		<label>From :</label><br><br>
			<?php echo $result['NamaPengirim']?><br>
			<?php echo $result['HpPengirim']?><br>
			<?php echo 'Malang'?><br>	
	</div>				
	<div class="baris3-kolom2">
		<label>To :</label><br><br>
			<?php echo $result['NamaPenerima']?><br>
			<?php echo $result['HpPenerima']?><br>
			<?php echo $result['Alamat']?><br>
	</div>
</div>

<div class="barist" style="display: flex;">
	<div class="barist-kolom1" style="width: 50%; border: 1px solid; border-top: none; border-right: none; padding: 10px;">
		<?php echo $result['Armada']?>
	</div>				
	<div class="barist-kolom2" style="width: 50%; border: 1px solid; border-top: none; padding: 10px;">
		<label>Barang : </label> <?php echo $result['IsiBarang']?>
	</div>
</div>

<div class="baris4">
	<div class="baris4-kolom1">
		<label>SMU	: <?php echo number_format($result['SMU'], 0, ',', '.') ?></label><br>
		<label>Packing	: <?php echo number_format($result['HargaPacking'], 0, ',', '.')?></label><br>
		<label>Harga / Kg 	: <?php echo number_format($result['HargaKilo'], 0, ',', '.') ?></label><br>
		<label style="border: none">Total Harga	: <?php echo number_format($Totalharga, 0, ',', '.') ?></label><br>
	</div>

	<div class="baris4-kolom2">
		<img src="https://www.socmalang.com/wp-content/uploads/2021/08/qr-code.svg">
	</div>				
</div>

<div class="baris-ttd">
	<div class="ttd" style="border-left: 1px solid;">
		<label>TTD Pengirim</label>
	</div>				
	<div class="ttd">
		<label>PICK UP</label>
		<p><?php echo $result['tanggal']?></p>
	</div>
	<div class="ttd">
		<label>TTD Penerima</label>
	</div>
</div>

<div class="baris5">
	<div class="baris5-kolom1">
		<img src="https://www.socmalang.com/wp-content/uploads/2021/07/Banner-Home-Page-2.png">
	</div>				
</div>
</div>

	</div>
<script>
    window.print();
</script>


</body>
</html>

