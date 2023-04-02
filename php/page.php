<section class="page">
	<div class="container">
		<div class="row page-preview">

			<div class="col-lg-8 mx-auto">
				<!-- Load Bludit Plugins: Page Begin -->
				<?php Theme::plugins('pageBegin'); ?>

				<!-- Page cover image -->
				<?php if ($page->coverImage()): ?>
					<div class="py-6 mb-4">
						<img src="<?php echo $page->coverImage(); ?>" alt="<?php echo $page->custom('coverImageAlt'); ?>">
					</div>
				<?php endif ?>

				<!-- Page title -->
				<a class="text-dark" href="<?php echo $page->permalink(); ?>">
					<h2 class="title"><?php echo $page->title(); ?></h2>
				</a>

				<!-- Page tags -->
				<?php if (!empty($page->tags(true))): ?>
                <p class="tag-container">
                    <?php foreach ($page->tags(true) as $tagKey=>$tagName): ?>
                    <a href="<?php echo DOMAIN_TAGS.$tagKey ?>"><span class="tag"><?php echo $tagName; ?></span></a>
                    <?php endforeach ?>
                </p>
                <?php endif; ?>

				<!-- Page information START-->
				<p class="page-info">

					<!-- Page category -->
					<?php if ($page->category()): ?>
					<span class="no-break">
						<i class="fa fa-folder"></i>
						<a href="<?php echo DOMAIN_CATEGORIES.$categoryKey.$page->categoryKey(); ?>"><span><?php echo $page->category(); ?></span></a>
					</span>
					<?php endif; ?>

					<!-- Page created -->
					<span class="no-break">
						<i class="fa fa-pencil"></i>
						<span><?php echo $page->date(); ?></span>
					</span>

					<!-- Page modified -->
					<?php if ($page->dateModified()): ?>
					<span class="no-break">
						<i class="fa fa-history"></i>
						<span><?php echo $page->dateModified(); ?></span>
					</span>
					<?php endif; ?>

					<!-- Page reading time -->
					<span class="no-break">
						<i class="fa fa-book"></i>
						<?php 
						$plain = strip_tags($page->content());
						$words = str_word_count($plain);
						$wpm = 225;
						if ($words <= $wpm) {
							$time = '<1';
						} else {
							$time = round($words / $wpm);
						}
						echo $time . 'min';
						?>
					</span>

				<!-- Page information END -->
				</p>

				<!-- Page description -->
				<?php if ($page->description()): ?>
				<p class="page-description"><?php echo $page->description(); ?></p>
				<?php endif ?>

				<!-- Buttons -->
				<p></p>
				<hr class="bg-secondary">
				<p></p>
				<div class="btn-group" role="group" aria-label="Page Buttons" style="width: 100%;gap: 2px;">
					<button id="toc-toggle" class="btn btn-secondary btn-sm">Inhalt <i class="fa fa-compass"></i></button>
					<button type="button" class="btn btn-secondary btn-sm" style="">Teilen <i class="fa fa-share-alt"></i></button>
				</div>
				<div id="toc" class="close">
					<ul></ul>
				</div>
				<p></p>
				<hr class="bg-secondary">
				<p></p>

				<!-- Page content -->
				<div class="page-content">
					<?php echo $page->content(); ?>
				</div>

				<!-- Load Bludit Plugins: Page End -->
				<?php Theme::plugins('pageEnd'); ?>
			</div>
		</div>
	</div>
</section>
