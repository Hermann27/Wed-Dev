<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
<form  method="post" enctype="multipart/form-data" name="form1" id="form1"><table width="0" border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
    <td align="center" colspan="3"><?php if(isset($_POST['id'])) require 'routeur.php' ?></td>
  </tr>
  <tr>
    <td align="right">CV:</td>
    <td align="left">
      <input type="file" name="cv" id="cv" />
      <input type="hidden" name="module" id="module" value="prestataire" />
      <input type="hidden" name="action" id="action" value="cv_add" />
      <input type="hidden" name="id" id="id" value="30" />
      </td>
    <td align="left"><input value="Envoyer" type="submit" /></td>
  </tr>
  
  
</table></form>
</body>
</html>
