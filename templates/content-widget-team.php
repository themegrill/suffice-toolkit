<?php
/**
 * The template for displaying team widget entries
 *
 * This template can be overridden by copying it to yourtheme/suffice-toolkit/content-widget-team.php.
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
$suffice_toolkit_name             = isset( $instance['name'] ) ? $instance['name'] : '';
$suffice_toolkit_image            = isset( $instance['image'] ) ? $instance['image'] : '';
$suffice_toolkit_designation      = isset( $instance['designation'] ) ? $instance['designation'] : '';
$suffice_toolkit_style            = isset( $instance['style'] ) ? $instance['style'] : 'team-default';
$suffice_toolkit_linktarget       = isset( $instance['link-target'] ) ? $instance['link-target'] : 'same-window';
$suffice_toolkit_repeatable_icons = isset( $instance['repeatable_icons'] ) ? $instance['repeatable_icons'] : array();
?>
<div class="team-member <?php echo esc_attr( $suffice_toolkit_style ); ?>">
	<div class="team-member-inner">
		<figure class="team-member-thumbnail">
			<span class="team-bubble-one"></span>
			<span class="team-bubble-two"></span>
			<?php if ( $suffice_toolkit_image && ! empty( $suffice_toolkit_image ) ) : ?>
				<div class="team-member-thumbnail-inner">
					<img src="<?php echo esc_url( $suffice_toolkit_image ); ?>" alt="<?php echo esc_attr( $suffice_toolkit_name ); ?>" />
				</div>
			<?php endif ?>
			<?php if ( 'team-default' === $suffice_toolkit_style && ! empty( $suffice_toolkit_repeatable_icons ) ) : ?>
			<figcaption class="team-social-icons">
				<ul class="social-links">
					<?php foreach ( $suffice_toolkit_repeatable_icons as $suffice_toolkit_icon ) : ?>
						<li><a href="<?php echo esc_url( $suffice_toolkit_icon['icon-link'] ); ?>"></a></li>
					<?php endforeach; ?>
				</ul>
			</figcaption>
			<?php endif; ?>
		</figure>
		<div class="team-member-description">
			<?php if ( ! empty( $suffice_toolkit_name ) ) : ?>
			<h5 class="team-member-title"><?php echo esc_html( $suffice_toolkit_name ); ?></h5>
			<?php endif; ?>
			<?php if ( ! empty( $suffice_toolkit_designation ) ) : ?>
			<span class="team-member-position"><?php echo esc_html( $suffice_toolkit_designation ); ?></span>
			<?php endif; ?>
			<?php if ( ( 'team-boxed' === $suffice_toolkit_style || 'team-bubble' === $suffice_toolkit_style ) && ! empty( $suffice_toolkit_repeatable_icons ) ) : ?>
				<div class="team-social-icons">
					<ul class="social-links">
						<?php
						foreach ( $suffice_toolkit_repeatable_icons as $suffice_toolkit_icon ) :
							?>
							<li><a href="<?php echo esc_url( $suffice_toolkit_icon['icon-link'] ); ?>"></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div> <!-- .team-member-inner -->
</div> <!-- end team-member -->
