<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $domaine;?>/images/favicon.ico" />
<link href="<?php echo $domaine;?>/admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $domaine;?>/admin/css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
<script language="javascript"  src="<?php echo $domaine;?>/admin/js/wysiwyg.js"></script>
<script language="javascript" src="<?php echo $domaine;?>/admin/js/wysiwyg-settings.js"></script>
<script language="javascript" src="<?php echo $domaine;?>/admin/js/swfobject_modified.js"></script>
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>
<div id="header_wrapper">

	<div id="header">
    
    <table width="100%"><tr><td align="left" valign="middle"><div id="site_logo"><a href="<?php echo $domaine;?>/?pos=1" title="Retour à la page d'accueil" style="width:240px; height:100px; text-decoration:none; display:block">&nbsp;</a></div></td>
    
    <td align="right" valign="bottom">
<div style="font-size:12px; float:right; font-weight:bold; color:#fff; margin-right:20px">
<?php
if(isset($_GET['pos']))
		if (isset($_GET['pos']) && $_GET['pos']!=1 && $_GET['pos']!=100)
			require_once("../../../php/class.user.php");
		else
			require_once("../../php/class.user.php");
	  else
			require_once("../php/class.user.php");
			
if(isset($_SESSION['email']) && isset($_SESSION['pass']) && isset($_SESSION['currentUser'])){
   $_SESSION['currentUser'] = serialize(User::authentificate($_SESSION['email'],$_SESSION['pass']));
   
   	$currentUser = unserialize($_SESSION['currentUser']);
	echo 'Compte en Cours: <span class="marqueFort">'.$currentUser->getNom().'</span>';	
	
	  $_SESSION['currentUser'] = serialize(User::authentificate($_SESSION['email'],$_SESSION['pass']));
	
} 


?></div></td></tr></table>
        
    </div> <!-- end of header -->

</div> 