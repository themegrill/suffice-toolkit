<?php
/**
 * The template for displaying counter widget entries
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-counter.php.
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

/**
 * General.
 */
$suffice_toolkit_title  = isset( $instance['counter-title'] ) ? $instance['counter-title'] : '';
$suffice_toolkit_icon   = isset( $instance['icon'] ) ? $instance['icon'] : '';
$suffice_toolkit_number = isset( $instance['number'] ) ? $instance['number'] : '';
$suffice_toolkit_prefix = isset( $instance['prefix'] ) ? $instance['prefix'] : '';
$suffice_toolkit_suffix = isset( $instance['suffix'] ) ? $instance['suffix'] : '';

/**
 * Styling.
 */
$suffice_toolkit_style = isset( $instance['style'] ) ? $instance['style'] : 'counter-style-hexagon';

/**
 * Color.
 */
$suffice_toolkit_icon_color       = isset( $instance['icon-color'] ) ? $instance['icon-color'] : '';
$suffice_toolkit_text_color       = isset( $instance['text-color'] ) ? $instance['text-color'] : '';
$suffice_toolkit_background_color = isset( $instance['background-color'] ) ? $instance['background-color'] : '';

// Add inline styles.
$suffice_toolkit_custom_icon_style = suffice_toolkit_inline_style(
	array(
		'color' => $suffice_toolkit_icon_color,
	)
);

$suffice_toolkit_custom_text_style = suffice_toolkit_inline_style(
	array(
		'color'            => $suffice_toolkit_text_color,
		'background_color' => $suffice_toolkit_background_color,
	)
);
?>
<div class="counter-item <?php echo esc_attr( $suffice_toolkit_style ); ?>">
	<div class="counter-icon">
		<div class="counter-icon-inner">
			<i class="fa <?php echo esc_attr( $suffice_toolkit_icon ); ?>" <?php echo esc_attr( $suffice_toolkit_custom_icon_style ); ?>></i>
		</div>
	</div> <!-- end counter-icon -->
	<div class="counter-info">
		<div class="counter-number" data-from="0" data-to="<?php echo esc_attr( $suffice_toolkit_number ); ?>" data-prefix="<?php echo esc_attr( $suffice_toolkit_prefix ); ?>" data-suffix="<?php echo esc_attr( $suffice_toolkit_suffix ); ?>" <?php echo esc_attr( $suffice_toolkit_custom_text_style ); ?>><?php echo esc_attr( $suffice_toolkit_number ); ?></div>
		<div class="counter-title"><?php echo esc_attr( $suffice_toolkit_title ); ?></div>
	</div>
</div>
