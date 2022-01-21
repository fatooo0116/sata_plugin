<?php 
/**
 * @snippet       Add Custom Field @ WooCommerce Checkout Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_action( 'woocommerce_before_order_notes', 'bbloomer_add_custom_checkout_field' );
  
function bbloomer_add_custom_checkout_field( $checkout ) { 
   $current_user = wp_get_current_user();
   $saved_license_no = $current_user->license_no;
   woocommerce_form_field( 'license_no', array(        
      'type' => 'text',        
      'class' => array( 'form-row-wide' ),        
      'label' => 'License Number',        
      'placeholder' => 'CA12345678',        
      'required' => true,        
      'default' => $saved_license_no,        
   ), $checkout->get_value( 'license_no' ) ); 
}