<?php
session_start();

require_once("/classes/form.php");
require_once("/classes/HTML.php");
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
	echo $html->header("QCM en folie");
	//echo $html->menu_nav_eleve();
	?>
	<main>
		<?php
		echo '<div class="compte">';
		echo '<div>';
		echo $html->ecran_connexion();
		echo '</div>';
		echo '<div>';
		echo $html->ecran_inscription();
		echo '</div>';
		echo "</div>";
		?>
	</main>
	<form name=""></form>
</body>
</html>