<!-- Area for landing -->
<?php Theme::plugins('addLandingpage'); ?>

<!-- Alternative header -->
<?php if (!class_exists('pluginSmart')) : ?> 
    <header class="welcome">
        <div class="container text-center">
            <?php echo ($site->slogan()) ? '<h1>' . $site->slogan() . '</h1>' : ''; ?>
            <?php echo $site->description() ? '<p class="lead">' . $site->description() . '</p>' : ''; ?>
        </div>
    </header>
<?php endif; ?>

<!-- Content -->
<?php if (empty($content)): ?>
	<div class="text-center p-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>

<?php foreach ($content as $page): ?>
<section class="home-page">
	<div class="container">
	<div>
		<div class="row page-preview">
			<div class="col-lg-8 mx-auto">
				<!-- Page cover image -->
				<?php if ($page->coverImage()): ?>
				<div class="page-cover-image py-6 mb-4">
					<img src="<?php echo $page->coverImage(); ?>" style="height: 150px; width: 100%; object-fit: cover;">
				</div>
				<?php endif ?>
			</div>
			<div class="col-lg-8 mx-auto">
				<!-- Load Bludit Plugins: Page Begin -->
				<?php Theme::plugins('pageBegin'); ?>

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

				<!-- Page open -->
				<a href="<?php echo $page->permalink(); ?>"><?php echo $L->get('Read more'); ?> <i class="fa fa-rocket"></i></a>

				<!-- Load Bludit Plugins: Page End -->
				<?php Theme::plugins('pageEnd'); ?>
			</div>
		</div>
	</div>
	</div>
</section>
<?php endforeach ?>

<!-- Pagination -->
<?php if (Paginator::numberOfPages()>1): ?>
<nav class="paginator">
	<ul class="pagination flex-wrap justify-content-center">

		<!-- Previous button -->
		<?php if (Paginator::showPrev()): ?>
		<li class="page-item mr-2">
			<a class="page-link" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1">&#9664; <?php echo $L->get('Previous'); ?></a>
		</li>
		<?php endif; ?>

		<!-- Home button -->
		<li class="page-item <?php if (Paginator::currentPage()==1) echo 'disabled' ?>">
			<a class="page-link" href="<?php echo Theme::siteUrl() ?>"><?php echo $L->get('Home'); ?></a>
		</li>

		<!-- Next button -->
		<?php if (Paginator::showNext()): ?>
		<li class="page-item ml-2">
			<a class="page-link" href="<?php echo Paginator::nextPageUrl() ?>"><?php echo $L->get('Next'); ?> &#9658;</a>
		</li>
		<?php endif; ?>
	</ul>
</nav>
<?php endif ?>
