<?php
// BEGIN CUSTOM ADMIN FOOTER //
function custom_footer_admin () {
  echo 'Maintained with ♥ by the Orange Support';
}
add_filter('admin_footer_text', 'custom_footer_admin');
// END CUSTOM ADMIN FOOTER //

// CUSTOM SUPPORT MENU //
 add_action( 'admin_menu', 'linked_url' );
 function linked_url() {
    add_menu_page( 'linked_url', 'Support', 'read', 'https://booking.facebook.com/groups/cscentralsupport', '', 'dashicons-warning', 3 );
}
function wpse_my_custom_script() {
    ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("ul#adminmenu a[href$='https://booking.facebook.com/groups/cscentralsupport']").attr('target', '_blank');
    });

</script>
<?php
}
add_action( 'admin_head', 'wpse_my_custom_script' );

// END CUSTOM SUPPORT MENU //

// BEGIN CUSTOM STYLING //
add_action('admin_head', 'custom_styling');

function custom_styling() {
  echo '<style>
    #toplevel_page_https\:--booking\.facebook\.com-groups-cscentralsupport {
      background-color: #dd3333 !important;
      color: #fff !important;
    } 
	#toplevel_page_https\:--booking\.facebook\.com-groups-cscentralsupport:hover, #toplevel_page_https\:--booking\.facebook\.com-groups-cscentralsupport a:hover{
	background-color: #821a1a !important;
	color: #fff !important;
	}
	#toplevel_page_https\:--booking\.facebook\.com-groups-cscentralsupport a .wp-menu-image:before{
	color: #fff !important;
	}
  </style>';
}
// END CUSTOM STYLING //

// BEGIN REMOVE ADMIN NOTICES FOR ALL USERS EXCEPT ADMINS //
function hide_core_update_notifications_from_users() {
	if ( ! current_user_can( 'update_core' ) ) {
		remove_action( 'admin_notices', 'update_nag', 3 );
		remove_action( 'admin_notices', 'maintenance_nag', 10 );
		remove_action( 'admin_notices', 'rocket_warning_plugin_modification' );
	}
}
add_action( 'admin_head', 'hide_core_update_notifications_from_users', 1 );
// END REMOVE ADMIN NOTICES FOR ALL USERS EXCEPT ADMINS //
