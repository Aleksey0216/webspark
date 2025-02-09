<?php
//Check for direct connection.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!--Submission form-->
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
//Check if the form is submitted.
if ( isset( $_POST['submit_product'] ) ) {

	//Preparing data for post insertion.
	$post_data = [
		'post_title'   => sanitize_text_field( $_POST['product_name'] ),
		'post_content' => wp_kses_post( $_POST['product_description'] ),
		'post_status'  => 'pending',
		'post_type'    => 'product',
	];

	//Inserting a post into the database.
	$product_id = wp_insert_post( $post_data );

	//Inserting data into a product if it has been created.
	if ( $product_id ) {
		$product = new WC_Product_Simple( $product_id );

		$product->set_name( sanitize_text_field( $_POST['product_name'] ) );
		$product->set_regular_price( floatval( $_POST['product_price'] ) );
		$product->set_stock_quantity( intval( $_POST['product_quantity'] ) );
		$product->set_manage_stock( true );
		$product->set_status( 'pending' );

		//Saving product.
		$product->save();

		//Set post image.
		if ( ! empty( $_FILES['product_image']['name'] ) ) {
			require_once ABSPATH . 'wp-admin/includes/image.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/media.php';

			$attach_id = media_handle_upload( 'product_image', $product_id );
			if ( ! is_wp_error( $attach_id ) ) {
				set_post_thumbnail( $product_id, $attach_id );
			}
		}

		//Enable sending emails.
		$enable_email = get_option( 'enable_product_email', 'yes' );

		if ( $enable_email === 'yes' ) {
			//Receiving data to send a message.
			$admin_email      = get_option( 'admin_email' );
			$product_name     = sanitize_text_field( $_POST['product_name'] );
			$author_id        = get_current_user_id();
			$author_url       = admin_url( "user-edit.php?user_id=$author_id" );
			$edit_product_url = admin_url( "post.php?post=$product_id&action=edit" );

			//Info in message.
			$subject = "Новий товар: $product_name";
			$message = "
                <a href='$author_url'>Переглянути автора товару</a><br>
                <a href='$edit_product_url'>Редагувати товар</a>
            ";

			//Sending message.
			wp_mail( $admin_email, $subject, $message );
		}
	}
}
?>

