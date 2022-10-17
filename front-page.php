<?php get_header() ?>
<?php //get_template_part( 'template-parts/news/news', 'featured' ) ?>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 py-3">
			<?php get_template_part( 'template-parts/news/news', 'highlights' ) ?>
			<?php get_template_part( 'template-parts/news/news', 'news' ) ?>
			<?php //get_template_part( 'template-parts/news/news', 'categories' ) ?>
            <?php //get_template_part( 'template-parts/news/news', 'modified' ) ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
			<?php get_template_part( 'template-parts/sidebars/sidebar', 'index' ) ?>
        </div>
    </div>
<?php get_footer() ?>