<?php

class admin_control_plugin {

    public function __construct() {
    	// Hook into the admin menu
    	add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
        // Add Settings and Fields
    	add_action( 'admin_init', array( $this, 'setup_sections' ) );
    	add_action( 'admin_init', array( $this, 'setup_fields' ) );
    }
    public function create_plugin_settings_page() {
    	// Add the menu item and page
    	$page_title = 'Admin Control Panel';
    	$menu_title = 'Control Panel';
    	$capability = 'manage_options';
    	$slug = 'control_panel';
    	$callback = array( $this, 'plugin_settings_page_content' );
    	$icon = 'dashicons-admin-generic';
    	$position = 4;
    	add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
        
        // Add the main sub-menu item and page
        $parent_slug = 'control_panel';
        $sub_page_title = 'Backend Settings';
        $sub_menu_title = 'Backend Settings';
        $sub_menu_capabilities = 'manage_options';
        $sub_menu_slug = 'control_panel';
        $sub_menu_callback = array( $this, 'plugin_settings_page_content' );
        add_submenu_page( $parent_slug, $sub_page_title, $sub_menu_title, $sub_menu_capabilities, $sub_menu_slug, $sub_menu_callback );
        
        // Add the sub-menu item and page
        $parent_slug = 'control_panel';
        $sub_page_title = 'Frontend Settings';
        $sub_menu_title = 'Frontend Settings';
        $sub_menu_capabilities = 'manage_options';
        $sub_menu_slug = 'front_end_settings';
        $sub_menu_callback = 'simple_banner_settings_page';
        add_submenu_page( $parent_slug, $sub_page_title, $sub_menu_title, $sub_menu_capabilities, $sub_menu_slug, $sub_menu_callback );
    }
    public function plugin_settings_page_content() {?>
<div class="wrap">
    <h2>Backend Settings</h2>
    <h3>Site Information</h3>
    <table cellspacing="1" cellpadding="2">
        <tbody>
            <tr>
                <td><strong><?php _e('*System', 'control_panel'); ?></strong></td>
                <td><?php echo php_uname(); ?></td>
            </tr>
            <tr>
                <td><strong><?php _e('PHP Version', 'control_panel'); ?></strong></td>
                <td><?php echo phpversion(); ?>
                </td>
            </tr>
            <tr>
                <td><strong><?php _e('MySQL Version', 'control_panel'); ?></strong></td>
                <td><?php echo $this->getMySqlVersion() ?>
                </td>
            </tr>
            <tr>
                <td><strong><?php _e('WordPress Version', 'control_panel'); ?></strong></td>
                <td><?php echo get_bloginfo( 'version' ); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <p>
        *Current server you are connected to based on your location/office
    </p>
    <style type="text/css">
        br {
            display: none;
        }

        label {
            padding-right: 10px;
        }

        #adm_1_type_1:before {
            background-color: #1e8cbe;
        }

        input#adm_1_type_1:focus {
            border-color: #1e8cbe;
            box-shadow: 0 0 2px rgba(30, 140, 190, .8);

        }

        #front_end_1:before,
        #back_end_1:before,
        #database_1:before,
        #storage_1:before {
            background-color: #69b56f;
        }

        input#front_end_1:focus,
        input#back_end_1:focus,
        input#database_1:focus,
        input#storage_1:focus {
            border-color: #69b56f;
            box-shadow: 0 0 2px rgba(105, 181, 111, .8);
        }

        #adm_1_type_2:before,
        #adm_2_type_2:before,
        #adm_3_type_2:before,
        #front_end_2:before,
        #back_end_2:before,
        #database_2:before,
        #storage_2:before {
            background-color: #ffb900;
        }

        input#adm_1_type_2:focus,
        input#adm_2_type_2:focus,
        input#adm_3_type_2:focus,
        input#front_end_2:focus,
        input#back_end_2:focus,
        input#database_2:focus,
        input#storage_2:focus {
            border-color: #ffb900;
            box-shadow: 0 0 2px rgba(255, 185, 0, .8);

        }

        #adm_1_type_3:before,
        #adm_2_type_3:before,
        #adm_3_type_3:before,
        #front_end_3:before,
        #back_end_3:before,
        #database_3:before,
        #storage_3:before {
            background-color: #dc3232;
        }

        input#adm_1_type_3:focus,
        input#adm_2_type_3:focus,
        input#adm_3_type_3:focus,
        input#front_end_3:focus,
        input#back_end_3:focus,
        input#database_3:focus,
        input#storage_3:focus {
            border-color: #dc3232;
            box-shadow: 0 0 2px rgba(220, 50, 50, .8);

        }

        #wpbody-content>div.wrap>form>table:nth-child(6)>tbody>tr:nth-child(1)>td,
        #wpbody-content>div.wrap>form>table:nth-child(6)>tbody>tr:nth-child(2)>td,
        #wpbody-content>div.wrap>form>table:nth-child(6)>tbody>tr:nth-child(3)>td,
        #wpbody-content>div.wrap>form>table:nth-child(6)>tbody>tr:nth-child(4)>td,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(2)>td,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(3)>td,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(5)>td,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(6)>td,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(8)>td,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(9)>td,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(1)>td,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(2)>td,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(3)>td,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(4)>td,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(5)>td,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(6)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(1)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(2)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(3)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(4)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(5)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(6)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(7)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(8)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(9)>td,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(10)>td {
            padding: 0px 10px !important;
        }

        #wpbody-content>div.wrap>form>table:nth-child(6)>tbody>tr:nth-child(1)>th,
        #wpbody-content>div.wrap>form>table:nth-child(6)>tbody>tr:nth-child(2)>th,
        #wpbody-content>div.wrap>form>table:nth-child(6)>tbody>tr:nth-child(3)>th,
        #wpbody-content>div.wrap>form>table:nth-child(6)>tbody>tr:nth-child(4)>th,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(2)>th,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(3)>th,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(5)>th,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(6)>th,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(8)>th,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(9)>th,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(1)>th,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(2)>th,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(3)>th,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(4)>th,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(5)>th,
        #wpbody-content>div.wrap>form>table:nth-child(10)>tbody>tr:nth-child(6)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(1)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(2)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(3)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(4)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(5)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(6)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(7)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(8)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(9)>th,
        #wpbody-content>div.wrap>form>table:nth-child(12)>tbody>tr:nth-child(10)>th {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(1)>td,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(4)>td,
        #wpbody-content>div.wrap>form>table:nth-child(8)>tbody>tr:nth-child(7)>td {
            padding-bottom: 0px;
        }


        textarea {
            width: 50%;
            height: 50px;
        }

        #bug_1_text,
        #bug_2_text,
        #bug_3_text,
        #bug_4_text,
        #bug_5_text,
        #bug_6_text,
        #bug_7_text,
        #bug_8_text {
            width: 50%;
            margin-bottom: 15px;
        }

    </style>
    <?php
            if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
                  $this->admin_notice();
            } ?>
    <form method="POST" action="options.php">
        <?php
                    settings_fields( 'control_panel' );
                    do_settings_sections( 'control_panel' );
                    submit_button();
                ?>
    </form>
</div> <?php
    }
    
    public function admin_notice() { ?>
<div class="notice notice-success is-dismissible">
    <p>Control Panel settings have been saved!</p>
</div><?php
    }
    public function setup_sections() {
        add_settings_section( 'first_section', 'Site Status', '', 'control_panel' );
        add_settings_section( 'second_section', 'Admin Notices', '', 'control_panel' );
        add_settings_section( 'third_section', 'Active Bugs & Incidents', '', 'control_panel' );
        add_settings_section( 'forth_section', 'Resolved Bugs & Incidents', '', 'control_panel' );
    }
    public function setup_fields() {
        $fields = array(
        	array(
        		'uid' => 'front_end',
        		'label' => 'Frontend',
        		'section' => 'first_section',
        		'type' => 'radio',
                'helpers' => 'help!',
        		'options' => array(
        			'Running' => 'Running',
        			'Errors' => 'Errors',
        			'Outage' => 'Outage',
        		),
                'default' => array()
        	),
            array(
        		'uid' => 'back_end',
        		'label' => 'Backend',
        		'section' => 'first_section',
        		'type' => 'radio',
        		'options' => array(
        			'Running' => 'Running',
        			'Errors' => 'Errors',
        			'Outage' => 'Outage',
        		),
                'default' => array()
        	),
            array(
        		'uid' => 'database',
        		'label' => 'Database',
        		'section' => 'first_section',
        		'type' => 'radio',
        		'options' => array(
        			'Running' => 'Running',
        			'Errors' => 'Errors',
        			'Outage' => 'Outage',

        		),
                'default' => array()
        	),
            array(
        		'uid' => 'storage',
        		'label' => 'Storage',
        		'section' => 'first_section',
        		'type' => 'radio',
        		'options' => array(
        			'Running' => 'Running',
        			'Errors' => 'Errors',
        			'Outage' => 'Outage',
        		),
                'default' => array()
        	),
            array(
        		'uid' => 'adm_notice_1',
        		'label' => 'Admin Notice 1',
        		'section' => 'second_section',
        		'type' => 'textarea',
                'placeholder' => 'Notice text goes here...',
        		),
        	array(
        		'uid' => 'adm_1_type',
        		'label' => 'Type',
        		'section' => 'second_section',
        		'type' => 'radio',
        		'options' => array(
        			'info' => 'Info',
        			'warning' => 'Warning',
        			'error' => 'Error',
        		),
                'default' => array()
        	),
        	array(
        		'uid' => 'adm_1_active',
        		'label' => 'Status',
        		'section' => 'second_section',
        		'type' => 'checkbox',
        		'options' => array(
        			'active' => 'Active',
        		),
                'default' => array()
        	),
            array(
        		'uid' => 'adm_notice_2',
        		'label' => 'Admin Notice 2',
        		'section' => 'second_section',
        		'type' => 'textarea',
                'placeholder' => 'Notice text goes here...',
        		),
        	array(
        		'uid' => 'adm_2_type',
        		'label' => 'Type',
        		'section' => 'second_section',
        		'type' => 'radio',
        		'options' => array(
        			'info' => 'Info',
        			'warning' => 'Warning',
        			'error' => 'Error',
        		),
                'default' => array()
        	),
        	array(
        		'uid' => 'adm_2_active',
        		'label' => 'Status',
        		'section' => 'second_section',
        		'type' => 'checkbox',
        		'options' => array(
        			'active' => 'Active',
        		),
                'default' => array()
        	),
            array(
        		'uid' => 'adm_notice_3',
        		'label' => 'Admin Notice 3',
        		'section' => 'second_section',
        		'type' => 'textarea',
                'placeholder' => 'Notice text goes here...',
        		),
        	array(
        		'uid' => 'adm_3_type',
        		'label' => 'Type',
        		'section' => 'second_section',
        		'type' => 'radio',
        		'options' => array(
        			'info' => 'Info',
        			'warning' => 'Warning',
        			'error' => 'Error',
        		),
                'default' => array()
        	),
        	array(
        		'uid' => 'adm_3_active',
        		'label' => 'Status',
        		'section' => 'second_section',
        		'type' => 'checkbox',
        		'options' => array(
        			'active' => 'Active',
        		),
                'default' => array()
        	),
        	array(
        		'uid' => 'bug_1_date',
        		'label' => 'Date',
        		'section' => 'third_section',
        		'type' => 'text',
                'placeholder' => 'January 1, 2019',
        	),
        	array(
        		'uid' => 'bug_1_text',
        		'label' => 'Short Description',
        		'section' => 'third_section',
        		'type' => 'text',
                'placeholder' => 'Outage due to server permission error',
        	),
        	array(
        		'uid' => 'bug_2_date',
        		'label' => 'Date',
        		'section' => 'third_section',
        		'type' => 'text',
                'placeholder' => 'January 1, 2019',
        	),
        	array(
        		'uid' => 'bug_2_text',
        		'label' => 'Short Description',
        		'section' => 'third_section',
        		'type' => 'text',
                'placeholder' => 'Outage due to server permission error',
        	),
        	array(
        		'uid' => 'bug_3_date',
        		'label' => 'Date',
        		'section' => 'third_section',
        		'type' => 'text',
                'placeholder' => 'January 1, 2019',
        	),
        	array(
        		'uid' => 'bug_3_text',
        		'label' => 'Short Description',
        		'section' => 'third_section',
        		'type' => 'text',
                'placeholder' => 'Outage due to server permission error',
        	),
        	array(
        		'uid' => 'bug_4_date',
        		'label' => 'Date',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'January 1, 2019',
        	),
        	array(
        		'uid' => 'bug_4_text',
        		'label' => 'Short Description',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'Outage due to server permission error',
        	),
        	array(
        		'uid' => 'bug_5_date',
        		'label' => 'Date',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'January 1, 2019',
        	),
        	array(
        		'uid' => 'bug_5_text',
        		'label' => 'Short Description',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'Outage due to server permission error',
        	),
        	array(
        		'uid' => 'bug_6_date',
        		'label' => 'Date',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'January 1, 2019',
        	),
        	array(
        		'uid' => 'bug_6_text',
        		'label' => 'Short Description',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'Outage due to server permission error',
        	),
        	array(
        		'uid' => 'bug_7_date',
        		'label' => 'Date',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'January 1, 2019',
        	),
        	array(
        		'uid' => 'bug_7_text',
        		'label' => 'Short Description',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'Outage due to server permission error',
        	),
        	array(
        		'uid' => 'bug_8_date',
        		'label' => 'Date',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'January 1, 2019',
        	),
        	array(
        		'uid' => 'bug_8_text',
        		'label' => 'Short Description',
        		'section' => 'forth_section',
        		'type' => 'text',
                'placeholder' => 'Outage due to server permission error',
        	)
        	
        );
    	foreach( $fields as $field ){
        	add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'control_panel', $field['section'], $field );
            register_setting( 'control_panel', $field['uid'] );
    	}
    }
    public function field_callback( $arguments ) {
        $value = get_option( $arguments['uid'] );
        if( ! $value ) {
            $value = $arguments['default'];
        }
        switch( $arguments['type'] ){
            case 'text':
            case 'password':
            case 'number':
                printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                break;
            case 'textarea':
                printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
                break;
            case 'select':
            case 'multiselect':
                if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                    $attributes = '';
                    $options_markup = '';
                    foreach( $arguments['options'] as $key => $label ){
                        $options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value[ array_search( $key, $value, true ) ], $key, false ), $label );
                    }
                    if( $arguments['type'] === 'multiselect' ){
                        $attributes = ' multiple="multiple" ';
                    }
                    printf( '<select name="%1$s[]" id="%1$s" %2$s>%3$s</select>', $arguments['uid'], $attributes, $options_markup );
                }
                break;
            case 'radio':
            case 'checkbox':
                if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                    $options_markup = '';
                    $iterator = 0;
                    foreach( $arguments['options'] as $key => $label ){
                        $iterator++;
                        $options_markup .= sprintf( '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', $arguments['uid'], $arguments['type'], $key, checked( $value[ array_search( $key, $value, true ) ], $key, false ), $label, $iterator );
                    }
                    printf( '<fieldset>%s</fieldset>', $options_markup );
                }
                break;
        }
        if( $helper = $arguments['helper'] ){
            printf( '<span class="helper"> %s</span>', $helper );
        }
        if( $supplimental = $arguments['supplimental'] ){
            printf( '<p class="description">%s</p>', $supplimental );
        }
    }
        protected function getMySqlVersion() {
        global $wpdb;
        $rows = $wpdb->get_results('select version() as mysqlversion');
        if (!empty($rows)) {
             return $rows[0]->mysqlversion;
        }
        return false;
    }
}
new admin_control_plugin();

if (get_option( 'adm_1_active' ) !== ''){
    function general_admin_notice1() {
        $notice_1_text = get_option( 'adm_notice_1' );
        $notice_1_a = get_option( 'adm_1_type' );
        $notice_1_type = $notice_1_a['0'];
        
        $class = 'notice notice-info';
        if($notice_1_type == 'info'){
            $dashicon = 'dashicons-sticky';
            $class = 'notice notice-info';
        }
        if($notice_1_type == 'warning'){
            $dashicon = 'dashicons-flag';
            $class = 'notice notice-warning';
        }
        if ($notice_1_type == 'error'){
            $dashicon = 'dashicons-warning';
            $class = 'notice notice-error';
        }
        
	printf('<div class="%1$s"><p><span class="dashicons %2$s"> </span> %3$s</p></div>', esc_attr( $class ), $dashicon , $notice_1_text); 
}
add_action( 'admin_notices', 'general_admin_notice1' );
}

if (get_option( 'adm_2_active' ) !== ''){
    function general_admin_notice2() {
        $notice_2_text = get_option( 'adm_notice_2' );
        $notice_2_a = get_option( 'adm_2_type' );
        $notice_2_type = $notice_2_a['0'];
        
        $class = 'notice notice-info';
        if($notice_2_type == 'info'){
            $dashicon = 'dashicons-sticky';
            $class = 'notice notice-info';
        }
        if($notice_2_type == 'warning'){
            $dashicon = 'dashicons-flag';
            $class = 'notice notice-warning';
        }
        if ($notice_2_type == 'error'){
            $dashicon = 'dashicons-warning';
            $class = 'notice notice-error';
        }
        
	printf('<div class="%1$s"><p><span class="dashicons %2$s"> </span> %3$s</p></div>', esc_attr( $class ), $dashicon , $notice_2_text); 
}
add_action( 'admin_notices', 'general_admin_notice2' );
}

if (get_option( 'adm_3_active' ) !== ''){
    function general_admin_notice3() {
        $notice_3_text = get_option( 'adm_notice_3' );
        $notice_3_a = get_option( 'adm_3_type' );
        $notice_3_type = $notice_3_a['0'];
        
        $class = 'notice notice-info';
        if($notice_3_type == 'info'){
            $dashicon = 'dashicons-sticky';
            $class = 'notice notice-info';
        }
        if($notice_3_type == 'warning'){
            $dashicon = 'dashicons-flag';
            $class = 'notice notice-warning';
        }
        if ($notice_3_type == 'error'){
            $dashicon = 'dashicons-warning';
            $class = 'notice notice-error';
        }
        
	printf('<div class="%1$s"><p><span class="dashicons %2$s"> </span> %3$s</p></div>', esc_attr( $class ), $dashicon , $notice_3_text); 
}
add_action( 'admin_notices', 'general_admin_notice3' );
}
