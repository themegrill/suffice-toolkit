<?php
/**
 * The template for displaying image widget.
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-image.php.
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

$image              = isset( $instance['image'] ) ? $instance['image'] : '';
$link               = isset( $instance['image_link'] ) ? $instance['image_link'] : '';
$attachment_post_id = attachment_url_to_postid( $image );
$img_altr           = get_post_meta( $attachment_post_id, '_wp_attachment_image_alt', true );
$img_alt            = ! empty( $img_altr ) ? $img_altr : '';
?>
<?php if ( ! empty( $link ) ) { ?>
	<a href="<?php echo esc_url( $link ); ?>"><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" /></a>
<?php } else { ?>
	<img src="<?php echo esc_url( $image ); ?>" />
<?php } ?>
