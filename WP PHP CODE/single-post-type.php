<?php get_header();  ?>

<div class="container">
<?php
echo do_shortcode('[html_block id="418"]')
?>
	
</div>

<div class="chumash-gardern archive-chumash-gardern">
    <div class="row">
        <?php while (have_posts()) : the_post(); ?>
        <div class="col-md-12">
            <div class="chumash-gardern-content">
				<?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>


<div class="container">
<?php
echo do_shortcode('[html_block id="419"]')
?>

<?php get_footer();  ?>