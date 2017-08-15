<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION

// add a product type
add_filter( 'product_type_selector', 'wdm_add_custom_product_type' );
function wdm_add_custom_product_type( $types ){
    $types[ 'wdm_custom_product' ] = __( 'Wdm Product' );
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
