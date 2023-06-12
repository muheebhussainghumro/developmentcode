<?php get_header(); ?>
<div class="container">
	<div class="row main-row">
		<div class="col-md-12">

			<div class="title_tag">
				<h3>
					Product Rental
				</h3>
			</div>
		</div>
	</div>
<?php while (have_posts()) : the_post(); ?>
<div class="single-product-wrapper">
	<div class="row single-product-inner">
		<div class="col-md-12 col-xl-5 single-product-img-col">
			<div class="img_wrraper">
				<?php if (has_post_thumbnail()):  
					$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'large', true);
				?>
					<img src="<?php echo $thumbnail[0]; ?>" alt="Picture" class="featured-image">			
				<?php else: ?>
					<img src="<?php echo site_url('PATH'); ?>" alt="Picture" class="featured-image">
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-12 col-xl-7 single-product-content-col">
			<div class="single-product-content-wrapper">
				<div class="single-product-price">
					<?php $product = wc_get_product( get_the_ID() ); ?>
				<span><?php if( !empty( $product->get_price() ) ): echo $product->get_price(); else: echo '$0.00'; endif; ?></span>
					</div>
				<div class="single-product-title">
				    <h4><?php the_title(); ?></h4>
					</div>
				<div class="single-product-content">
					<?php the_content(); ?>
				</div>
				<div class="single-product-btn">
					<a href="/online-booking">Contact Us</a>
				</div>    
			</div>
		</div>
	</div>
</div>
<?php endwhile; ?>
	</div>
<?php get_footer(); ?>
