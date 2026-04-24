<?php
/**
 * The template for displaying portfolio widget.
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-portfolio.php.
 *
 * HOWEVER, on occasion SufficeToolkit will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     http://docs.themegrill.com/suffice-toolkit/template-structure/
 * @author  ThemeGrill
 * @package SufficeToolkit/Templates
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$suffice_toolkit_categories = isset( $instance['categories'] ) ? $instance['categories'] : '';
$suffice_toolkit_number     = isset( $instance['number'] ) ? absint( $instance['number'] ) : 0;
$suffice_toolkit_filter     = ! empty( $instance['filter'] );
$suffice_toolkit_style      = isset( $instance['style'] ) ? $instance['style'] : 'portfolio-with-text';
$suffice_toolkit_column     = isset( $instance['column'] ) ? $instance['column'] : '4';
?>

<div class="portfolio-container">

	<?php if ( $suffice_toolkit_filter && empty( $suffice_toolkit_categories ) ) : ?>
		<?php
		$suffice_toolkit_terms = get_terms(
			array(
				'taxonomy' => 'portfolio_cat',
			)
		);
		?>

		<nav class="portfolio-navigation portfolio-navigation-normal portfolio-navigation-center">
			<ul class="navigation-portfolio">
				<li class="active">
					<a data-filter="*"><?php echo esc_html__( 'All', 'suffice-toolkit' ); ?></a>
				</li>

				<?php if ( ! is_wp_error( $suffice_toolkit_terms ) && ! empty( $suffice_toolkit_terms ) ) : ?>
					<?php foreach ( $suffice_toolkit_terms as $suffice_toolkit_term ) : ?>
						<li>
							<a data-filter=".<?php echo esc_attr( $suffice_toolkit_term->slug ); ?>">
								<?php echo esc_html( $suffice_toolkit_term->name ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</nav>
	<?php endif; ?>

	<?php
	$suffice_toolkit_included_terms = array();

	if ( '0' === $suffice_toolkit_categories ) {
		$suffice_toolkit_terms = get_terms(
			array(
				'taxonomy' => 'portfolio_cat',
			)
		);

		if ( ! is_wp_error( $suffice_toolkit_terms ) ) {
			$suffice_toolkit_included_terms = wp_list_pluck( $suffice_toolkit_terms, 'term_id' );
		}
	} else {
		$suffice_toolkit_included_terms = (array) $suffice_toolkit_categories;
	}
	?>

	<ul class="portfolio-items row <?php echo esc_attr( $suffice_toolkit_style ); ?>">

		<?php
		$suffice_toolkit_query = new WP_Query(
			array(
				'post_type'      => 'portfolio',
				'posts_per_page' => $suffice_toolkit_number,
				'tax_query'      => array(
					array(
						'taxonomy' => 'portfolio_cat',
						'field'    => 'id',
						'terms'    => $suffice_toolkit_included_terms,
					),
				),
			)
		);

		if ( $suffice_toolkit_query->have_posts() ) :

			while ( $suffice_toolkit_query->have_posts() ) :
				$suffice_toolkit_query->the_post();

				$post_id               = get_the_ID();
				$suffice_toolkit_terms = get_the_terms( $post_id, 'portfolio_cat' );

				$suffice_toolkit_term_string = '';

				if ( ! empty( $suffice_toolkit_terms ) && ! is_wp_error( $suffice_toolkit_terms ) ) {
					foreach ( $suffice_toolkit_terms as $suffice_toolkit_term ) {
						$suffice_toolkit_term_string .= $suffice_toolkit_term->slug . ' ';
					}
				}

				if ( has_post_thumbnail() ) :
					$suffice_toolkit_link = get_the_permalink();
					?>

					<li class="portfolio-item <?php echo esc_attr( suffice_get_column_class( $suffice_toolkit_column ) ); ?> <?php echo esc_attr( $suffice_toolkit_term_string ); ?>"
						data-category="<?php echo esc_attr( $suffice_toolkit_term_string ); ?>">

						<figure class="portfolio-item-thumbnail">
							<a href="<?php echo esc_url( $suffice_toolkit_link ); ?>">
								<?php
								echo get_the_post_thumbnail(
									$post_id,
									( 0 === $suffice_toolkit_query->current_post % 2 && 'portfolio-masonry' === $suffice_toolkit_style )
										? 'suffice-thumbnail-portfolio-masonry'
										: 'suffice-thumbnail-portfolio'
								);
								?>
							</a>

							<figcaption class="portfolio-item-description">
								<h5 class="portfolio-item-title">
									<a href="<?php echo esc_url( $suffice_toolkit_link ); ?>">
										<?php echo esc_html( get_the_title() ); ?>
									</a>
								</h5>

								<span class="portfolio-item-categories">
									<?php echo wp_kses_post( suffice_get_terms_list( $post_id, 'portfolio_cat' ) ); ?>
								</span>
							</figcaption>

						</figure>
					</li>

				<?php endif; ?>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

	</ul>

</div>
