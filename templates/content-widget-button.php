<?php
/**
 * The template for displaying button widget entries
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-slider.php.
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
$suffice_toolkit_widget_id = isset( $args['widget_id'] ) ? $args['widget_id'] : '';
$suffice_toolkit_btn_text  = isset( $instance['btn-text'] ) ? $instance['btn-text'] : '';
$suffice_toolkit_btn_url   = isset( $instance['btn-url'] ) ? $instance['btn-url'] : '';
$suffice_toolkit_icon      = isset( $instance['icon'] ) ? $instance['icon'] : '';

/**
 * Styling.
 */
$suffice_toolkit_icon_position = isset( $instance['icon-position'] ) ? $instance['icon-position'] : 'icon-left';
$suffice_toolkit_target        = isset( $instance['target'] ) ? $instance['target'] : 'same-window';
$suffice_toolkit_btn_style     = isset( $instance['button-style'] ) ? $instance['button-style'] : 'btn-default';
$suffice_toolkit_btn_edge      = isset( $instance['button-edge'] ) ? $instance['button-edge'] : 'btn-flat';
$suffice_toolkit_btn_width     = isset( $instance['button-width'] ) ? $instance['button-width'] : 'btn-medium';
$suffice_toolkit_btn_align     = isset( $instance['button-align'] ) ? $instance['button-align'] : 'btn-left';

/**
 * Color.
 */
$suffice_toolkit_icon_color       = isset( $instance['icon-color'] ) ? $instance['icon-color'] : '';
$suffice_toolkit_text_color       = isset( $instance['text-color'] ) ? $instance['text-color'] : '';
$suffice_toolkit_background_color = isset( $instance['background-color'] ) ? $instance['background-color'] : '';

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

<div class="<?php echo esc_attr( $suffice_toolkit_btn_align ); ?>">
	<?php
	if ( ! empty( $suffice_toolkit_btn_url ) ) {
		$suffice_toolkit_linktarget = ( 'new-window' === $suffice_toolkit_target ? 'target="_blank"' : '' );
		?>
		<a <?php echo esc_attr( $suffice_toolkit_linktarget ); ?> class="btn <?php echo esc_attr( $suffice_toolkit_btn_edge ) . ' ' . esc_attr( $suffice_toolkit_btn_width ); ?>"<?php echo esc_attr( $suffice_toolkit_custom_text_style ); ?> href="<?php echo esc_url( $suffice_toolkit_btn_url ); ?>">
			<?php if ( ! empty( $suffice_toolkit_icon ) ) { ?>
				<span class="fa <?php echo esc_attr( $suffice_toolkit_icon ) . ' ' . esc_attr( $suffice_toolkit_icon_position ); ?>"<?php echo esc_attr( $suffice_toolkit_custom_icon_style ); ?>></span>
				<?php
			}

			echo esc_html( $suffice_toolkit_btn_text );
			?>
		</a>
	<?php } ?>
</div>
