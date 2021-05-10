<!DOCTYPE html>
<html lang="en">
<head>
<title>Lab7web</title>
</head>
<body>
<h2>Form Input</h2>
  
<form action="" method="post">
<div class="row">
    <label>Nama :</label><br>
    <input type="text" name="nama" value="<?=isset($_POST['nama']) ? $_POST['nama'] : ' '?>"/>
</div>
Masukkan Tanggal Lahir : <br>
<input type="date" name="tanggal_lahir"><br>
<div class="row">
		<label>Pekerjaan</label><br>
		<select name="pekerjaan">
			<?php $options = array('Operator produksi <br> Gaji Rp. 4.800.000', 
            'HDR<br> Gaji Rp. 8.800.000', 'Mekanik <br> Gaji Rp. 6.000.000');
			foreach ($options as $pekerjaan) {
				$selected = @$_POST['pekerjaan'] == $pekerjaan ? ' selected="selected"' : '';
				echo '<option value="' . $pekerjaan . '"' . $selected . '>' . $pekerjaan . '</option>';
			}?>
		</select>
	</div>
<div class="row">
    <input type="submit" name="submit" value="simpan"/>
</div>
</form>

<?php
if (isset($_POST['submit'])){
    echo '<h1>Hasil Input</h1>';
    echo '<ul>';
echo '<li>Nama : '.$_POST['nama'].'</li>';
$tanggal_lahir = new DateTime($_POST['tanggal_lahir']);
$sekarang = new DateTime("today");
if ($tanggal_lahir > $sekarang) { 
$thn = "0";
$bln = "0";
$tgl = "0";
}
$thn = $sekarang->diff($tanggal_lahir)->y;
$bln = $sekarang->diff($tanggal_lahir)->m;
$tgl = $sekarang->diff($tanggal_lahir)->d;
echo "Umur : ";
echo $thn." tahun ".$bln." bulan ".$tgl." hari";
echo '<li>Pekerjaan : '.$_POST['pekerjaan'].'</li>';
}
   
    echo '<ul>';
?>
</body>
</html>