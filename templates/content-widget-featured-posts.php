<?php
/**
 * The template for displaying blog widget.
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-blog.php.
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

$suffice_toolkit_source   = isset( $instance['source'] ) ? $instance['source'] : 'latest';
$suffice_toolkit_category = isset( $instance['category'] ) ? $instance['category'] : '';
$suffice_toolkit_style    = isset( $instance['style'] ) ? $instance['style'] : 'feature-post-style-one';

// Image Size.
$suffice_toolkit_image_size = '';
if ( 'feature-post-style-one' === $suffice_toolkit_style ) {
	$suffice_toolkit_image_size = 'suffice-thumbnail-featured-one';
} elseif ( 'feature-post-style-two' === $suffice_toolkit_style ) {
	$suffice_toolkit_image_size = 'suffice-thumbnail-post-large';
} else {
	$suffice_toolkit_image_size = 'suffice-thumbnail-post-large';
}

// Number.
$suffice_toolkit_post_number = '';
if ( 'feature-post-style-one' === $suffice_toolkit_style ) {
	$suffice_toolkit_post_number = 4;
} elseif ( 'feature-post-style-two' === $suffice_toolkit_style ) {
	$suffice_toolkit_post_number = 4;
} else {
	$suffice_toolkit_post_number = 6;
}

// Row class.
$suffice_toolkit_row_class = 'row';
if ( 'feature-post-style-one' === $suffice_toolkit_style ) {
	$suffice_toolkit_row_class = 'row no-gutter';
} elseif ( 'feature-post-style-two' === $suffice_toolkit_style ) {
	$suffice_toolkit_row_class = 'no-row';
}

// Featured post class.
$suffice_toolkit_feature_post_class = '';
if ( 'feature-post-style-one' === $suffice_toolkit_style ) {
	$suffice_toolkit_feature_post_class = 'col-md-3';
} elseif ( 'feature-post-style-three' === $suffice_toolkit_style ) {
	$suffice_toolkit_feature_post_class = 'col-md-4';
}

if ( 'latest' === $suffice_toolkit_source ) {
	$suffice_toolkit_get_featured_posts = new WP_Query(
		array(
			'posts_per_page'      => $suffice_toolkit_post_number,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
		)
	);
} else {
	$suffice_toolkit_get_featured_posts = new WP_Query(
		array(
			'posts_per_page' => $suffice_toolkit_post_number,
			'post_type'      => 'post',
			'category__in'   => $suffice_toolkit_category,
		)
	);
}
?>

<div class="featured-post-container <?php echo esc_attr( $suffice_toolkit_style ); ?>">
	<div class="<?php echo esc_attr( $suffice_toolkit_row_class ); ?>">
		<?php
		while ( $suffice_toolkit_get_featured_posts->have_posts() ) :
			$suffice_toolkit_get_featured_posts->the_post();
			?>

			<?php if ( 1 === $suffice_toolkit_get_featured_posts->current_post && 'feature-post-style-two' === $suffice_toolkit_style ) : ?>
			<div class="feature-post-grid-container">
		<?php endif ?>

			<article class="featured-post <?php echo esc_attr( $suffice_toolkit_feature_post_class ); ?>">
				<div class="article-inner">
					<figure class="entry-thumbnail">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( ( 0 === $suffice_toolkit_get_featured_posts->current_post && 'feature-post-style-two' === $suffice_toolkit_style ? 'suffice-thumbnail-featured-two' : $suffice_toolkit_image_size ) ); ?>
						<?php else : ?>
							<img src="<?php echo esc_attr( get_template_directory_uri() . '/assets/img/no-' . $suffice_toolkit_image_size . '.png' ); ?>" alt="">
						<?php endif ?>
					</figure>

					<div class="entry-info-container">
						<header class="entry-header">
							<div class="entry-cat">
								<span class="entry-cat-name entry-cat-id-<?php echo esc_attr( suffice_get_first_category_id( $suffice_toolkit_source, $suffice_toolkit_category ) ); ?>"><a href="<?php echo esc_url( suffice_get_first_category_link( $suffice_toolkit_source, $suffice_toolkit_category ) ); ?>"><?php echo esc_attr( suffice_get_first_category_name( $suffice_toolkit_source, $suffice_toolkit_category ) ); ?></a></span>
							</div>

							<a href="<?php echo esc_url( get_the_permalink() ); ?>">
								<h3 class="entry-title"><?php echo esc_html( get_the_title() ); ?></h3></a>

							<div class="entry-meta">
										<span class="posted-on">
											<?php echo esc_attr( human_time_diff( get_the_date( 'U' ), current_time( 'timestamp' ) ) . ' ago' ); ?>
										</span>
								<?php
								if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
									echo '<span class="comments">';
									/* translators: %s: post title */
									comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'suffice-toolkit' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
									echo '</span>';
								}
								?>
							</div>
						</header>

						<div class="entry-content">
							<p><?php echo esc_attr( wp_trim_words( get_the_excerpt(), $num_words = 10, $more = null ) ); //phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound, WordPress.WP.GlobalVariablesOverride.Prohibited ?></p>
						</div>
					</div>

				</div>
			</article>
			<?php if ( $suffice_toolkit_get_featured_posts->current_post === $suffice_toolkit_get_featured_posts->post_count - 1 && 'feature-post-style-two' === $suffice_toolkit_style ) : ?>
			</div><!-- .feature-post-grid-container -->
				<?php
			endif;

		endwhile;
		wp_reset_postdata();
		?>
	</div>  <!-- .row -->
</div> <!-- .featured-post-container -->
