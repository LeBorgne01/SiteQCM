<?php
session_start();
$_SESSION['root']=dirname(__FILE__);

require_once("classes/Form.php");
require_once("classes/html.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	$html = new HTML(null,"utf-8","QCM","style.css");
	echo $html->meta_data();
	?>
</head>
<body>
	<?php
	echo $html->header("QCM's");
	//echo $html->menu_nav_eleve();
	?>
	<main>
		<?php
		echo '<div class="compte">';
		echo $html->ecran_connexion();
		echo "</div>";
		?>
	</main>
</body>
</html>