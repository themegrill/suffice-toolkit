<?php
/**
 * The template for displaying iconbox widget entries
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-iconbox.php.
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
$suffice_toolkit_title      = isset( $instance['iconbox-title'] ) ? $instance['iconbox-title'] : '';
$suffice_toolkit_icon_type  = isset( $instance['icon_type'] ) ? $instance['icon_type'] : 'icon';
$suffice_toolkit_icon       = isset( $instance['icon'] ) ? $instance['icon'] : '';
$suffice_toolkit_image      = isset( $instance['image'] ) ? $instance['image'] : '';
$suffice_toolkit_text       = isset( $instance['text'] ) ? $instance['text'] : '';
$suffice_toolkit_btn_text   = isset( $instance['btn-text'] ) ? $instance['btn-text'] : '';
$suffice_toolkit_btn_link   = isset( $instance['btn-link'] ) ? $instance['btn-link'] : '';
$suffice_toolkit_style      = isset( $instance['style'] ) ? $instance['style'] : 'icon-box-hexagon icon-box-hexagon-bg';
$suffice_toolkit_linktarget = isset( $instance['link-target'] ) ? $instance['link-target'] : 'same-window';

// Icon Color.
$suffice_toolkit_icon_color            = isset( $instance['icon-color'] ) ? $instance['icon-color'] : '';
$suffice_toolkit_icon_background_color = isset( $instance['icon-background-color'] ) ? $instance['icon-background-color'] : '';
$suffice_toolkit_icon_font_size        = isset( $instance['icon-font-size'] ) ? $instance['icon-font-size'] : '';

$suffice_toolkit_custom_icon_style = suffice_toolkit_inline_style(
	array(
		'color'            => $suffice_toolkit_icon_color,
		'font_size'        => $suffice_toolkit_icon_font_size,
		'background_color' => $suffice_toolkit_icon_background_color,
	)
);
?>
<div class="icon-box <?php echo esc_attr( $suffice_toolkit_style ); ?>">
	<?php if ( 'icon' === $suffice_toolkit_icon_type && ! empty( $suffice_toolkit_icon ) ) : ?>
		<div class="icon-box-icon"<?php echo esc_attr( $suffice_toolkit_custom_icon_style ); ?>>
			<div class="icon-box-icon-container">
				<div class="icon-box-inner-icon">
					<i class="fa <?php echo esc_attr( $suffice_toolkit_icon ); ?>"></i>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if ( 'image' === $suffice_toolkit_icon_type && ! empty( $suffice_toolkit_image ) ) : ?>
		<div class="icon-box-image"<?php echo esc_attr( $suffice_toolkit_custom_icon_style ); ?>>
			<div class="icon-box-image-container">
				<div class="icon-box-inner-image">
					<img src="<?php echo esc_url( $suffice_toolkit_image ); ?>" alt="<?php echo esc_attr( $suffice_toolkit_title ); ?>" />
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="icon-box-description">
		<?php if ( ! empty( $suffice_toolkit_title ) ) : ?>
			<h5 class="icon-box-title"><?php echo esc_html( $suffice_toolkit_title ); ?></h5>
		<?php endif; ?>
		<?php if ( ! empty( $suffice_toolkit_text ) ) : ?>
			<p class="icon-box-content"><?php echo esc_html( $suffice_toolkit_text ); ?></p>
		<?php endif; ?>
		<?php
		if ( ! empty( $suffice_toolkit_btn_link ) ) :
			$suffice_toolkit_target = ( 'new-window' === $suffice_toolkit_linktarget ? 'target="_blank"' : '' );
			?>
			<a class="icon-box-readmore" href="<?php echo esc_url( $suffice_toolkit_btn_link ); ?>"<?php echo esc_attr( $suffice_toolkit_target ); ?>><?php echo esc_html( $suffice_toolkit_btn_text ); ?></a>
		<?php endif; ?>
	</div>
</div> <!-- end icon-box -->
