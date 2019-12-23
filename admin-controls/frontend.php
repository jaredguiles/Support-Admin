<?php

// Frontend Banner settings
$text_field = get_option( 'simple_banner_text' );
if ($text_field != ""){
add_action( 'wp_enqueue_scripts', 'simple_banner' );
}
function simple_banner() {
    // Enqueue the style
	wp_register_style('simple-banner-style',  plugin_dir_url( __FILE__ ) .'simple-banner.css');
    wp_enqueue_style('simple-banner-style');
    // Enqueue the script
    wp_register_script('simple-banner-script', plugin_dir_url( __FILE__ ) . 'simple-banner.js', array( 'jquery' ));
    wp_enqueue_script('simple-banner-script');
}

//add custom CSS colors
add_action( 'wp_head', 'simple_banner_custom_color');
function simple_banner_custom_color() 
{
	if (get_option('simple_banner_color') != ""){
		echo '<style type="text/css" media="screen">.simple-banner{background:' . get_option('simple_banner_color') . "};</style>";
	}

	if (get_option('simple_banner_text_color') != ""){
		echo '<style type="text/css" media="screen">.simple-banner .simple-banner-text{color:' . get_option('simple_banner_text_color') . "};</style>";
	}

	if (get_option('simple_banner_link_color') != ""){
		echo '<style type="text/css" media="screen">.simple-banner .simple-banner-text a{color:' . get_option('simple_banner_link_color') . "};</style>";
	}

	if (get_option('simple_banner_custom_css') != ""){
		echo '<style type="text/css" media="screen">.simple-banner{'. get_option('simple_banner_custom_css') . "};</style>";
	}

	if (get_option('site_custom_css') != "" && get_option('pro_version_enabled')) {
		echo '<style type="text/css" media="screen">'. get_option('site_custom_css') . "</style>";
	}

	if (get_option('site_custom_js') != "" && get_option('pro_version_enabled')) {
		echo '<script type="text/javascript">'. get_option('site_custom_js') . "</script>";
	}
}

//add custom banner text
add_action( 'wp_head', 'simple_banner_custom_text');
function simple_banner_custom_text()
{
	if (get_option('simple_banner_text') != ""){
		if (!get_option('pro_version_enabled') || (get_option('pro_version_enabled') && !in_array(get_the_ID(), explode(",", get_option('disabled_pages_array'))))){
			echo '<script type="text/javascript">jQuery(document).ready(function() {
			var bannerSpan = document.getElementById("simple-banner");
			bannerSpan.innerHTML = "<div class=' . "simple-banner-text" . '><span>' . addslashes( get_option('simple_banner_text') ) . '</span></div>"
			});
			</script>';
		}
	}
}

add_action( 'admin_init', 'simple_banner_settings' );
function simple_banner_settings() {
	register_setting( 'simple-banner-settings-group', 'simple_banner_color' );
	register_setting( 'simple-banner-settings-group', 'simple_banner_text_color' );
	register_setting( 'simple-banner-settings-group', 'simple_banner_link_color' );
	register_setting( 'simple-banner-settings-group', 'simple_banner_text' );
	register_setting( 'simple-banner-settings-group', 'simple_banner_custom_css' );
	register_setting( 'simple-banner-settings-group', 'pro_version_activation_code' );
	register_setting( 'simple-banner-settings-group', 'pro_version_enabled' );
	register_setting( 'simple-banner-settings-group', 'disabled_pages_array' );
	register_setting( 'simple-banner-settings-group', 'site_custom_css' );
	register_setting( 'simple-banner-settings-group', 'site_custom_js' );
}

function simple_banner_settings_page() {
	?>

<div class="wrap">
    <h2>Frontend Settings</h2>

    <!-- Preview Banner -->
    <div id="preview_banner" class="simple-banner" style="width: 100%;text-align: center;">
        <div id="preview_banner_text" class="simple-banner-text" style="font-size: 1.1em;font-weight: 700;padding: 10px;">
            <span>This is what your banner will look like with a <a href="/">link</a>.</span>
        </div>
    </div>
    <br>
    <!-- Settings Form -->
    <form method="post" action="options.php">
        <?php settings_fields( 'simple-banner-settings-group' ); ?>
        <?php do_settings_sections( 'simple-banner-settings-group' ); ?>
        <table class="form-table">
            <!-- Background Color -->
            <tr valign="top">
                <th scope="row">Banner Background Color<br></th>
                <td style="vertical-align:top;">
                    <input type="text" id="simple_banner_color" name="simple_banner_color" placeholder="Hex value" value="<?php echo esc_attr( get_option('simple_banner_color') ); ?>" />
                    <input style="height: 30px;width: 100px;" type="color" id="simple_banner_color_show" value="<?php echo ((get_option('simple_banner_color') == '') ? '#f44336' : esc_attr( get_option('simple_banner_color') )); ?>">
                </td>
            </tr>
            <!-- Text Color -->
            <tr valign="top">
                <th scope="row">Banner Text Color<br></th>
                <td style="vertical-align:top;">
                    <input type="text" id="simple_banner_text_color" name="simple_banner_text_color" placeholder="Hex value" value="<?php echo esc_attr( get_option('simple_banner_text_color') ); ?>" />
                    <input style="height: 30px;width: 100px;" type="color" id="simple_banner_text_color_show" value="<?php echo ((get_option('simple_banner_text_color') == '') ? '#ffffff' : esc_attr( get_option('simple_banner_text_color') )); ?>">
                </td>
            </tr>
            <!-- Link Color-->
            <tr valign="top">
                <th scope="row">Banner Link Color<br></th>
                <td style="vertical-align:top;">
                    <input type="text" id="simple_banner_link_color" name="simple_banner_link_color" placeholder="Hex value" value="<?php echo esc_attr( get_option('simple_banner_link_color') ); ?>" />
                    <input style="height: 30px;width: 100px;" type="color" id="simple_banner_link_color_show" value="<?php echo ((get_option('simple_banner_link_color') == '') ? '#424242' : esc_attr( get_option('simple_banner_link_color') )); ?>">
                </td>
            </tr>
            <!-- Text Contents -->
            <tr valign="top">
                <th scope="row">
                    Banner Text
                    <br><span style="font-weight:400;">(Leaving this blank removes the banner)</span>
                </th>
                <td>
                    <textarea id="simple_banner_text" style="height: 150px;width: 75%;" name="simple_banner_text"><?php echo get_option('simple_banner_text'); ?></textarea>
                </td>
            </tr>
        </table>
        <!-- Save Changes Button -->
        <?php submit_button(); ?>
    </form>
</div>

<!-- Script to apply styles to Preview Banner -->
<script type="text/javascript">
    var style_background_color = document.createElement('style');
    var style_link_color = document.createElement('style');
    var style_text_color = document.createElement('style');
    var style_custom_css = document.createElement('style');

    // Banner Text
    document.getElementById('preview_banner_text').innerHTML = document.getElementById('simple_banner_text').value != "" ? '<span>' + document.getElementById('simple_banner_text').value + '</span>' : '<span>This is what your banner will look like with a <a href="/">link</a>.</span>';
    document.getElementById('simple_banner_text').onchange = function(e) {
        document.getElementById('preview_banner_text').innerHTML = e.target.value != "" ? '<span>' + e.target.value + '</span>' : '<span>This is what your banner will look like with a <a href="/">link</a>.</span>';
    };

    // Background Color
    style_background_color.type = 'text/css';
    style_background_color.id = 'preview_banner_background_color'
    style_background_color.appendChild(document.createTextNode('.simple-banner{background:' + (document.getElementById('simple_banner_color').value || '#f44336') + '}'));
    document.getElementsByTagName('head')[0].appendChild(style_background_color);

    document.getElementById('simple_banner_color').onchange = function(e) {
        document.getElementById('simple_banner_color_show').value = e.target.value || '#f44336';
        var child = document.getElementById('preview_banner_background_color');
        if (child) {
            child.innerText = "";
            child.id = '';
        }

        var style_dynamic = document.createElement('style');
        style_dynamic.type = 'text/css';
        style_dynamic.id = 'preview_banner_background_color';
        style_dynamic.appendChild(
            document.createTextNode(
                '.simple-banner{background:' + (document.getElementById('simple_banner_color').value || '#f44336') + '}'
            )
        );
        document.getElementsByTagName('head')[0].appendChild(style_dynamic);
    };
    document.getElementById('simple_banner_color_show').onchange = function(e) {
        document.getElementById('simple_banner_color').value = e.target.value;
        document.getElementById('simple_banner_color').dispatchEvent(new Event('change'));
    };

    // Text Color
    style_text_color.type = 'text/css';
    style_text_color.id = 'preview_banner_text_color'
    style_text_color.appendChild(document.createTextNode('.simple-banner .simple-banner-text{color:' + (document.getElementById('simple_banner_text_color').value || '#ffffff') + '}'));
    document.getElementsByTagName('head')[0].appendChild(style_text_color);

    document.getElementById('simple_banner_text_color').onchange = function(e) {
        document.getElementById('simple_banner_text_color_show').value = e.target.value || '#ffffff';
        var child = document.getElementById('preview_banner_text_color');
        if (child) {
            child.innerText = "";
            child.id = '';
        }

        var style_dynamic = document.createElement('style');
        style_dynamic.type = 'text/css';
        style_dynamic.id = 'preview_banner_text_color';
        style_dynamic.appendChild(
            document.createTextNode(
                '.simple-banner .simple-banner-text{color:' + (document.getElementById('simple_banner_text_color').value || '#ffffff') + '}'
            )
        );
        document.getElementsByTagName('head')[0].appendChild(style_dynamic);
    };
    document.getElementById('simple_banner_text_color_show').onchange = function(e) {
        document.getElementById('simple_banner_text_color').value = e.target.value;
        document.getElementById('simple_banner_text_color').dispatchEvent(new Event('change'));
    };

    // Link Color
    style_link_color.type = 'text/css';
    style_link_color.id = 'preview_banner_link_color'
    style_link_color.appendChild(document.createTextNode('.simple-banner .simple-banner-text a{color:' + (document.getElementById('simple_banner_link_color').value || '#424242') + '}'));
    document.getElementsByTagName('head')[0].appendChild(style_link_color);

    document.getElementById('simple_banner_link_color').onchange = function(e) {
        document.getElementById('simple_banner_link_color_show').value = e.target.value || '#424242';
        var child = document.getElementById('preview_banner_link_color');
        if (child) {
            child.innerText = "";
            child.id = '';
        }

        var style_dynamic = document.createElement('style');
        style_dynamic.type = 'text/css';
        style_dynamic.id = 'preview_banner_link_color';
        style_dynamic.appendChild(
            document.createTextNode(
                '.simple-banner .simple-banner-text a{color:' + (document.getElementById('simple_banner_link_color').value || '#424242') + '}'
            )
        );
        document.getElementsByTagName('head')[0].appendChild(style_dynamic);
    };
    document.getElementById('simple_banner_link_color_show').onchange = function(e) {
        document.getElementById('simple_banner_link_color').value = e.target.value;
        document.getElementById('simple_banner_link_color').dispatchEvent(new Event('change'));
    };

    // remove banner text newlines on submit
    document.getElementById('submit').onclick = function(e) {
        document.getElementById('simple_banner_text').value = document.getElementById('simple_banner_text').value.replace(/\n/g, "");
    };

</script>
<?php
}
?>
