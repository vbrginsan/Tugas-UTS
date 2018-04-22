<?php 
	include "header.php";
 ?>
 <center>
 	<form action="hasil_upload.php" method="POST" enctype="multipart/form-data">
 			<div class="form-group">
 				<label for="fupload">File Yang Di Upload</label>
 				<input type="file" name="fupload" id="fupload">
 			</div>
 			<div class="form-group">
 				<label for="deskripsi">Deskripsi File</label><br>
 				<textarea name="deskripsi" id="deskripsi" cols="20" rows="5"></textarea>
 			</div>
 			<div id="formsubmitbutton">
            <input type="submit" name="submitter" value="Unggah" onclick="ButtonClicked()">
         </div>
 			<div id="buttonreplacement" style="margin-left:30px; display:none;">
				<img src="//www.willmaster.com/images/preload.gif" alt="loading...">
			</div>
 	</form>
 	<script type="text/javascript">
/*
   Replacing Submit Button with 'Loading' Image
   Version 2.0
   December 18, 2012

   Will Bontrager Software, LLC
   https://www.willmaster.com/
   Copyright 2012 Will Bontrager Software, LLC

   This software is provided "AS IS," without 
   any warranty of any kind, without even any 
   implied warranty such as merchantability 
   or fitness for a particular purpose.
   Will Bontrager Software, LLC grants 
   you a royalty free license to use or 
   modify this software provided this 
   notice appears on all copies. 
*/
function ButtonClicked()
{
   document.getElementById("formsubmitbutton").style.display = "none"; // to undisplay
   document.getElementById("buttonreplacement").style.display = ""; // to display
   return true;
}
var FirstLoading = true;
function RestoreSubmitButton()
{
   if( FirstLoading )
   {
      FirstLoading = false;
      return;
   }
   document.getElementById("formsubmitbutton").style.display = ""; // to display
   document.getElementById("buttonreplacement").style.display = "none"; // to undisplay
}
// To disable restoring submit button, disable or delete next line.
// document.onfocus = RestoreSubmitButton;
</script>
<!-- <form enctype="multipart/form-data" method="POST" action="function/hasil_upload.php">
File yang di upload : <input type="file" name="fupload"><br>
Deskripsi File : <br>
<textarea name="deskripsi" rows="8" cols="40"></textarea><br>
<input type=submit value=Upload>
</form> -->

<?php 
	include "footer.php";
 ?>