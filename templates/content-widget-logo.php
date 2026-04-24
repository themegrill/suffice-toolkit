<?php
/**
 * The template for displaying logo widget entries
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-logo.php.
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
$suffice_toolkit_logos      = isset( $instance['repeatable_logos'] ) ? $instance['repeatable_logos'] : array();
$suffice_toolkit_style      = isset( $instance['style'] ) ? $instance['style'] : 'logos-slider-style-clean';
$suffice_toolkit_linktarget = isset( $instance['link-target'] ) ? $instance['link-target'] : 'same-window';
$suffice_toolkit_columns    = isset( $instance['columns'] ) ? $instance['columns'] : '3';
?>
<div class="container">
	<div class="logos-slider-container <?php echo esc_attr( $suffice_toolkit_style ); ?>">
		<div class="logo-items-container swiper-container">
			<div class="swiper-wrapper">
				<?php
				if ( ! empty( $suffice_toolkit_logos ) ) :
					foreach ( $suffice_toolkit_logos as $suffice_toolkit_logo ) {
						?>
						<div class="logo-item swiper-slide">
							<?php
							if ( ! empty( $suffice_toolkit_logo['more-url'] ) ) {
								$suffice_toolkit_target = ( 'new-window' === $suffice_toolkit_linktarget ? 'target="_blank"' : '' );
								?>
							<a href="<?php echo esc_url( $suffice_toolkit_logo['more-url'] ); ?>"<?php echo esc_attr( $suffice_toolkit_target ); ?>>
								<?php } ?>
								<img src="<?php echo esc_url( $suffice_toolkit_logo['image'] ); ?>" alt="<?php echo esc_attr( $suffice_toolkit_logo['text'] ); ?>" />
								<?php if ( ! empty( $suffice_toolkit_logo['more-url'] ) ) { ?>
							</a>
						<?php } ?>
						</div>
						<?php
					}
				endif;
				?>
			</div>
		</div>
	</div>
</div>
