/*
Plugin Name: Proverbi Wordpress plugin
Version: 1.0
Description: Un proverbio scelto tra centinaia in Italiano.
Author: Fabrizio Salmi
Author URI: https://github.com/fabriziosalmi/proverbi-wp-plugin
*/

define( ‘MY_PLUGIN_PATH’, plugin_dir_path( __FILE__ ) );

function proverbi_actions() {
    add_options_page("Proverbi", "Proverbi", 1, "Proverbi", "proverbi_admin");
}
 
add_action('admin_menu', 'proverbi_actions');


function my_the_post_action( $post_object ) {
	echo 'hello world';
}
add_action( 'the_post', 'my_the_post_action' );
