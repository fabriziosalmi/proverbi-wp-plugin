<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
Plugin Name: Proverbi per Wordpress
Plugin URI: https://github.com/fabriziosalmi/proverbi-wp-plugin
Description: Un proverbio scelto tra centinaia in Italiano.
Version: 0.1
Author: Fabrizio Salmi
Author URI: https://github.com/fabriziosalmi
License: GPL
*/
add_action( 'admin_menu', 'my_plugin_menu' );
function my_plugin_menu() {
	add_options_page( 'Proverbi', 'Proverbi', 'manage_options', 'proverbi-wp-plugin', 'my_plugin_options' );
}
function your_plugin_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=proverbi-wp-plugin.php">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );
/** Step 3. */
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<h2>Proverbi</h2>';
	echo '<p>Il plugin in questo momento funziona correttamente. In ogni pagina verrà visualizzato un proverbio in Italiano scelto tra centinaia.</p>';
}
function theme_slug_filter_the_content( $content ) {

$proverbio = wp_remote_get('https://code.kisstube.tv/api/proverbi.php');
$proverbio = $proverbio['body'];

	$proverbi_title = '<strong>Proverbio</strong><br>';
	$proverbi_item = $proverbio;
    	$custom_content = '<div style="color: #656c7a;font-family: Helvetica Neue,arial,sans-serif;font-size: 15px;font-weight:500;"><br>'.$proverbi_title.$proverbi_item.'<br></div>';
    	$custom_content = $content .= $custom_content;
    	return $custom_content;
}
add_filter( 'the_content', 'theme_slug_filter_the_content' );

?>
