<?php
session_start();

if (!$_SESSION["is_login"] === TRUE) {
    header("location: login.php");
    exit;
}
?>

<?php 
// $connect = mysqli_connect("103.247.11.177", "socj1487_zhafirin", "@zdM=V$P!+yT", "socj1487_invoice");

include 'connection.php';

 //Mengitung Jumlah Form Dynamic
 $number = count($_POST["panjang"]);
 
//Declaration Value Form 
 $invoice = $_POST["invoice"];
 $tanggal = $_POST["tanggal"];

 $namapengirim = $_POST["namaPengirim"];
 $hppengirim = $_POST["hpPengirim"];
 $kodetujuan = $_POST["kodeTujuan"];

 $namapenerima = $_POST["namaPenerima"];
 $hppenerima = $_POST["hpPenerima"];
 $isibarang = $_POST["isiBarang"];

 $alamat = $_POST["alamat"];

 $hargapacking = $_POST["hargaPacking"];
 $smu = $_POST["smu"];
 $hargakilo = $_POST["hargaKilo"];

 $harga = $_POST["harga"];
 $armada = $_POST["armada"];
//End Declaration Value Form



//Declaration Value Form Dynamic
 if($number > 0) { 
     $message = false;
     for($i=0; $i<$number; $i++) {
         if(trim($_POST["panjang"][$i] != '') && trim($_POST["lebar"][$i] != '') && trim($_POST["tinggi"][$i] != '') && trim($_POST["berat"][$i] != '')) { 
             
            //Declaration Value Form 
             $panjang=$_POST["panjang"][$i];
             $lebar=$_POST["lebar"][$i];
             $tinggi=$_POST["tinggi"][$i];
             $berat=$_POST["berat"][$i];

             //Calculate Volume
             $volumeBarang=$panjang*$lebar*$tinggi/$harga;
             $volume=ceil($volumeBarang);

            //Get Highest Value
             $totalBerat=max($volume, $berat);

            //Insert Into Table Barang
             $sql = "INSERT INTO Barang (Invoice,Panjang,Lebar,Tinggi,Berat,Volume,TotalBerat) VALUES('$invoice','$panjang','$lebar','$tinggi','$berat','$volume','$totalBerat')";
             mysqli_query($koneksi, $sql);
             $message = true;

                 //Insert Into Table Identity
     $sql2 = "INSERT INTO Identity (Invoice,tanggal,NamaPengirim,HpPengirim,KodeTujuan,NamaPenerima,HpPenerima,Alamat,IsiBarang,Armada,HargaPacking,SMU,HargaKilo,Pembagian) 
     VALUES('$invoice','$tanggal','$namapengirim','$hppengirim','$kodetujuan','$namapenerima','$hppenerima','$alamat','$isibarang','$armada','$hargapacking','$smu','$hargakilo','$harga')";
     mysqli_query($koneksi, $sql2);

         } else {
             echo "Data Perhitungan Berat Tidak Boleh Kosong hmmmmz";
         }
     }
    
     if($message == true){
         echo "Berhasil membuat invoice atas nama $namapengirim";
     }
 } else { 
     echo "Cek input kembali!";  
 }
?>