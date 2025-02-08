<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form method="post" enctype="multipart/form-data">
    <label for="product_name">Назва товару:</label>
    <input type="text" id="product_name" name="product_name" required>

    <label for="product_price">Ціна:</label>
    <input type="number" id="product_price" name="product_price" step="0.01" required>

    <label for="product_quantity">Кількість:</label>
    <input type="number" id="product_quantity" name="product_quantity" required>

    <label for="product_description">Опис:</label>
	<?php wp_editor( '', 'product_description', [ 'textarea_name' => 'product_description' ] ); ?>

    <label for="product_image">Зображення:</label>
    <input type="file" id="product_image" name="product_image">

    <button type="submit" name="submit_product">Додати товар</button>
</form>
<?php
if ( isset( $_POST['submit_product'] ) ) {

	$post_data = [
		'post_title'   => sanitize_text_field( $_POST['product_name'] ),
		'post_content' => wp_kses_post( $_POST['product_description'] ),
		'post_status'  => 'pending',
		'post_type'    => 'product',
	];

	$product_id = wp_insert_post( $post_data );

	if ( $product_id ) {
		$product = new WC_Product_Simple( $product_id );

		$product->set_name( sanitize_text_field( $_POST['product_name'] ) );
		$product->set_regular_price( floatval( $_POST['product_price'] ) );
		$product->set_stock_quantity( intval( $_POST['product_quantity'] ) );
		$product->set_manage_stock( true );
		$product->set_status( 'pending' );

		$product->save();

		if ( ! empty( $_FILES['product_image']['name'] ) ) {
			require_once ABSPATH . 'wp-admin/includes/image.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/media.php';

			$attach_id = media_handle_upload( 'product_image', $product_id );
			if ( ! is_wp_error( $attach_id ) ) {
				set_post_thumbnail( $product_id, $attach_id );
			}
		}
    }
}



