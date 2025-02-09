<?php
//Check for direct connection.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Get the current page number for pagination.
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

//Setting query parameters to retrieve the current user's products.
$args = [
	'post_type'      => 'product',
	'post_status'    => [ 'pending', 'publish' ],
	'author'         => get_current_user_id(),
	'posts_per_page' => 5,
	'paged'          => $paged,
];

$the_query = new WP_Query( $args );
?>

<?php if ( $the_query->have_posts() ) : ?>
    <table>
        <tr>
            <th>Назва</th>
            <th>Кількість</th>
            <th>Ціна</th>
            <th>Статус</th>
            <th>Редагувати</th>
            <th>Видалити</th>
        </tr>
        <!--Sort through the products.-->
		<?php while ( $the_query->have_posts() ) :
			//Get the WooCommerce product object.
			$the_query->the_post();
			$product = wc_get_product( get_the_ID() );

			if (!$product ) {
				continue;
			}
			?>
            <!--Product display.-->
            <tr>
                <td><?php echo esc_html( $product->get_name() ); ?></td>
                <td>
					<?php
					echo $product->get_manage_stock() ? intval( $product->get_stock_quantity() ) : 'not defined';
					?>
                </td>
                <td><?php echo esc_html( $product->get_regular_price() ); ?> $</td>
                <td><?php echo esc_html( get_post_status( get_the_ID() ) ); ?></td>
                <td><a href="<?php echo esc_url( get_edit_post_link( get_the_ID() ) ); ?>">Редагувати</a></td>
                <td>
                    <a href="<?php echo esc_url( get_delete_post_link( get_the_ID(), '', true ) ); ?>"
                       onclick="return confirm('Ви впевнені?');">
                        Видалити
                    </a>
                </td>
            </tr>
		<?php endwhile; ?>
    </table>

    <!--Pagination-->
    <div class="pagination">
		<?php
        //Displaying pagination page links.
		echo paginate_links( [
			'total'     => $the_query->max_num_pages,
			'current'   => $paged,
			'format'    => '?paged=%#%',
			'prev_text' => __( 'Previous' ),
			'next_text' => __( 'Next' ),
		] );
		?>
    </div>

<?php else : ?>
    <p>Немає товарів.</p>
<?php endif;

//Reset post data.
wp_reset_postdata();
?>
