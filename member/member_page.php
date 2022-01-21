  

<?php
function bbloomer_add_custom_endpoint() {
    add_rewrite_endpoint( 'membership', EP_ROOT | EP_PAGES );
}
  
add_action( 'init', 'bbloomer_add_custom_endpoint' );
  
  
  
function bbloomer_membership_query_vars( $vars ) {
    $vars[] = 'membership';
    return $vars;
}
  
add_filter( 'query_vars', 'bbloomer_membership_query_vars', 0 );
  
  
function bbloomer_add_membership_link_my_account( $items ) {
    $items['membership'] = 'Membership';
    return $items;
}
  
add_filter( 'woocommerce_account_menu_items', 'bbloomer_add_membership_link_my_account' );
  
  
function bbloomer_membership_content() {
    echo '<h3>Membership Custom Tab </h3><p>Welcome to the Membership area.</p>';
    //echo do_shortcode( ' /* your shortcode here */ ' );
}
  
add_action( 'woocommerce_account_membership_endpoint', 'bbloomer_membership_content' );