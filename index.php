<!DOCTYPE html>
<html lang="<?php echo Theme::lang() ?>">
<head>
	<!-- General meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="generator" content="Bludit">

	<!-- Dynamic meta tags -->
	<?php echo Theme::metaTagTitle(); ?>
	<?php echo Theme::metaTagDescription(); ?>

	<!-- Open graph meta tags -->
	<meta property="og:site_name" content="<?php echo $site->title(); ?>">
	<meta property="og:url" content="<?php echo $site->url(); ?>">
	<meta property="og:locale" content="<?php echo $site->language(); ?>">

	<?php 
	if (class_exists('pluginSmart')): $pluginSmart = new pluginSmart(); endif;
	$img = '';
	if ($WHERE_AM_I=='home') {
		echo '<meta property="og:title" content="' . $site->slogan() . '">' . "\n";
		echo '<meta property="og:description" content="' . $site->description() . '">' . "\n";
		if (class_exists('pluginSmart')) {
			$landingpage = $pluginSmart->getValue('landingpage');
			foreach ($staticContent as $page) {
				if ($page->permalink() == $landingpage ) {
						if ($page->custom('altOG')): $img = $page->custom('altOG');
						elseif ($page->coverImage()): $img = $page->coverImage();
						endif;
				} 
			}
		}
	} elseif ($WHERE_AM_I=='page') {
		echo '<meta property="og:title" content="' . $page->title() . '">' . "\n";
		echo '<meta property="og:description" content="' . $page->description() . '">' . "\n";
		if ($page->custom('altOG')): $img = $page->custom('altOG');
		elseif ($page->coverImage()): $img = $page->coverImage();
		endif;
	}
	if (!empty($img)): echo '<meta property="og:image" content="' . $img . '">' . "\n"; endif;
	?>

	<!-- Include favicon and possible fallback for og:image meta tag -->
	<?php 
	if (class_exists('pluginSmart') && $pluginSmart->getValue('favicon')) {
			if (empty($img)): echo '<meta property="og:image" content="' . $pluginSmart->getValue('favicon') . '">' . "\n"; endif;
			echo '<link rel="icon" href="'.$pluginSmart->getValue('favicon').'" type="image/png">';
	} else {
		$favicon = "bl-content/uploads/" . $site->title() . ".png";
		if (file_exists($favicon)) {
			if (empty($img)): echo '<meta property="og:image" content="/' . $favicon . '">' . "\n"; endif;
			echo '<link rel="icon" href="/'.$favicon.'" type="image/png">';
		}
	}
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

	<!-- Include utils -->
	<?php include(THEME_DIR_PHP . '/utils/pageinfo.php'); ?>

	<!-- Navbar -->
	<?php include(THEME_DIR_PHP.'navbar.php'); ?>

	<span id="main-content">

		<!-- Content -->
		<?php include($WHERE_AM_I == 'page' ? THEME_DIR_PHP.'page.php' : THEME_DIR_PHP.'home.php'); ?>

		<!-- Back to top button -->
		<button id="back-to-top" class="btn btn-dark"><i class="fa fa-chevron-up"></i></button>

		<div id="clipboard-info" class="bg-dark text-center"><?php $language->p('clipboard-info') ?> <i class="fa fa-check"></i></div>

	</span>

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