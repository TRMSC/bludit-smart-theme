<footer class="footer bg-dark">
	<div class="container">
		<div id="footer-first-row" class="row footer-row text-white">
			<div id="footer-text" class="col footer-col footer-left">
				<?php echo $site->footer(); ?>
			</div>
				<?php 
					$footerlinks = '';
					if (class_exists('pluginSmart')) {
						$pluginSmart = new pluginSmart();
						$footerlinks = $pluginSmart->getValue('footerLinks');
					}
					echo '<div id="footer-source" class="col footer-col ' . (empty($footerlinks) ? 'footer-right' : 'footer-center') . '">';
				?>
				<span class="text-white no-break">
					<a target="_blank" class="text-white" href="https://www.bludit.com/">Powered by Bludit</a>
				</span>
				<img class="mini-logo" src="<?php echo DOMAIN_THEME_IMG.'bludit.png'; ?>"/>
				<span class="text-warning no-break">
					<a target="_blank" class="text-warning" href="https://github.com/TRMSC/bludit-smart-theme">Smart theme by TRMSC</a>
				</span>
			</div>
				<?php Theme::plugins('addFooterLinks'); ?>
		</div>
		<div id="footer-second-row" class="row footer-row text-white">
			<div id="footer-additional-text" class="col footer-col"></div>
		</div>
	</div>
</footer>
