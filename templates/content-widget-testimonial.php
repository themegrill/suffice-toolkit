<?php
/**
 * The template for displaying testimonial widget entries
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-test.php.
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
$suffice_toolkit_repeatable_testimonial = isset( $instance['repeatable_testimonial'] ) ? $instance['repeatable_testimonial'] : array();
$suffice_toolkit_style                  = isset( $instance['style'] ) ? $instance['style'] : '';
$suffice_toolkit_columns                = isset( $instance['columns'] ) ? $instance['columns'] : '2';

?>
<div class="testimonials-wrapper">
	<ul class="testimonials-container row <?php echo esc_attr( $suffice_toolkit_style ); ?>">
		<?php foreach ( $suffice_toolkit_repeatable_testimonial as $suffice_toolkit_testimonial ) { ?>
		<li class="testimonial-item <?php echo esc_attr( suffice_get_column_class( $suffice_toolkit_columns ) ); ?>">
			<?php if ( 'testimonials-sayings' === $suffice_toolkit_style ) : ?>
				<p class="testimonial-content"><?php echo esc_html( $suffice_toolkit_testimonial['text'] ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $suffice_toolkit_testimonial['image'] ) ) { ?>
				<figure class="testimonial-thumbnail">
					<?php if ( 'testimonials-bubble' === $suffice_toolkit_style ) : ?>
						<div class="bubble-one"></div>
						<div class="bubble-two"></div>
					<?php endif ?>
					<img src="<?php echo esc_url( $suffice_toolkit_testimonial['image'] ); ?>" alt="<?php echo esc_attr( $suffice_toolkit_testimonial['name'] ); ?>" />
				</figure>
			<?php } ?>

			<div class="testimonial-description">
				<?php if ( 'testimonials-bubble' === $suffice_toolkit_style || 'testimonials-big' === $suffice_toolkit_style ) : ?>
				<p class="testimonial-content"><?php echo esc_html( $suffice_toolkit_testimonial['text'] ); ?></p>
				<?php endif; ?>
				<h5 class="testimonial-author"><?php echo esc_html( $suffice_toolkit_testimonial['name'] ); ?></h5>
				<span class="testimonial-author-position"><?php echo esc_html( $suffice_toolkit_testimonial['byline'] ); ?></span>
			</div>
		</li> <!-- end testimonial-item -->
		<?php } ?>
	</ul> <!-- end testimonials-container -->
</div>
