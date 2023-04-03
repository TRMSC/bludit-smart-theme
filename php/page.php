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
				<h1 id="page-title" class="title"><?php echo $page->title(); ?></h1>

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
					<button id="toc-toggle" class="btn btn-secondary btn-sm"><?php $language->p('content') ?> <i class="fa fa-compass"></i></button>
					<button type="button" class="btn btn-secondary btn-sm share" style=""><?php $language->p('share') ?> <i class="fa fa-share-alt"></i></button>
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

<?php $relatedPages = $page->related(); foreach ($relatedPages as $pageKey): ?>
<?php $related = new Page($pageKey); ?>
<section class="home-page">
	<div class="container">
	<div>
		<div class="row page-preview">
			<div class="col-lg-8 mx-auto">
				<!-- Page cover image -->
				<?php if ($related->coverImage()): ?>
				<div class="page-cover-image py-6 mb-4">
					<img src="<?php echo $related->coverImage(); ?>" alt="<?php echo $related->custom('coverImageAlt'); ?>" style="height: 150px; width: 100%; object-fit: cover;">
				</div>
				<?php endif ?>
			</div>
			<div class="col-lg-8 mx-auto">
				<!-- Load Bludit Plugins: Page Begin -->
				<?php Theme::plugins('pageBegin'); ?>

				<!-- Page title -->
				<a class="title-link" href="<?php echo $related->permalink(); ?>">
					<h2 class="title"><?php echo $related->title(); ?></h2>
				</a>

				<!-- Page tags -->
				<?php if (!empty($related->tags(true))): ?>
                <p class="tag-container">
                    <?php foreach ($related->tags(true) as $tagKey=>$tagName): ?>
                    <a href="<?php echo DOMAIN_TAGS.$tagKey ?>"><span class="tag"><?php echo $tagName; ?></span></a>
                    <?php endforeach ?>
                </p>
                <?php endif; ?>

				<!-- Page information START-->
				<p class="page-info">

				<!-- Page category -->
				<?php if ($related->category()): ?>
                <span class="no-break">
					<i class="fa fa-folder"></i>
                    <a href="<?php echo DOMAIN_CATEGORIES.$categoryKey.$related->categoryKey(); ?>"><span><?php echo $related->category(); ?></span></a>
                </span>
                <?php endif; ?>

				<!-- Page created -->
				<span class="no-break">
					<i class="fa fa-pencil"></i>
                    <span><?php echo $related->date(); ?></span>
                </span>

				<!-- Page modified -->
				<?php if ($related->dateModified()): ?>
				<span class="no-break">
					<i class="fa fa-history"></i>
                    <span><?php echo $related->dateModified(); ?></span>
                </span>
				<?php endif; ?>

				<!-- Page reading time -->
				<span class="no-break">
					<i class="fa fa-book"></i>
					<?php 
					$plain = strip_tags($related->content());
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
				<?php if ($related->description()): ?>
				<p class="page-description"><?php echo $related->description(); ?></p>
				<?php endif ?>

				<!-- Page open -->
				<a class="btn btn-secondary btn-sm" href="<?php echo $related->permalink(); ?>"><?php echo $L->get('Read more'); ?> <i class="fa fa-rocket"></i></a>

				<!-- Load Bludit Plugins: Page End -->
				<?php Theme::plugins('pageEnd'); ?>
			</div>
		</div>
	</div>
	</div>
</section>
<?php endforeach ?>