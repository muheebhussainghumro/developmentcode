<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
.custom-paging-row {
    margin: 35px 0!important;
}
.custom-paging-row ul.page-numbers > li {
    display: inline!important;
}
.custom-paging-row ul.page-numbers>li a,
.custom-paging-row ul.page-numbers>li span {
    font-size: 16px!important;
    display: inline-block!important;
    box-sizing: content-box!important;
    padding-right: 5px!important;
    padding-left: 5px!important;
    min-width: 22px!important;
    height: 34px!important;
    color: #2d2a2a;
    line-height: 34px;
    transition: all .2s ease;
}
</style>

<!-- Add this code in function.php -->

function pagination($pages = '', $range = 4){  
  $showitems = ($range * 2)+1;  

  global $paged;
  if(empty($paged)) $paged = 1;

  if($pages == '')
  {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages)
    {
      $pages = 1;
    }
  }   

  if(1 != $pages)
  {
         // echo "<div class=\"pagination\">
         // <span>Page ".$paged." of ".$pages."</span>";         
    echo "<div class=\"woocommerce-pagination\"><ul class='page-numbers'>";

    echo '<li>';
    previous_posts_link('<span class="prev page-numbers">←</span>');
    echo '</li>';

    if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
    if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a></li>";

    for ($i=1; $i <= $pages; $i++)
    {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
      {
        echo ($paged == $i)? "<li><span class=\"page-numbers current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
      }
    }

    if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a></li>";  
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>Last &raquo;</a></li>";
    echo '<li>';
    next_posts_link('<span class="next page-numbers">←</span>');
    echo '</li>';
    echo "</ul></div>\n";
  }
}

<!-- end -->




<?php  


    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $mainarray = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 6,
        'paged'       => $paged,
    );
    $q = new WP_Query($mainarray); 
?>

    <div class="row custom-blog-main-wrapper">
        <?php while ($q->have_posts()) : $q->the_post(); ?>
        <div class="col-md-4 col-sm-6">
            <div class="blog-news-wrapper">
                <div class="blog-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()):
$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
?>
                        <img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">
                        <?php else: ?>
                        <img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="blog-content">
                    <p class="blog-date">
                        <?php echo get_the_date('M d Y'); ?>
                    </p>
                    <h3 class="blog-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="blog-inner">
                        <p class="blog-text">
                            <?php if(!empty(get_the_excerpt())){
                                echo strip_tags(substr(get_the_excerpt(), 0, 200));
                            }
                            else{
                                echo strip_tags(substr(get_the_content(), 0, 200));
                            } ?>
                        </p>
                        <div class="blog-btn">
                            <a href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php endwhile; ?>
		</div>
		
<div class="row custom-paging-row">
    <div class="col-md-12">
        <div class="text-center pagination">
            <?php if (function_exists("pagination")) {
                pagination($q->max_num_pages);
            } ?>
        </div>
    </div>
</div>


<?php wp_reset_postdata(); ?>


    
</body>
</html>