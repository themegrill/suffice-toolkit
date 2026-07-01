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
$suffice_toolkit_title      = isset( $instance['cta-title'] ) ? $instance['cta-title'] : '';
$suffice_toolkit_icon       = isset( $instance['icon'] ) ? $instance['icon'] : '';
$suffice_toolkit_text       = isset( $instance['text'] ) ? $instance['text'] : '';
$suffice_toolkit_more_text  = isset( $instance['more-text'] ) ? $instance['more-text'] : '';
$suffice_toolkit_more_url   = isset( $instance['more-url'] ) ? $instance['more-url'] : '';
$suffice_toolkit_more_text2 = isset( $instance['more-text2'] ) ? $instance['more-text2'] : '';
$suffice_toolkit_more_url2  = isset( $instance['more-url2'] ) ? $instance['more-url2'] : '';
$suffice_toolkit_linktarget = isset( $instance['link-target'] ) ? $instance['link-target'] : '';
$suffice_toolkit_style      = isset( $instance['style'] ) ? $instance['style'] : 'cta-boxed-one';

// Sets the button class as per style.
$suffice_toolkit_btn_class = array(
	'one' => 'btn',
	'two' => 'btn',
);

if ( 'cta-boxed-one' === $suffice_toolkit_style ) {
	$suffice_toolkit_btn_class = array(
		'one' => 'btn btn-medium btn-primary btn-rounded',
		'two' => 'btn hide',
	);
} elseif ( 'cta-big-bordered' === $suffice_toolkit_style ) {
	$suffice_toolkit_btn_class = array(
		'one' => 'btn btn-medium btn-ghost btn-primary',
		'two' => 'btn btn-medium btn-ghost btn-primary',
	);
} elseif ( 'cta-background' === $suffice_toolkit_style ) {
	$suffice_toolkit_btn_class = array(
		'one' => 'btn btn-wide btn-rounded-edges btn-white',
		'two' => 'btn btn-wide btn-rounded-edges btn-black',
	);
}

?>
<div class="cta <?php echo esc_attr( $suffice_toolkit_style ); ?>">
	<div class="cta-bordered-inner">
		<?php if ( 'cta-boxed-one' === $suffice_toolkit_style && '' !== $suffice_toolkit_icon ) : ?>
			<div class="cta-icon">
				<div class="cta-icon-inner cta-icon-hexagon">
					<div class="cta-icon-container">
						<i class="fa <?php echo esc_attr( $suffice_toolkit_icon ); ?>"></i>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="cta-info">
			<?php if ( ! empty( $suffice_toolkit_title ) ) : ?>
				<h3 class="cta-title"><?php echo esc_html( $suffice_toolkit_title ); ?></h3>
			<?php endif; ?>
			<?php if ( ! empty( $suffice_toolkit_text ) ) : ?>
				<div class="cta-content">
					<p><?php echo esc_html( $suffice_toolkit_text ); ?></p>
				</div>
			<?php endif; ?>
		</div> <!-- end cta-info -->

		<div class="cta-actions col-md-3">
			<div class="btn-group">
				<?php
				if ( ! empty( $suffice_toolkit_more_url ) ) :
					?>
					<a href="<?php echo esc_url( $suffice_toolkit_more_url ); ?>" class="<?php echo esc_attr( $suffice_toolkit_btn_class['one'] ); ?>"  <?php echo ( 'new-window' === $suffice_toolkit_linktarget ) ? 'target="_blank"' : ''; ?>><?php echo esc_html( $suffice_toolkit_more_text ); ?></a>
				<?php endif; ?>

				<?php
				if ( ! empty( $suffice_toolkit_more_url2 ) && ( 'cta-boxed-one' !== $suffice_toolkit_style ) ) :
					?>
					<a href="<?php echo esc_url( $suffice_toolkit_more_url2 ); ?>" class="<?php echo esc_attr( $suffice_toolkit_btn_class['two'] ); ?>"  <?php echo ( 'new-window' === $suffice_toolkit_linktarget ) ? 'target="_blank"' : ''; ?>><?php echo esc_html( $suffice_toolkit_more_text2 ); ?></a>
				<?php endif; ?>
			</div> <!-- end btn-group -->
		</div> <!-- end cta-actions -->
	</div>
</div> <!-- end cta-boxed-one -->
