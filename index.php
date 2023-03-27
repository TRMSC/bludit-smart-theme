<!DOCTYPE html>
<html lang="<?php echo Theme::lang() ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="generator" content="Bludit">

	<!-- Open graph meta tags -->
	<meta property="og:site_name" content="<?php echo $site->title(); ?>">
	<meta property="og:url" content="<?php echo $site->url(); ?>">
	<meta property="og:locale" content="<?php echo $site->language(); ?>">

	<?php 
		if ($WHERE_AM_I=='home') {
			echo '<meta property="og:title" content="' . $site->slogan() . '">' . "\n";
			echo '<meta property="og:description" content="' . $site->description() . '">' . "\n";
			if (class_exists('pluginSmart')) {
				/*
				$landingpage = Theme::plugins('addMeta');
				foreach ($staticContent as $page) {
					if ($page->permalink() == $landingpage ) {
							echo '<meta property="og:image" content="' . $page->coverImage() . '">' . "\n";
					}
				}
				*/
			}
		} elseif ($WHERE_AM_I=='page') {
			echo '<meta property="og:title" content="' . $page->title() . '">' . "\n";
			echo '<meta property="og:description" content="' . $page->description() . '">' . "\n";
			echo '<meta property="og:image" content="' . $page->coverImage() . '">' . "\n";
		}
		// Add og-image for the following cases:
		// - Img doesn't exist on home with smart theme
		// - Home without smart theme
		// - Page without cover image
	?>

	<!-- Dynamic tags -->
	<?php echo Theme::metaTagTitle(); ?>
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