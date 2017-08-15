<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION

// add a product type
add_filter( 'product_type_selector', 'wdm_add_custom_product_type' );
function wdm_add_custom_product_type( $types ){
    $types[ 'wdm_custom_product' ] = __( 'Nuevo Producto' );
    return $types;
}

add_action( 'plugins_loaded', 'wdm_create_custom_product_type' );
function wdm_create_custom_product_type(){
     // declare the product class
     class WC_Product_Wdm extends WC_Product{
        public function __construct( $product ) {
           $this->product_type = 'wdm_custom_product';
           parent::__construct( $product );
           // add additional functions here
        }
    }
}

// add the settings under ‘General’ sub-menu
add_action( 'woocommerce_product_options_general_product_data', 'wdm_add_custom_settings' );
function wdm_add_custom_settings() {
    global $woocommerce, $post;
    echo '<div class="options_group">';

    // Create a number field, for example for UPC
    woocommerce_wp_text_input(
      array(
       'id'                => 'wdm_upc_field',
       'label'             => __( 'UPC', 'woocommerce' ),
       'placeholder'       => '',
       'desc_tip'    => 'true',
       'description'       => __( 'Enter Unique Product Code.', 'woocommerce' ),
       'type'              => 'number'
       ));

    // Create a checkbox for product purchase status
      woocommerce_wp_checkbox(
       array(
       'id'            => 'wdm_is_purchasable',
       'label'         => __('Is Purchasable', 'woocommerce' )
       ));

    echo '</div>';
}

add_action( 'woocommerce_process_product_meta', 'wdm_save_custom_settings' );
function wdm_save_custom_settings( $post_id ){
// save UPC field
$wdm_product_upc = $_POST['wdm_upc_field'];
if( !empty( $wdm_product_upc ) )
update_post_meta( $post_id, 'wdm_upc_field', esc_attr( $wdm_product_upc) );

// save purchasable option
$wdm_purchasable = isset( $_POST['wdm_is_purchasable'] ) ? 'yes' : 'no';
update_post_meta( $post_id, 'wdm_is_purchasable', $wdm_purchasable );
}

// to use the field values just use get_post_meta, and you are good to go!







/// ESTE CÓDIGO ES DE JEROEN http://jeroensormani.com/adding-a-custom-woocommerce-product-type/  ///

/**
 * Register the custom product type after init
 */
function register_simple_rental_product_type() {

	/**
	 * This should be in its own separate file.
	 */
	class WC_Product_Simple_Rental extends WC_Product_Simple {

		public function __construct( $product ) {

			$this->product_type = 'simple_rental';

			parent::__construct( $product );

		}

	}

}
add_action( 'init', 'register_simple_rental_product_type' );

function add_simple_rental_product( $types ){

	// Key should be exactly the same as in the class product_type parameter
	$types[ 'simple_rental' ] = __( 'Simple Rental' );

	return $types;

}
add_filter( 'product_type_selector', 'add_simple_rental_product' );

/**
 * Show pricing fields for simple_rental product.
 */
function simple_rental_custom_js() {

	if ( 'product' != get_post_type() ) :
		return;
	endif;

	?><script type='text/javascript'>
		jQuery( document ).ready( function() {
			jQuery( '.options_group.pricing' ).addClass( 'show_if_simple_rental' ).show();
		});
	</script><?php
}
add_action( 'admin_footer', 'simple_rental_custom_js' );

<?php
/**
 * Add a custom product tab.
 */
function custom_product_tabs( $tabs) {
	$tabs['rental'] = array(
		'label'		=> __( 'Rental', 'woocommerce' ),
		'target'	=> 'rental_options',
		'class'		=> array( 'show_if_simple_rental', 'show_if_variable_rental'  ),
	);
	return $tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'custom_product_tabs' );
/**
 * Contents of the rental options product tab.
 */
function rental_options_product_tab_content() {
	global $post;
	?><div id='rental_options' class='panel woocommerce_options_panel'><?php
		?><div class='options_group'><?php
			woocommerce_wp_checkbox( array(
				'id' 		=> '_enable_option',
				'label' 	=> __( 'Enable rental option X', 'woocommerce' ),
			) );
			woocommerce_wp_text_input( array(
				'id'			=> '_text_input_y',
				'label'			=> __( 'What is the value of Y', 'woocommerce' ),
				'desc_tip'		=> 'true',
				'description'	=> __( 'A handy description field', 'woocommerce' ),
				'type' 			=> 'text',
			) );
		?></div>

	</div><?php
}
add_action( 'woocommerce_product_data_panels', 'rental_options_product_tab_content' );
/**
 * Save the custom fields.
 */
function save_rental_option_field( $post_id ) {
	
	$rental_option = isset( $_POST['_enable_renta_option'] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_enable_renta_option', $rental_option );
	
	if ( isset( $_POST['_text_input_y'] ) ) :
		update_post_meta( $post_id, '_text_input_y', sanitize_text_field( $_POST['_text_input_y'] ) );
	endif;
	
}
add_action( 'woocommerce_process_product_meta_simple_rental', 'save_rental_option_field'  );
add_action( 'woocommerce_process_product_meta_variable_rental', 'save_rental_option_field'  );



