<?php 
	include 'header.php';
 ?>
<center>
<h3>Pencarian Kueri Boolean</h3>
<br>
<form enctype="multipart/form-data" method="POST" action="hasilquery.php">
	<div class="input-group col-md-6">
      <input type="text" class="form-control" placeholder="Masukkan kata..." name="katakunci">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Cari!</button>
      </span>
    </div>

<!-- /input-group -->
<!-- Keyword : <br>
<input class="input-group" type="text" name="katakunci"><br>
<input type=submit> -->
</form>
<?php 
	include 'footer.php';
 ?>