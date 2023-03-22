<!DOCTYPE html>
<html lang="<?php echo Theme::lang() ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="generator" content="Bludit">

	<!-- Dynamic title tag -->
	<?php echo Theme::metaTagTitle(); ?>

	<!-- Dynamic description tag -->
	<?php echo Theme::metaTagDescription(); ?>

	<!-- Include Favicon -->
	<?php 
		$favicon = "bl-content/uploads/" . $site->title() . ".png";
		if (file_exists($favicon)):
			echo '<link rel="icon" href="/'.$favicon.'" type="image/png">';
		endif; 
	?>

	<!-- Include CSS Bootstrap file from Bludit Core -->
	<?php echo Theme::cssBootstrap(); ?>

	<!-- Include CSS Styles from this theme -->
	<?php echo Theme::css('src/style.css'); ?>

	<!-- Include Javascript from this theme -->
	<?php echo Theme::js('src/main.js'); ?>

	<!-- Include FontAwesome -->
	<link rel="stylesheet" href="../bl-kernel/css/line-awesome/css/line-awesome-font-awesome.min.css">

	<!-- Load Bludit Plugins: Site head -->
	<?php Theme::plugins('siteHead'); ?>
</head>
<body class="<?php Theme::plugins('bodyClass') ?>">

	<!-- Load Bludit Plugins: Site Body Begin -->
	<?php Theme::plugins('siteBodyBegin'); ?>

	<!-- Navbar -->
	<?php include(THEME_DIR_PHP.'navbar.php'); ?>

	<!-- Content -->
	<?php include($WHERE_AM_I == 'page' ? THEME_DIR_PHP.'page.php' : THEME_DIR_PHP.'home.php'); ?>

	<!-- Footer -->
	<?php include(THEME_DIR_PHP.'footer.php'); ?>

	<!-- Include Jquery file from Bludit Core -->
	<?php echo Theme::jquery(); ?>

	<!-- Include javascript Bootstrap file from Bludit Core -->
	<?php echo Theme::jsBootstrap(); ?>

	<!-- Load Bludit Plugins: Site Body End -->
	<?php Theme::plugins('siteBodyEnd'); ?>

</body>
</html>