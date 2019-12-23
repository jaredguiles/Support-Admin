<?php
function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('server_widget', 'Server Info', 'server_info');
    wp_add_dashboard_widget('status_widget', 'CS Central Status', 'site_status');
    wp_add_dashboard_widget('bugs_widget', 'Bugs & Incidents', 'bug_incident');
}
 
function server_info (){
    ?>
<div class="wrap">
    <table cellspacing="1" cellpadding="2">
        <tbody>
            <tr>
                <td><strong><?php _e('System', 'control_panel'); ?></strong></td>
                <td><?php echo php_uname('n'); ?></td>
            </tr>
            <tr>
                <td><strong><?php _e('PHP Version', 'control_panel'); ?></strong></td>
                <td><?php echo phpversion(); ?>
                </td>
            </tr>
            <tr>
                <td><strong><?php _e('WordPress Version', 'control_panel'); ?></strong></td>
                <td><?php echo get_bloginfo( 'version' ); ?>
                </td>
            </tr>
        </tbody>
    </table>
</div> <?php
}

function site_status() {
echo '<style type="text/css"> 
.dot {
    height: 10px;
    width: 10px;
    border-radius: 50%;
    margin: 0px 2px 0px 5px;
    margin-bottom: -1px;
    background-color: #bbb;
    display: inline-block;

}
.dot::after {
    width: 112px;
    height: 47px;
    border-bottom: 1px solid green;
    -webkit-transform: translateY(20px) translateX(5px) rotate(-26deg);
    position: absolute;
    top: -33px;
    left: -13px;
}
#running{
	background-color: #69b56f !important;
    box-shadow: 0 0 0 #69b56f;
}
#error {
    background-color: #f1c40f !important;
    animation: pulse 1.5s infinite;
}
#outage {
    background-color: #e06255 !important;
	animation: blink .8s 0s infinite;
}
@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(241, 196, 15, 0.6);
    }

    70% {
        box-shadow: 0 0 0 7px rgba(241, 196, 15, 0);
    }

    100% {
        box-shadow: 0 0 0 0 rgba(241, 196, 15, 0);
    }
}
@keyframes blink {
    50% {
        opacity: 0.1;
    }
}
</style>';

    $fe = get_option( 'front_end' );
    $fe_status = $fe['0'];
    if ($fe_status == "Running"){
        $fe_status_icon = 'running';
        $fe_status_text = 'Running';
    }
    if ($fe_status == "Errors"){
        $fe_status_icon = 'error';
        $fe_status_text = 'Errors';
    }
    if ($fe_status == "Outage"){
        $fe_status_icon = 'warning';
        $fe_status_text = 'Major Outage';
    }
    $be = get_option( 'back_end' );
    $be_status = $be['0'];
    if ($be_status == "Running"){
        $be_status_icon = 'running';
        $be_status_text = 'Running';
    }
    if ($be_status == "Errors"){
        $be_status_icon = 'error';
        $be_status_text = 'Errors';
    }
    if ($be_status == "Outage"){
        $be_status_icon = 'outage';
        $be_status_text = 'Major Outage';
    }
    $db = get_option( 'database' );
    $db_status = $db['0'];
    if ($db_status == "Running"){
        $db_status_icon = 'running';
        $db_status_text = 'Running';
    }
    if ($db_status == "Errors"){
        $db_status_icon = 'error';
        $db_status_text = 'Errors';
    }
    if ($db_status == "Outage"){
        $db_status_icon = 'outage';
        $db_status_text = 'Major Outage';
    }
    $st = get_option( 'storage' );
    $st_status = $st['0'];
    if ($st_status == "Running"){
        $st_status_icon = 'running';
        $st_status_text = 'Running';
    }
    if ($st_status == "Errors"){
        $st_status_icon = 'error';
        $st_status_text = 'Errors';
    }
    if ($st_status == "Outage"){
        $st_status_icon = 'outage';
        $st_status_text = 'Major Outage';
    }
    echo '<div class="wrap" style="display: flex"><div class="column" style="width:50%"><center><p><strong>Frontend:</strong> ' . $fe_status_text . '  <span class="dot" id="' . $fe_status_icon . '"></p><p><strong>Backend:</strong> ' . $be_status_text . '  <span class="dot" id="' . $be_status_icon . '"></p></center></div><div class="column" style="width:50%"><center><p><strong>Database:</strong> ' . $db_status_text . '  <span class="dot" id="' . $db_status_icon . '"></p><p><strong>Storage:</strong> ' . $st_status_text . '  <span class="dot" id="' . $st_status_icon . '"></p></center></div> </div>';
    echo '<center><p> Report any errors or outages on <a href="https://booking.facebook.com/groups/cscentralsupport/" style="text-decoration:underline;">Workplace</a> or reach out to BCS</p></center>';
}

function bug_incident() {
    $bg_1_date = get_option( 'bug_1_date' );
    $bg_1_txt = get_option( 'bug_1_text' );
    $bg_2_date = get_option( 'bug_2_date' );
    $bg_2_txt = get_option( 'bug_2_text' );
    $bg_3_date = get_option( 'bug_3_date' );
    $bg_3_txt = get_option( 'bug_3_text' );
    $bg_4_date = get_option( 'bug_4_date' );
    $bg_4_txt = get_option( 'bug_4_text' );
    $bg_5_date = get_option( 'bug_5_date' );
    $bg_5_txt = get_option( 'bug_5_text' );
    $bg_6_date = get_option( 'bug_6_date' );
    $bg_6_txt = get_option( 'bug_6_text' );
    $bg_7_date = get_option( 'bug_7_date' );
    $bg_7_txt = get_option( 'bug_7_text' );
    $bg_8_date = get_option( 'bug_8_date' );
    $bg_8_txt = get_option( 'bug_8_text' );
    
    
    
    echo '<h3><strong>Active</strong></h3> <hr>';
    echo '<table style="width:100%">';
    if ($bg_1_txt !== ""){
        echo '<tr><th style="width: 130px;"><p style ="text-align: left; margin: 2px 0px;"><strong>'. $bg_1_date . '</strong>  </p></th><th><p style="font-weight: 400; text-align: left; margin: 2px 0px;">' . $bg_1_txt . '</p></th></tr>';
         }    
    if ($bg_2_txt !== ""){
        echo '<tr><th style="width: 130px;"><p style ="text-align: left; margin: 2px 0px;"><strong>'. $bg_2_date . '</strong>  </p></th><th><p style="font-weight: 400; text-align: left; margin: 2px 0px;">' . $bg_2_txt . '</p></th></tr>';
         }    
    if ($bg_3_txt !== ""){
        echo '<tr><th style="width: 130px;"><p style ="text-align: left; margin: 2px 0px;"><strong>'. $bg_3_date . '</strong>  </p></th><th><p style="font-weight: 400; text-align: left; margin: 2px 0px;">' . $bg_3_txt . '</p></th></tr>';
         }    
    echo '</table>';
    if ($bg_1_txt == "" & $bg_2_txt == "" & $bg_3_txt == "") {
        echo '<p>No active bugs or incidents</p>';
    }
    
    echo '<br><h3><strong>Resolved</strong></h3> <hr>';
    echo '<table style="width:100%">';
    if ($bg_4_txt !== ""){
        echo '<tr><th style="width: 130px;"><p style ="text-align: left; margin: 2px 0px;"><strong>'. $bg_4_date . '</strong>  </p></th><th><p style="font-weight: 400; text-align: left; margin: 2px 0px;">' . $bg_4_txt . '</p></th></tr>';
         }    
    if ($bg_5_txt !== ""){
        echo '<tr><th style="width: 130px;"><p style ="text-align: left; margin: 2px 0px;"><strong>'. $bg_5_date . '</strong>  </p></th><th><p style="font-weight: 400; text-align: left; margin: 2px 0px;">' . $bg_5_txt . '</p></th></tr>';
         }    
    if ($bg_6_txt !== ""){
        echo '<tr><th style="width: 130px;"><p style ="text-align: left; margin: 2px 0px;"><strong>'. $bg_6_date . '</strong>  </p></th><th><p style="font-weight: 400; text-align: left; margin: 2px 0px;">' . $bg_6_txt . '</p></th></tr>';
         }
    if ($bg_7_txt !== ""){
        echo '<tr><th style="width: 130px;"><p style ="text-align: left; margin: 2px 0px;"><strong>'. $bg_7_date . '</strong>  </p></th><th><p style="font-weight: 400; text-align: left; margin: 2px 0px;">' . $bg_7_txt . '</p></th></tr>';
         }
    if ($bg_8_txt !== ""){
        echo '<tr><th style="width: 130px;"><p style ="text-align: left; margin: 2px 0px;"><strong>'. $bg_8_date . '</strong>  </p></th><th><p style="font-weight: 400; text-align: left; margin: 2px 0px;">' . $bg_8_txt . '</p></th></tr>';
         }
    if ($bg_4_txt == "" & $bg_5_txt == "" & $bg_6_txt == "" & $bg_7_txt == "" & $bg_7_txt == "") {
        echo '<p>No previous bugs or incidents</p>';
    }
    echo '</table>';
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
