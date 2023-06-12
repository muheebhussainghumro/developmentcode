function cs_template_shortcode_wp( $atts ) {
    $atts = shortcode_atts( array(
        'page' => ''
    ), $atts );
    ob_start();
    get_template_part($atts['page']);
    return ob_get_clean();
}
add_shortcode( 'cs-template-name','cs_template_shortcode_wp' );




[cs-template-name page="template_blog"]