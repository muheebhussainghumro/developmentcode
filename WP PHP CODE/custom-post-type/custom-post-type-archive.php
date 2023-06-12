<?php get_header();  ?>

<div class="podcast-wrapper archive-podcast-wrapper">
    <div class="row">
        <?php while (have_posts()) : the_post(); ?>
        <div class="col-md-6">
            <div class="podcast-card">
                <div class="about-podcast">
                    <div class="podcast-feature">
                        <?php if (has_post_thumbnail()):  
                		    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
                		?>
                			<img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">			
                		<?php else: ?>
                            <img src="<?php echo site_url('/wp-content/uploads/woocommerce-placeholder.png'); ?>" alt="Picture" class="featured-image">
                	    <?php endif; ?>
                    </div>
                    <div class="podcast-title">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </div>
                <div class="podcast-audio">
                    <div class="audio-player">
                        <audio src="<?php the_field('podcast_file'); ?>"></audio>
                        <div class="controls">
                            <button class="player-button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <input type="range" class="timeline" max="100" value="0">
                            <button class="sound-button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
                                <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>


<?php get_footer();  ?>