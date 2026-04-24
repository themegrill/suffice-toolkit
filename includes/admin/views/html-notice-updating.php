<?php
/**
 * Admin View: Notice - Updating
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div id="message" class="updated suffice-toolkit-message suffice-connect">
	<p><strong><?php esc_html_e( 'SufficeToolkit Data Update', 'suffice-toolkit' ); ?></strong> &#8211; <?php esc_html_e( 'Your database is being updated in the background.', 'suffice-toolkit' ); ?> <a href="<?php echo esc_url( add_query_arg( 'force_update_suffice_toolkit', 'true', admin_url( 'themes.php' ) ) ); ?>"><?php esc_html_e( 'Taking a while? Click here to run it now.', 'suffice-toolkit' ); ?></a></p>
</div>
