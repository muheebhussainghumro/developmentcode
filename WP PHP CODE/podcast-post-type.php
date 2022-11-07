<?php  
    $mainarray = array(
        'post_type' => array('podcast'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 4
    );
    $q = new WP_Query($mainarray);
?>


<div class="podcast-wrapper">
    <div class="row">
        <?php while ($q->have_posts()) : $q->the_post(); ?>
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




<script>

const playerButton = jQuery('.player-button'),
    playIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
  </svg>
      `,
      pauseIcon = `
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM7 8a1 1 0 012 0v4a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v4a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
</svg>
      `,
      soundIcon = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
  <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM14.657 2.929a1 1 0 011.414 0A9.972 9.972 0 0119 10a9.972 9.972 0 01-2.929 7.071 1 1 0 01-1.414-1.414A7.971 7.971 0 0017 10c0-2.21-.894-4.208-2.343-5.657a1 1 0 010-1.414zm-2.829 2.828a1 1 0 011.415 0A5.983 5.983 0 0115 10a5.984 5.984 0 01-1.757 4.243 1 1 0 01-1.415-1.415A3.984 3.984 0 0013 10a3.983 3.983 0 00-1.172-2.828 1 1 0 010-1.415z" clip-rule="evenodd" />
</svg>`,
      muteIcon = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#3D3132">
  <path fill-rule="evenodd" d="M9.383 3.076A1 1 0 0110 4v12a1 1 0 01-1.707.707L4.586 13H2a1 1 0 01-1-1V8a1 1 0 011-1h2.586l3.707-3.707a1 1 0 011.09-.217zM12.293 7.293a1 1 0 011.414 0L15 8.586l1.293-1.293a1 1 0 111.414 1.414L16.414 10l1.293 1.293a1 1 0 01-1.414 1.414L15 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L13.586 10l-1.293-1.293a1 1 0 010-1.414z" clip-rule="evenodd" />
</svg>`;

jQuery('.player-button').each(function(){

    var audioA = jQuery(this).parent().parent().find('audio')[0];
    var audioB = jQuery(this).parent().parent().find('audio');
    var timelineA = jQuery(this).next();
    var soundButton = jQuery(this).parent().find('.sound-button');
    var currentPodcastButton = jQuery(this);

    currentPodcastButton.on('click', function(){
        if (audioA.paused)
        {
            audioA.play();
            jQuery(this).html(pauseIcon);
        }
        else 
        {
            audioA.pause();
            jQuery(this).html(playIcon);
        }
    });

    audioB.bind('timeupdate', function(){
        const percentagePosition = (100 * jQuery(this)[0].currentTime) / jQuery(this)[0].duration;
        timelineA.css('background-size', `${percentagePosition}% 100%`);
        timelineA.val(percentagePosition);
    });

    audioB.bind('ended', function(){
        jQuery(this).next().find('.player-button').html(playIcon);
    });

    timelineA.on('change', function(){
		var aud = jQuery(this).parent().prev();
        const time = (jQuery(this).val() * aud[0].duration) / 100;
        aud[0].currentTime = time;
    });
	
	soundButton.on('click', function(){
		var aud2 = jQuery(this).parent().prev()[0];
		aud2.muted = !aud2.muted;
		var svghtml = aud2.muted ? muteIcon : soundIcon;
		jQuery(this).html(svghtml);
	});

});

</script>



<!-- add this code in function.php in enqueque style function -->

<?php

wp_enqueue_script( 'myscript-js', get_stylesheet_directory_uri() . '/myscript.js', array(), '1.0.0', true );

?>


<!-- "myscript-js" and "myscript.js" for script file  -->