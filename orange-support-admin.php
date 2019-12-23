<?php
/*
   Plugin Name:         Ornange Support Admin
   Plugin URI:          https://gitlab.com/jguiles-wordpress-plugins/orange-support-admin
   Version:             1.0.0
   Author:              Jared Guiles
   Author URI:          https://jaredguiles.com
   Description:         Admin Settings for Orange Support clients
   Text Domain:         admin-settings
   License:             GPLv3
   GitLab Plugin URI:   https://gitlab.com/jguiles-wordpress-plugins/orange-support-admin
  */

include 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = new Puc_v4p7_Vcs_PluginUpdateChecker(
    new Puc_v4p7_Vcs_GitLabApi('https://gitlab.com/jguiles-wordpress-plugins/orange-support-admin'),
    __FILE__,
    'orange-support-admin'
);
$myUpdateChecker->setAuthentication('JZrxETpiuYtQKHqN8LVf');

// BEGIN ENQUE ADMIN CONTROLS //
include( plugin_dir_path( __FILE__ ) . 'admin-controls/frontend.php' );
include( plugin_dir_path( __FILE__ ) . 'admin-controls/backend.php' );
include( plugin_dir_path( __FILE__ ) . 'admin-controls/widgets.php' );
// END ENQUE ADMIN CONTROLS //

// BEGIN ENQUE CUSTOM SHORTCODES //
include( plugin_dir_path( __FILE__ ) . 'custom-shortcodes.php' );
// END ENQUE CUSTOM SHORTCODES //

// BEGIN ENQUE BACKEND TWEAKS //
include( plugin_dir_path( __FILE__ ) . 'backend-tweaks.php' );
// END ENQUE BACKEND TWEAKS //

// BEGIN ENQUE METABOX EDITS //
include( plugin_dir_path( __FILE__ ) . 'meta-boxes.php' );
// END ENQUE METABOX EDITS//
