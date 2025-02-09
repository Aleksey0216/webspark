<?php
/*
Plugin Name: WP My Product Webspark
Description: Custom plugin for managing products in WooCommerce via My Account.
Version: 1.0
Author: Webspark
*/

//Included CSS styles.
function my_product_styles() {
	wp_enqueue_style( 'my-product-css', plugin_dir_url( __FILE__ ) . 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_product_styles' );

//Added new menu items.
add_filter( 'woocommerce_account_menu_items', function ( $items ) {
	$items['add-product'] = 'Add product';
	$items['my-products'] = 'My products';
	return $items;
} );

//Added custom endpoints.
add_action( 'init', function () {
	add_rewrite_endpoint( 'add-product', EP_ROOT | EP_PAGES );
	add_rewrite_endpoint( 'my-products', EP_ROOT | EP_PAGES );

	//Custom rewrite rules from pagination page "my-products".
	add_rewrite_rule(
		'^my-account/my-products/page/([0-9]+)/?$',
		'index.php?pagename=my-account&my-products=1&paged=$matches[1]',
		'top'
	);
} );

//Included template for the page "add-product".
add_action( 'woocommerce_account_add-product_endpoint', function () {
	include plugin_dir_path( __FILE__ ) . 'templates/myaccount/add-product.php';
} );

//Included template for the page "my-products".
add_action( 'woocommerce_account_my-products_endpoint', function () {
	include plugin_dir_path( __FILE__ ) . 'templates/myaccount/my-products.php';
} );



