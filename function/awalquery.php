<?php 
	include 'header.php';
 ?>
 <center>
 	<h3>Pencarian Kueri Tf Idf</h3>
 	<br>
<form enctype="multipart/form-data" method="POST" action="querytf2.php">
	<div class="input-group col-md-6">
      <input type="text" class="form-control" placeholder="Masukkan kata..." name="kata">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Cari!</button>
      </span>
    </div>
<!-- Kata Kunci : <br>
  <input type="text" name="kata"><br>
<input type=submit value=Submit> -->
</form>

<?php 
	include 'footer.php';
 ?>