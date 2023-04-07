				<!-- Page tags -->
				<?php if (!empty($page->tags(true))): ?>
                <p class="tag-container">
                    <?php foreach ($page->tags(true) as $tagKey=>$tagName): ?>
                    <a class="tag" href="<?php echo DOMAIN_TAGS.$tagKey ?>"><?php echo $tagName; ?></a>
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
					$time = ($words <= $wpm) ? '<1' : round($words / $wpm);
					echo $time . 'min';
					?>
				</span>

				<!-- Page information END -->
				</p>

				<!-- Page description -->
				<?php if ($page->description()): ?>
				<p class="page-description"><?php echo $page->description(); ?></p>
				<?php endif ?>