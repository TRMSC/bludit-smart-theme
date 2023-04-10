<?php
function generatePageInfo($reference) {

    ?>
    <!-- Page tags -->
    <?php if (!empty($reference->tags(true))): ?>
        <p class="tag-container">
            <?php foreach ($reference->tags(true) as $tagKey => $tagName): ?>
                <a class="tag" href="<?php echo DOMAIN_TAGS . $tagKey ?>"><?php echo $tagName; ?></a>
            <?php endforeach ?>
        </p>
    <?php endif; ?>

    <p class="page-info">

        <!-- Page category -->
        <?php if ($reference->category()): ?>
            <span class="no-break">
                <i class="fa fa-folder"></i>
                <a href="<?php echo DOMAIN_CATEGORIES . $categoryKey . $reference->categoryKey(); ?>"><span>
                        <?php echo $reference->category(); ?>
                    </span></a>
            </span>
        <?php endif; ?>

        <!-- Page created -->
        <span class="no-break">
            <i class="fa fa-pencil"></i>
            <span>
                <?php echo $reference->date(); ?>
            </span>
        </span>

        <!-- Page modified -->
        <?php if ($reference->dateModified() && $reference->dateModified() !== $reference->date()): ?>
            <span class="no-break">
                <i class="fa fa-history"></i>
                <span>
                    <?php echo $reference->dateModified(); ?>
                </span>
            </span>
        <?php endif; ?>

        <!-- Page reading time -->
        <span class="no-break">
            <i class="fa fa-book"></i>
            <?php
            $plain = strip_tags($reference->content());
            $words = str_word_count($plain);
            $wpm = 225;
            $time = ($words <= $wpm) ? '<1' : round($words / $wpm);
            echo $time . 'min';
            ?>
        </span>

    </p>

    <?php
}