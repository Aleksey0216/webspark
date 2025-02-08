<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$current_user = wp_get_current_user();
$args         = [
	'post_type'     => 'product',
	'post_status'   => [ 'pending', 'publish' ],
	'author'        => get_current_user_id(),
	'post_per_page' => 5,
	'paged'         => 1,
];

$products = get_posts( $args );
?>

<?php if ( ! empty( $products ) ) : ?>
    <table>
        <tr>
            <th>Назва</th>
            <th>Кількість</th>
            <th>Ціна</th>
            <th>Статус</th>
            <th>Редагувати</th>
            <th>Видалити</th>
        </tr>
		<?php foreach ( $products as $post ) :
			$product = wc_get_product( $post->ID );

			if ( ! $product ) {
				continue;
			}
			?>
            <tr>
                <td><?php echo esc_html( $product->get_name() ); ?></td>
                <td>
					<?php
					echo $product->get_manage_stock() ? intval( $product->get_stock_quantity() ) : 'not defined';
					?>
                </td>
                <td><?php echo esc_html( $product->get_regular_price() ); ?> $</td>
                <td><?php echo esc_html( get_post_status( $post->ID ) ); ?></td>
                <td><a href="<?php echo esc_url( get_edit_post_link( $post->ID ) ); ?>">Редагувати</a></td>
                <td>
                    <a href="<?php echo esc_url( get_delete_post_link( $post->ID, '', true ) ); ?>"
                       onclick="return confirm('Ви впевнені?');">
                        Видалити
                    </a>
                </td>
            </tr>
		<?php endforeach; ?>
    </table>
<?php else : ?>
    <p>Немає товарів.</p>
<?php endif; ?>
