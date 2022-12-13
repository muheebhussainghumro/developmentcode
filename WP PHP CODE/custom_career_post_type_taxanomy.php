<?php 

// shortcode

function cs_template_shortcode_wp( $atts ) {
    $atts = shortcode_atts( array(
        'page' => ''
    ), $atts );
    ob_start();
    get_template_part($atts['page']);
    return ob_get_clean();
}
add_shortcode( 'cs-template-name','cs_template_shortcode_wp' );


// CAREER POST TYPE
function career_custom_post_type() {

	$labels = array(
		'name'               => __( 'Career', 'text-domain' ),
		'singular_name'      => __( 'Career', 'text-domain' ),
		'add_new'            => _x( 'Add New Career', 'text-domain', 'text-domain' ),
		'add_new_item'       => __( 'Add New Career', 'text-domain' ),
		'edit_item'          => __( 'Edit Career', 'text-domain' ),
		'new_item'           => __( 'New Career', 'text-domain' ),
		'view_item'          => __( 'View Career', 'text-domain' ),
		'search_items'       => __( 'Search Career', 'text-domain' ),
		'not_found'          => __( 'No Career found', 'text-domain' ),
		'not_found_in_trash' => __( 'No Career found in Trash', 'text-domain' ),
		'parent_item_colon'  => __( 'Parent Career:', 'text-domain' ),
		'menu_name'          => __( 'Career', 'text-domain' ),
	);
	
	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-awards',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'trackbacks',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		),
	);
	
	register_post_type( 'career', $args );
	}
	
	add_action( 'init', 'career_custom_post_type' );
	
	// Create Custom Taxonomy (Cateogry)
	function career_custom_taxonomy() {
	
		$labels = array(
			'name'                  => _x( 'Career Taxonomy', 'Taxonomy Career Taxonomy', 'text-domain' ),
			'singular_name'         => _x( 'Career Taxonomy', 'Taxonomy Career Taxonomy', 'text-domain' ),
			'search_items'          => __( 'Search Career Taxonomy', 'text-domain' ),
			'popular_items'         => __( 'Popular Career Taxonomy', 'text-domain' ),
			'all_items'             => __( 'All Career Taxonomy', 'text-domain' ),
			'parent_item'           => __( 'Parent Career Taxonomy', 'text-domain' ),
			'parent_item_colon'     => __( 'Parent Career Taxonomy', 'text-domain' ),
			'edit_item'             => __( 'Edit Career Taxonomy', 'text-domain' ),
			'update_item'           => __( 'Update Career Taxonomy', 'text-domain' ),
			'add_new_item'          => __( 'Add New Career Taxonomy', 'text-domain' ),
			'new_item_name'         => __( 'New Career Taxonomy Name', 'text-domain' ),
			'add_or_remove_items'   => __( 'Add or remove Career Taxonomy', 'text-domain' ),
			'choose_from_most_used' => __( 'Choose from most used Career Taxonomy', 'text-domain' ),
			'menu_name'             => __( 'Career Taxonomy', 'text-domain' ),
		);
	
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'show_tagcloud'     => true,
			'show_ui'           => true,
			'query_var'         => true,
			'rewrite'           => true,
			'query_var'         => true,
			'capabilities'      => array(),
		);
	
		register_taxonomy( 'career-taxonomy', array( 'career' ), $args );
	}
	
	add_action( 'init', 'career_custom_taxonomy' );

// --------------------
if( ! class_exists( 'Showcase_Taxonomy_Images' ) ) {
  
	class Showcase_Taxonomy_Images {
   
		public function __construct() {}
    
		/**
     	* Initialize the class and start calling our hooks and filters
     	*/
		public function init() {

			add_action( 'career-taxonomy_add_form_fields', array( $this, 'add_category_image' ), 10, 2 );
			add_action( 'created_career-taxonomy', array( $this, 'save_category_image' ), 10, 2 );
			add_action( 'career-taxonomy_edit_form_fields', array( $this, 'update_category_image' ), 10, 2 );
			add_action( 'edited_career-taxonomy', array( $this, 'updated_category_image' ), 10, 2 );
			
			add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
			add_action( 'admin_footer', array( $this, 'add_script' ) );
		
		}

		public function load_media() {
		
			if( $_GET['taxonomy'] != 'career-taxonomy') {
				return;
			}
		
			wp_enqueue_media();
		}

		/**
		* Add a form field in the new category page
		* @since 1.0.0
		*/
		public function add_category_image( $taxonomy ) { ?>

			<div class="form-field term-group">
				<label for="developer_image_id"><?php _e( 'Image', 'showcase' ); ?></label>
				<input type="hidden" id="developer_image_id" name="developer_image_id" class="custom_media_url" value="">
				<div id="category-image-wrapper"></div>
				<p>
					<input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
					<input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
				</p>
			</div>
   		<?php 
		}

		/**
		* Save the form field
		* @since 1.0.0
		*/
		public function save_category_image( $term_id, $tt_id ) {
			if( isset( $_POST['developer_image_id'] ) && '' !== $_POST['developer_image_id'] ){
				add_term_meta( $term_id, 'category_image', absint( $_POST['developer_image_id'] ), true );
			}
		}

		/**
		 * Edit the form field
		 * @since 1.0.0
		 */
		public function update_category_image( $term, $taxonomy ) { ?>
			<tr class="form-field term-group-wrap">
				<th scope="row">
					<label for="developer_image_id"><?php _e( 'Image', 'showcase' ); ?></label>
				</th>
				<td>
					<?php $image_id = get_term_meta( $term->term_id, 'category_image', true ); ?>
					<input type="hidden" id="developer_image_id" name="developer_image_id" value="<?php echo esc_attr( $image_id ); ?>">
					<div id="category-image-wrapper">
						<?php if( $image_id ) { ?>
						<?php echo wp_get_attachment_image( $image_id, 'medium' ); ?>
						<?php } ?>
					</div>
					<p>
						<input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
						<input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
					</p>
				</td>
			</tr>
		<?php }

		/**
		* Update the form field value
		* @since 1.0.0
		*/
   		public function updated_category_image( $term_id, $tt_id ) {

			if( isset( $_POST['developer_image_id'] ) && '' !== $_POST['developer_image_id'] )
			{
				update_term_meta( $term_id, 'category_image', absint( $_POST['developer_image_id'] ) );
			} 
			else 
			{
				update_term_meta( $term_id, 'category_image', '' );
			}
  		}
		
		 /**
		* Enqueue styles and scripts
		* @since 1.0.0
		*/
   		public function add_script() {
			
			if(!isset( $_GET['taxonomy'] )) {
				return;
			}?>

     		<script type="text/javascript"> 
				jQuery(document).ready( function($) {
				
					_wpMediaViewsL10n.insertIntoPost = '<?php //_e( "Insert", "showcase" ); ?>';
					
					function ct_media_upload(button_class) {
						var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;
						jQuery('body').on('click', button_class, function(e) {
							var button_id = '#'+jQuery(this).attr('id');
							var send_attachment_bkp = wp.media.editor.send.attachment;
							var button = jQuery(button_id);
							_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
								if( _custom_media ) 
								{
									jQuery('#developer_image_id').val(attachment.id);
									jQuery('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
									jQuery( '#category-image-wrapper .custom_media_image' ).attr( 'src',attachment.url ).css( 'display','block' );
								} 
								else 
								{
									return _orig_send_attachment.apply( button_id, [props, attachment] );
								}
							}
           					wp.media.editor.open(button); return false;
        				});
       				}
       				ct_media_upload('.showcase_tax_media_button.button');
					jQuery('body').on('click','.showcase_tax_media_remove',function(){
						jQuery('#developer_image_id').val('');
						jQuery('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
					});
       				// Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
					jQuery(document).ajaxComplete(function(event, xhr, settings) {
						var queryStringArr = settings.data.split('&');
						if( jQuery.inArray('action=add-tag', queryStringArr) !== -1 ){
							var xml = xhr.responseXML;
							$response = jQuery(xml).find('term_id').text();
							if($response!=""){
								// Clear the thumb image
								jQuery('#category-image-wrapper').html('');
							}
						}
					});
      			});
    		</script>
   		<?php }

	}

	$Showcase_Taxonomy_Images = new Showcase_Taxonomy_Images();
	$Showcase_Taxonomy_Images->init();

}
	
?>


<?php
	
// Add Image Functionaltiy Into Taxonomy (Catgory)
if( ! class_exists( 'Showcase_Taxonomy_Images' ) ) {
	
	class Showcase_Taxonomy_Images {
	
		public function __construct() {}
	
		/**
		 * Initialize the class and start calling our hooks and filters
		 */
		public function init() {

			add_action( 'career-taxonomy_add_form_fields', array( $this, 'add_category_image' ), 10, 2 );
			add_action( 'created_career-taxonomy', array( $this, 'save_category_image' ), 10, 2 );
			add_action( 'career-taxonomy_edit_form_fields', array( $this, 'update_category_image' ), 10, 2 );
			add_action( 'edited_career-taxonomy', array( $this, 'updated_category_image' ), 10, 2 );
			
			add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
			add_action( 'admin_footer', array( $this, 'add_script' ) );
		
		}

		public function load_media() {
		
			if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'developer' || $_GET['taxonomy'] != 'development') {
				return;
			}
		
			wp_enqueue_media();
		}

		/**
		* Add a form field in the new category page
		* @since 1.0.0
		*/
		public function add_category_image( $taxonomy ) { ?>

			<div class="form-field term-group">
				<label for="developer_image_id"><?php _e( 'Image', 'showcase' ); ?></label>
				<input type="hidden" id="developer_image_id" name="developer_image_id" class="custom_media_url" value="">
				<div id="category-image-wrapper"></div>
				<p>
					<input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
					<input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
				</p>
			</div>
			<?php 
		}

		/**
		* Save the form field
		* @since 1.0.0
		*/
		public function save_category_image( $term_id, $tt_id ) {
			if( isset( $_POST['developer_image_id'] ) && '' !== $_POST['developer_image_id'] ){
				add_term_meta( $term_id, 'category_image', absint( $_POST['developer_image_id'] ), true );
			}
		}

		/**
		 * Edit the form field
		 * @since 1.0.0
		 */
		public function update_category_image( $term, $taxonomy ) { ?>
			<tr class="form-field term-group-wrap">
				<th scope="row">
					<label for="developer_image_id"><?php _e( 'Image', 'showcase' ); ?></label>
				</th>
				<td>
					<?php $image_id = get_term_meta( $term->term_id, 'category_image', true ); ?>
					<input type="hidden" id="developer_image_id" name="developer_image_id" value="<?php echo esc_attr( $image_id ); ?>">
					<div id="category-image-wrapper">
						<?php if( $image_id ) { ?>
						<?php echo wp_get_attachment_image( $image_id, 'medium' ); ?>
						<?php } ?>
					</div>
					<p>
						<input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
						<input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
					</p>
				</td>
			</tr>
		<?php }

		/**
		* Update the form field value
		* @since 1.0.0
		*/
			public function updated_category_image( $term_id, $tt_id ) {

			if( isset( $_POST['developer_image_id'] ) && '' !== $_POST['developer_image_id'] )
			{
				update_term_meta( $term_id, 'category_image', absint( $_POST['developer_image_id'] ) );
			} 
			else 
			{
				update_term_meta( $term_id, 'category_image', '' );
			}
			}
		
			/**
		* Enqueue styles and scripts
		* @since 1.0.0
		*/
			public function add_script() {
			
			if(!isset( $_GET['taxonomy'] )) {
				return;
			}?>

				<script type="text/javascript"> 
				jQuery(document).ready( function($) {
				
					_wpMediaViewsL10n.insertIntoPost = '<?php _e( "Insert", "showcase" ); ?>';
					
					function ct_media_upload(button_class) {
						var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;
						$('body').on('click', button_class, function(e) {
							var button_id = '#'+$(this).attr('id');
							var send_attachment_bkp = wp.media.editor.send.attachment;
							var button = $(button_id);
							_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
								if( _custom_media ) 
								{
									$('#developer_image_id').val(attachment.id);
									$('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
									$( '#category-image-wrapper .custom_media_image' ).attr( 'src',attachment.url ).css( 'display','block' );
								} 
								else 
								{
									return _orig_send_attachment.apply( button_id, [props, attachment] );
								}
							}
								wp.media.editor.open(button); return false;
						});
						}
						ct_media_upload('.showcase_tax_media_button.button');
					$('body').on('click','.showcase_tax_media_remove',function(){
						$('#developer_image_id').val('');
						$('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
					});
						// Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
					$(document).ajaxComplete(function(event, xhr, settings) {
						var queryStringArr = settings.data.split('&');
						if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
							var xml = xhr.responseXML;
							$response = $(xml).find('term_id').text();
							if($response!=""){
								// Clear the thumb image
								$('#category-image-wrapper').html('');
							}
						}
					});
					});
			</script>
			<?php }

	}

	$Showcase_Taxonomy_Images = new Showcase_Taxonomy_Images();
	$Showcase_Taxonomy_Images->init();

}

?>

<!-- <a href="#" class="custom-tax-box" data-id="SLUG"></a> -->

<!-- Taxonomy (Category) Loop -->

<!-- Print Custom Taxonomy On Page -->
<?php $terms = get_terms(array('taxonomy'   => 'career_taxonomy', 'hide_empty' => false, 'parent' => 0,)); ?>

<?php if ( ! empty( $terms ) && is_array( $terms ) ): ?> 
    
    <!-- Loop Through Each Taxonomy -->
    <?php foreach ( $terms as $term ): ?>
    
    <!-- Print Taxonomy's Custom Added Image -->
    <?php 
        $image_id = get_term_meta( $term->term_id, 'category_image', true ); 
        echo wp_get_attachment_image($image_id); 
    ?>

	<!-- print custom taxonomy image -->
	<?php
	$image_id = get_term_meta( $term->term_id, 'category_image', true ); 
	*      echo wp_get_attachment_image($image_id); 
	?>
    <!-- Get Taxonomy's Permalink -->
    <?php echo esc_url( get_term_link( $term ) ); ?>
    
    <!-- Get Taxonomy's Name -->
    <?php echo $term->name; ?>

	<!-- Get Taxonomy's Post Count -->
	<?php echo $term->count; ?>

	<!-- Get Taxonomy's Slug -->
	<?php echo $term->slug; ?>

    <?php endforeach; ?>

<?php endif; ?>




<div class="row career-tax-row">
	<div class="col-md-6 col-lg-6 career-tax-col">
		<div class="custom-career-tax-box">
		<div class="career-tax-icon">
			<?php 
			$image_id = get_term_meta( $term->term_id, 'category_image', true ); 
			echo wp_get_attachment_image($image_id); 
			?>
		</div>
		<div class="career-tax-title">
			<h4><?php echo $term->name; ?></h4>
		</div>
		</div>	
	</div>
</div>
