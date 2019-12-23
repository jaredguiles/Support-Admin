<?php
// BEGIN REMOVE METABOXES FOR EDITORS //
class plugin_check1 {
    public function __construct(){
        add_action( 'plugins_loaded', array( $this, 'check_if_user_logged_in' ) );
    }

    public function check_if_user_logged_in(){
        if ( is_user_logged_in() ){
$user = wp_get_current_user();
$allowed_roles = array('editor', 'super-editor', 'wfm', 'moderator');
if( array_intersect($allowed_roles, $user->roles ) ) { 
	function remove_admin_widgets() {
		remove_meta_box('dashboard_activity','dashboard', 'normal'); // Activity
		remove_meta_box('dashboard_recent_comments','dashboard','normal'); // Recent Comments
		remove_meta_box('dashboard_secondary','dashboard','side'); // Other WordPress News
		remove_meta_box('dashboard_quick_press','dashboard','side'); // Quick Press widget
		remove_meta_box('dashboard_primary','dashboard','side' ); // WordPress.com Blog
		remove_meta_box('server_widget','dashboard','normal' ); // Admin Server Info
	}
	add_action( 'wp_dashboard_setup', 'remove_admin_widgets' );
    
    function cache_removal() {
        echo '<style> #purge-action {display: none;} #publishing-action {margin-top: -12px;}</style>';
    }
    
    add_action('admin_head', 'cache_removal');
 }
            }
    }
}

$meta_check = new plugin_check1();
// END REMOVE METABOXES FOR EDITORS //
