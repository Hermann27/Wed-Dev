<?php
	$MyCv=$_FILES['cv']['name'];
	$cheminCv=$_FILES['cv']['tmp_name'];
	move_uploaded_file($cheminCv,"./Photo Etudiant/$MyCv");
?>
<label>Votre CV</label><input type="file"  name="cv" />