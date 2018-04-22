<?php
include 'header.php';
require_once('Enhanced_CS.php');
?>
<center>
	<h3>Pencarian Kueri Kata Dasar</h3>
	<br>
<form method="post" action="">
	<div class="input-group col-md-6">
      <input type="text" class="form-control" placeholder="Masukkan kata..." name="kata" <?php if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Cari!</button>
      </span>
    </div>
<!-- <input type="text" name="kata" id="kata" size="20" value="<?php //if(isset($_POST['kata'])){ echo $_POST['kata']; }else{ echo '';}?>">
<input class="btnForm" type="submit" name="submit" value="Submit"/> -->
</form>
<?php
if(isset($_POST['kata'])){
	echo "<br>";
	$teksAsli = $_POST['kata'];
	echo "Teks asli : ".$teksAsli.'<br/>';
	$st = new Stemmer();
	$stemming = $st->Enhanced_CS($teksAsli);
	echo "Kata dasar : ".$stemming.'<br/>';
}

	include 'footer.php';
?>
