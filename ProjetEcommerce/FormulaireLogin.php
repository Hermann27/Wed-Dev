<?php
<html>
	<body>
		//formulaire du login
		echo '<form method="post" action ="authmain.php">';
		echo '<table>';
		echo '<tr><td>Identite:</td>';
		echo '<td><input type="text" name="userid"></td></tr>';
		echo '<tr><td>Mot Passe:</td>';
		echo '<td><input type="password" name="password"></td></tr>';
		echo '<tr><td colspan="2" align="center">';
		echo '<input type="submit" value="Entrer"></td></tr>';
		echo '</table></form>';
		
</body>
</html>
?>