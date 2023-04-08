<section class="page">
	<div class="container">
		<div class="row page-preview">
			<div class="col-lg-8 mx-auto">

				<!-- Load Bludit Plugins: Page Begin -->
				<?php Theme::plugins('pageBegin'); ?>

				<?php if ($page->isStatic()): ?>

					<p class="page-info m-0 mb-2">

						<!-- Main page --> 
						<span class="no-break">
							<i class="fa fa-flag"></i>
							<span><?php $language->p('static-info') ?></span>
						</span>

						<!-- Page modified -->
						<?php if ($page->dateModified()): ?>
							<span class="no-break">
								<i class="fa fa-history"></i>
								<span>
									<?php echo $page->dateModified(); ?>
								</span>
							</span>
						<?php endif; ?>

					</p>

					<!-- Page title -->
					<h1 id="page-title" class="title mb-4"><?php echo $page->title(); ?></h1>	
					
				<?php endif; ?>

				<!-- Page cover image -->
				<?php if ($page->coverImage()): ?>
					<div class="py-6 mb-4">
						<img src="<?php echo $page->coverImage(); ?>" alt="<?php echo $page->custom('coverImageAlt'); ?>">
					</div>
				<?php endif ?>

				<?php if (!$page->isStatic()): ?>
					<!-- Page title -->
					<h1 id="page-title" class="title"><?php echo $page->title(); ?></h1>

					<!-- Page information -->
					<?php generatePageInfo($page); ?>
				<?php endif; ?>

				<!-- Page description -->
				<?php if ($page->description()): ?>
					<p class="page-description">
						<?php echo $page->description(); ?>
					</p>
				<?php endif ?>

				<!-- Buttons -->
				<p></p>
				<hr class="bg-secondary">
				<p></p>
				<div class="btn-group" role="group" aria-label="Page Buttons" style="width: 100%;gap: 2px;">
					<button id="toc-toggle" class="btn btn-secondary btn-sm">
						<?php $language->p('content') ?> <i class="fa fa-compass"></i>
					</button>
					<button type="button" class="btn btn-secondary btn-sm share" style="">
						<?php $language->p('share') ?> <i class="fa fa-share-alt"></i>
					</button>
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

<?php $relatedPages = $page->related();
foreach ($relatedPages as $pageKey): ?>
	<?php $related = new Page($pageKey); ?>
	<section class="home-page">
		<div class="container">
			<div>
				<div class="row page-preview">
					<div class="col-lg-8 mx-auto">

						<!-- Page cover image -->
						<?php if ($related->coverImage()): ?>
							<div class="page-cover-image py-6 mb-4">
								<?php if ($related->isStatic()): ?>
									<div class="text-right"><span class="static-info">
											<?php $language->p('static-info') ?> <i class="fa fa-flag"></i>
										</span></div>
								<?php endif; ?>
								<img src="<?php echo $related->coverImage(); ?>"
									alt="<?php echo $related->custom('coverImageAlt'); ?>"
									style="height: 150px; width: 100%; object-fit: cover;">
							</div>
						<?php endif ?>

					</div>
					<div class="col-lg-8 mx-auto">

						<!-- Load Bludit Plugins: Page Begin -->
						<?php Theme::plugins('pageBegin'); ?>

						<!-- Page title -->
						<a class="title-link" href="<?php echo $related->permalink(); ?>">
							<h2 class="title">
								<?php echo $related->title(); ?>
							</h2>
						</a>

						<!-- Page information -->
						<?php generatePageInfo($related); ?>

						<!-- Page description -->
						<?php if ($related->description()): ?>
							<p class="page-description">
								<?php echo $related->description(); ?>
							</p>
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
