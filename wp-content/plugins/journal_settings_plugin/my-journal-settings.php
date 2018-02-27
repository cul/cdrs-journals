<?php
/*
	Plugin Name: Custom Journal Settings
	Plugin URI: http://cdrs.columbia.edu
	Description: Adds a custom journals settings page to your dash
	Author: Megan O'Neill
	Version: 0.1-alpha
	Author URI: http://cdrs.columbia.edu
	Domain Path: /lang
 */
function my_admin_menu() {
    $page = add_theme_page( 'Journal Settings', 'Journal Settings', 'edit_theme_options', 'my-theme-options', 'my_theme_options' );
    add_action( 'admin_print_styles-' . $page, 'my_admin_scripts' );
}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_scripts() {
    // We'll put some javascript & css here later
    wp_enqueue_media();
    wp_enqueue_script('the-color-picker', plugins_url('custom-journal-settings/the-color-picker.js'), array( 'jquery' ));
    wp_enqueue_style('journal_settings', plugins_url('custom-journal-settings/journal_settings.css'));
    wp_localize_script( 'the-color-picker', 'logoSelector', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'menuLogoSelector', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'backgroundSelector', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'backgroundRemove', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'logoRemove', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'menuLogoRemove', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'faviconRemove', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'faviconSelector', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'socialAdd', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_localize_script( 'the-color-picker', 'descAdd', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_media();
}

add_action("wp_ajax_logo_save", "logo_save");
add_action("wp_ajax_menu_logo_save", "menu_logo_save");
add_action("wp_ajax_background_image_save", "background_image_save");
add_action("wp_ajax_background_image_remove", "background_image_remove");
add_action("wp_ajax_logo_remove", "logo_remove");
add_action("wp_ajax_menu_logo_remove", "menu_logo_remove");
add_action("wp_ajax_favicon_save", "favicon_save");
add_action("wp_ajax_favicon_remove", "favicon_remove");
add_action("wp_ajax_social_add", "social_add");
add_action("wp_ajax_desc_add", "desc_add");


function logo_save(){
   update_option('logo_url', $_POST['logo_url']);
}

function menu_logo_save(){
   update_option('menu_logo_url', $_POST['menu_logo_url']);
}

function background_image_save(){
   update_option('background_image_url', $_POST['background_image_url']);
}

function background_image_remove(){
    delete_option('background_image_url');
}

function logo_remove(){
    delete_option('logo_url');
}

function menu_logo_remove(){
    delete_option('menu_logo_url');
}

function favicon_save(){
   update_option('favicon_url', $_POST['favicon_url']);
}

function favicon_remove(){
    delete_option('favicon_url');
}

function social_add(){
    update_option('social_option', true);
}

function desc_add(){
    $words = explode(" ", $_POST['site_desc']);
    $count = count($words);
    if ( !empty( $_POST['site_desc'] ) && ($count <= 60)){
        update_option('site_desc', $_POST['site_desc']);
    }
}

function my_theme_options() {
    ?>
    <div class="wrap">
        <div id="icon-themes" class="icon32" ><br></div>
        <h2>Journal Settings</h2>

        <h3 class="nav-tab-wrapper">
            <p  class="nav-tab active" id="general_admin">
                General

            </p>
            <p  class="nav-tab" id="style">
                Style & Color

            </p><p class="nav-tab" id="footer" >
                Footer

            </p><p  class="nav-tab" id="social_media">
                Social Media
            </p>
        </h3>

        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php wp_nonce_field( 'update-options' ); ?>
            <?php settings_fields( 'my-theme-options' ); ?>
            <?php do_settings_sections( 'my-theme-options' ); ?>
            <p class="submit">
                <input id="journal_settings_submit" name="Submit" type="submit" class="button-primary" value="Save Changes" />
            </p >
        </form>
    </div>
    <?php
}

function my_admin_init() {
    register_setting( 'my-theme-options', 'my-theme-options', 'validate_setting' );
    add_settings_section( 'section_general', 'Style & Color Settings', 'my_section_general', 'my-theme-options' );
    add_settings_field('favicon', 'Favicon', 'favicon_load', 'my-theme-options', 'section_general');
    add_settings_field('logo', 'Logo:', 'logo_setting', 'my-theme-options', 'section_general');
    add_settings_field('menu_logo', 'Menu Logo:', 'menu_logo_setting', 'my-theme-options', 'section_general');
    add_settings_field('back_image', 'Background Image:', 'back_image', 'my-theme-options', 'section_general');
    add_settings_field( 'back_color', 'Background Color', 'my_background_color', 'my-theme-options', 'section_general' );
    add_settings_field( 'heading_color', 'Heading Color', 'my_heading_color', 'my-theme-options', 'section_general' );
	add_settings_field( 'text_color', 'Text Color', 'my_text_color', 'my-theme-options', 'section_general' );
	add_settings_field( 'link_color', 'Link Color', 'link_color', 'my-theme-options', 'section_general' );
    add_settings_field( 'link_color_hover', 'Link Color (Hover)', 'link_color_hover', 'my-theme-options', 'section_general' );
    add_settings_field( 'menu_back_color', 'Menu Background Color', 'my_menu_back_color', 'my-theme-options', 'section_general' );
    add_settings_field( 'menu_hover_color', 'Menu Background Color (Hover)', 'menu_hover_color', 'my-theme-options', 'section_general' );
    add_settings_field( 'menu_text_color', 'Menu Text Color', 'menu_text_color_set', 'my-theme-options', 'section_general' );
    add_settings_field( 'menu_hover_text_color', 'Menu Text Color (Hover)', 'menu_text_hover_color', 'my-theme-options', 'section_general' );
	add_settings_field( 'active_menu_color', 'Menu Background Color (Active)', 'active_menu_color', 'my-theme-options', 'section_general' );
    add_settings_field( 'home_menu_color_hover', 'Home Menu Color (hover)', 'home_menu_color_hover', 'my-theme-options', 'section_general' );
    add_settings_field( 'home_menu_back_color_hover', 'Home Menu Background Color (hover)', 'home_menu_back_color_hover', 'my-theme-options', 'section_general' );
    add_settings_field( 'text_setting', 'Font', 'text_setting', 'my-theme-options', 'section_general' );

    
    register_setting( 'my-theme-options', 'my-footer-options');
    add_settings_section( 'footer_general', 'Footer Settings', 'my_footer_general', 'my-theme-options' );
    add_settings_field('copyright', 'Copyright License:', 'copyright_settings', 'my-theme-options', 'footer_general'); 
    add_settings_field('copyright_url', '', 'copyright_setting_url', 'my-theme-options', 'footer_general'); 
    add_settings_field('manual_copyright', 'Custom Copyright Statement:', 'custom_copyright', 'my-theme-options', 'footer_general'); 
    add_settings_field('school_affiliation', 'School Affiliation:', 'school_affiliation', 'my-theme-options', 'footer_general'); 
    add_settings_field('school_affiliation_url', '', 'school_affiliation_url', 'my-theme-options', 'footer_general'); 
    add_settings_field( 'issn_print', 'ISSN(print)', 'my_print_issn', 'my-theme-options', 'footer_general' );
    add_settings_field( 'issn_online', 'ISSN(online)', 'my_online_issn', 'my-theme-options', 'footer_general' );
    add_settings_field('ac_partner', 'Academic Commons Partner?', 'ac_partner_setting', 'my-theme-options', 'footer_general');

    register_setting( 'my-theme-options', 'social-media-options');
    add_settings_section( 'social_general', 'Social Media Settings', 'my_social_general', 'my-theme-options' );
    add_settings_field('twitter_name', 'Twitter Name', 'twitter_name', 'my-theme-options', 'social_general'); 
    add_settings_field('fb_name', 'Facebook Name', 'fb_name', 'my-theme-options', 'social_general');
    add_settings_field('linkedin_name', 'LinkedIn Name', 'linkedin_name', 'my-theme-options', 'social_general');
    add_settings_field('email_address', 'Email Address', 'email_address', 'my-theme-options', 'social_general');

    register_setting( 'my-theme-options', 'general-options');
    add_settings_section( 'options_general', 'General Settings', 'my_options_general', 'my-theme-options' );
    add_settings_field('site_desc', 'Description', 'site_desc', 'my-theme-options', 'options_general'); 
    add_settings_field('full_text_setting', 'This site displays: ', 'full_text_setting', 'my-theme-options', 'options_general');
    add_settings_field('site_title_setting', 'Display site title on home page? ', 'site_title_setting', 'my-theme-options', 'options_general');
    add_settings_field('featured_image_setting', 'Display featured image on issues page? ', 'featured_image_setting', 'my-theme-options', 'options_general');
    add_settings_field('cc_setting', 'Using Creative Commons license? ', 'cc_setting', 'my-theme-options', 'options_general');
}
add_action( 'admin_init', 'my_admin_init' );


function my_section_general() {
    
}

function favicon_load() {
    echo '<input id="favicon" type="file" name="favicon" /></br>';
    $current_favicon = get_option('favicon_url');
    if($current_favicon){
        echo '<img id="favicon_init" src="'. $current_favicon .'"></br>';
    }
    echo '<span class="small">*Please upload a 16x16 image</span>';

 }

//logo uploader
function logo_setting() {
 	echo '<input id="logo" type="file" name="logo" />';
    $current_logo = get_option('logo_url');
    if($current_logo){
        echo '<img id="logo_init" src="'. $current_logo .'"></br>';
    }

 }

 function menu_logo_setting() {
    echo '<input id="menu_logo" type="file" name="menu_logo" />';
    $current_logo = get_option('menu_logo_url');
    if($current_logo){
        echo '<img id="menu_logo_init" src="'. $current_logo .'"></br>';
    }

 }

 function back_image() {
 	echo '<input id="back_image" type="file" name="back_image" />';
    $current_back_image = get_option('background_image_url');
    if($current_back_image){
        echo '<img id="back_image_init" src="'. $current_back_image .'"></br>';
    }

 }

//for the link color
function link_color() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['link_color'] != "" ) ? sanitize_text_field( $options['link_color'] ) : '#3D9B0C';
    echo '<input id="link_color" class="color" name="my-theme-options[link_color]" type="text" value="' . $color .'" />';

}

function link_color_hover() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['link_color_hover'] != "" ) ? sanitize_text_field( $options['link_color_hover'] ) : '#3D9B0C';
    echo '<input id="link_color_hover" class="color" name="my-theme-options[link_color_hover]" type="text" value="' . $color .'" />';

}

//for the background color
function my_background_color() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['background_color'] != "" ) ? sanitize_text_field( $options['background_color'] ) : '#3D9B0C';
    echo '<input id="back_color" class="color" name="my-theme-options[background_color]" type="text" value="' . $color .'" />';

}

//for the h1s etc
function my_heading_color() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['heading_color'] != "" ) ? sanitize_text_field( $options['heading_color'] ) : '#3D9B0C';
    echo '<input id="heading_color" class="color" name="my-theme-options[heading_color]" type="text" value="' . $color .'" />';
}

//for the text color
function my_text_color() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['text_color'] != "" ) ? sanitize_text_field( $options['text_color'] ) : '#3D9B0C';
    echo '<input id="text_color" class="color" name="my-theme-options[text_color]" type="text" value="' . $color .'" />';

}

//for the menu background color
function my_menu_back_color() {
    $options = get_option( 'my-theme-options' );
    $colors = ( $options['menu_back_color'] != "" ) ? sanitize_text_field( $options['menu_back_color'] ) : '#3D9B0C';
    echo '<input id="menu_back_color" class="color" name="my-theme-options[menu_back_color]" type="text" value="' . $colors .'" />';

}

//for the menu text color
function menu_text_color_set() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['menu_text_color'] != "" ) ? sanitize_text_field( $options['menu_text_color'] ) : '#3D9B0C';
    echo '<input id="menu_text_color" class="color" name="my-theme-options[menu_text_color]" type="text" value="' . $color .'" />';

}

//for the menu background hover color
function menu_hover_color() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['menu_hover_color'] != "" ) ? sanitize_text_field( $options['menu_hover_color'] ) : '#3D9B0C';
    echo '<input id="menu_hover_color" class="color" name="my-theme-options[menu_hover_color]" type="text" value="' . $color .'" />';

}

//for the menu background hover color
function menu_text_hover_color() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['menu_text_hover_color'] != "" ) ? sanitize_text_field( $options['menu_text_hover_color'] ) : '#3D9B0C';
    echo '<input id="menu_text_hover_color" class="color" name="my-theme-options[menu_text_hover_color]" type="text" value="' . $color .'" />';

}

function active_menu_color() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['active_menu_color'] != "" ) ? sanitize_text_field( $options['active_menu_color'] ) : '#3D9B0C';
    echo '<input id="active_menu_color" class="color" name="my-theme-options[active_menu_color]" type="text" value="' . $color .'" />';

}

function home_menu_color_hover() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['home_menu_color_hover'] != "" ) ? sanitize_text_field( $options['home_menu_color_hover'] ) : '#3D9B0C';
    echo '<input id="home_menu_color_hover" class="color" name="my-theme-options[home_menu_color_hover]" type="text" value="' . $color .'" />';

}

function home_menu_back_color_hover() {
    $options = get_option( 'my-theme-options' );
    $color = ( $options['home_menu_back_color_hover'] != "" ) ? sanitize_text_field( $options['home_menu_back_color_hover'] ) : '#3D9B0C';
    echo '<input id="home_menu_back_color_hover" class="color" name="my-theme-options[home_menu_back_color_hover]" type="text" value="' . $color .'" />';

}


function text_setting() {
    $options = get_option( 'my-theme-options' );
    $font_selection = ( $options['text_setting'] != "" ) ? sanitize_text_field( $options['text_setting'] ) : '';
    echo '<select id="text_setting"  name="my-theme-options[text_setting]" >';
        $fonts = array('Default', 'Serif', 'Sans-serif');
        $current_font = $font_selection;

    foreach($fonts as $font) {
        if($font == $current_font) {
            echo '<option selected="selected" value="' . $font . '">'.$font.'</option>';
        }else {
            echo '<option value="' . $font . '">'.$font.'</option>';
        }
    }
    echo '</select>';

}


//validating uploaded images
function validate_setting($my_theme_options) {
	$keys = array_keys($_FILES); $i = 0; foreach ( $_FILES as $image ) {   // if a files was upload
		if ($image['size']) {     // if it is an image
			if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {
				$override = array('test_form' => false);       // save the file, and store an array, containing its location in $file
				$file = wp_handle_upload( $image, $override );
				$my_theme_options[$keys[$i]] = $file['url'];
			} else {       // Not an image.
				$options = get_option('my-theme-options');
				$my_theme_options[$keys[$i]] = $options[$logo];       // Die and let the user know that they made a mistake.
				wp_die('No image was uploaded.');
			}
		}   // Else, the user didn't upload a file.   // Retain the image that's already on file.
		else {
	   		 $options = get_option('my-theme-options');
	   		 $my_theme_options[$keys[$i]] = $options[$keys[$i]];
	   		 }
	   	$i++;
	   } return $my_theme_options;
}


//calling the color picker scripts
add_action( 'admin_enqueue_scripts', 'wp_enqueue_color_picker' );
function wp_enqueue_color_picker( ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('the-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

//Inserting the style into the head
function my_wp_head() {
    $options = get_option( 'my-theme-options' );
    $color = $options['link_color'];
    $link_hover = $options['link_color_hover'];
    $background_color = $options['background_color'];
    $text_color = $options['text_color'];
    $heading_color = $options['heading_color'];
    $menu_background_color = $options['menu_back_color'];
    $menu_text_color = $options['menu_text_color'];
    $menu_hover_color = $options['menu_hover_color'];
    $menu_text_hover_color = $options['menu_text_hover_color'];
    $back_image = get_option('background_image_url');
    $active_menu = $options['active_menu_color'];
    $font = $options['text_setting'];
    $home_font_hover = $options['home_menu_color_hover'];
    $home_back_hover = $options['home_menu_back_color_hover'];
    ?>
        <style> a { color: <?php echo $color ?>; }
            a:hover {color: <? echo $link_hover ?>;}
    	   body {background-color: <?php echo $background_color ?>;
    	   		 color: <?php echo $text_color ?>;
                 background-image: url("<?php echo $back_image ?>");
                 font-family: <?php if($font != 'Default'){ echo $font; } ?>;
                  }
    	   h1, h2, h3, h4 { color: <?php echo $heading_color ?>; }
           div#bs-example-navbar-collapse-1.collapse.navbar-collapse li:hover,  div#bs-example-navbar-collapse-1 a.dropdown-toggle:hover {
            background-color: <?php echo $menu_hover_color ?>;
           }
         /*  #footer_container {
            width: 100%;
            background-color: <?php echo $menu_background_color ?>;
           }*/
           div#bs-example-navbar-collapse-1 a{
            color: <?php echo $menu_text_color ?>;
           }
           div.navbar-header a.navbar-brand{ color: <?php echo $menu_text_color ?>; }
           div.navbar-header a.navbar-brand:hover{ background-color: <?php echo $menu_hover_color ?>;
                color: <?php echo $menu_text_hover_color ?>;}
           #cujo-navbar li.active a, div#bs-example-navbar-collapse-1 li.active a{
                background-color: <?php echo $active_menu ?>; 
           }
           div#bs-example-navbar-collapse-1 a:hover {
            color: <?php echo $menu_text_hover_color ?>;
           }
           div#bs-example-navbar-collapse-1 a:checked{
            color: <?php echo $menu_text_hover_color ?>;
            background-color: <?php echo $menu_hover_color ?>;
           }
           .navbar-default .navbar-nav > .open > a .caret,.navbar-default .navbar-nav > .open > a, 
           .navbar-default .navbar-nav > .open > a:hover, 
           .navbar-default .navbar-nav > .open > a:focus{
            color: <?php echo $menu_text_hover_color ?>;
            background-color: <?php echo $menu_hover_color ?>;
           }
           div#bs-example-navbar-collapse-1 ul a:hover{
            color: <?php echo $menu_text_hover_color ?>;
            background-color: <?php echo $menu_hover_color ?>;
           }
           div.container-fluid{ background-color: <?php echo $menu_background_color ?>;}
           nav.navbar.navbar-default.navbar-fixed-top div.container-fluid{ background-color: <?php echo $menu_background_color ?>;
            color: <?php echo $menu_text_color ?>;}
           #cujo-navbar a {color: <?php echo $menu_text_color ?>;}
           #cujo-navbar a:hover { background-color: <?php echo $menu_hover_color ?>;
                color: <?php echo $menu_text_hover_color ?>;}
            #home-access-nav li a:hover{
                color: <?php echo $home_font_hover ?>;
                background-color: <?php echo $home_back_hover ?> !important;
            }

    	 </style>
    <?php

}

add_action( 'wp_head', 'my_wp_head' );


//ADDING FOOTER ACTION TO THE PLUGIN
function my_footer_general() {
    
}

function copyright_settings() {
    $options = get_option( 'my-footer-options' );
    $copyright = ( $options['copyright'] != "" ) ? sanitize_text_field( $options['copyright'] ) : '';
    echo '<input id="copyright"  placeholder="name" name="my-footer-options[copyright]" type="text" value="' . $copyright .'" />';

}

function copyright_setting_url() {
    $options = get_option( 'my-footer-options' );
    $copyright_url = ( $options['copyright_url'] != "" ) ? sanitize_text_field( $options['copyright_url'] ) : '';
    echo '<input id="copyright_url"  placeholder="url" name="my-footer-options[copyright_url]" type="text" value="' . $copyright_url .'" />';

}

//textbox for print issn
function my_print_issn() {
    $options = get_option( 'my-footer-options' );
    $print = ( $options['print_issn'] != "" ) ? sanitize_text_field( $options['print_issn'] ) : '';
    echo '<input id="issn_print" name="my-footer-options[print_issn]" type="text" value="' . $print .'" />';

}

//textbox for online issn
function my_online_issn() {
    $options = get_option( 'my-footer-options' );
    $print = ( $options['online_issn'] != "" ) ? sanitize_text_field( $options['online_issn'] ) : '';
    echo '<input id="issn_online" name="my-footer-options[online_issn]" type="text" value="' . $print .'" />';
}

function ac_partner_setting() {
    $options = get_option( 'my-footer-options' );

    // Get the value of this option.
    $checked = $options['ac_partner'];

    // The value to compare with (the value of the checkbox below).
    $current = 1;

    // True by default, just here to make things clear.
    $echo = true;

    ?>
    <input id="ac_partner"  type="checkbox" name="my-footer-options[ac_partner]" type="text" value="1" <?php if ( 1 == $options['ac_partner'] ) echo 'checked="checked"'; ?> />

    <?php
}

function custom_copyright(){
    $options = get_option( 'my-footer-options' );
    $custom_copyright = ( $options['custom_copyright'] != "" ) ? sanitize_text_field( $options['custom_copyright'] ) : '';
    echo 'OR</br>';
    echo '<input id="custom_copyright" name="my-footer-options[custom_copyright]" type="text" value="' . $custom_copyright .'" />';
}


function full_text_setting(){
    $options = get_option( 'general-options' );
    ?>
    Abstract
    <input type="radio" name="general-options[full_text_setting]" value="abstract"<?php checked( 'abstract' == $options['full_text_setting'] ); ?> />
    Full Text
    <input type="radio" name="general-options[full_text_setting]" value="full_text"<?php checked( 'full_text' == $options['full_text_setting'] ); ?> />
    <?php
}

function school_affiliation() {
    $options = get_option( 'my-footer-options' );
    $school = ( $options['school_affiliation'] != "" ) ? sanitize_text_field( $options['school_affiliation'] ) : '';
    echo '<input id="school_affiliation"  placeholder="name" name="my-footer-options[school_affiliation]" type="text" value="' . $school .'" />';

}

function school_affiliation_url() {
    $options = get_option( 'my-footer-options' );
    $school_url = ( $options['school_affiliation_url'] != "" ) ? sanitize_text_field( $options['school_affiliation_url'] ) : '';
    echo '<input id="school_affiliation_url"  placeholder="url" name="my-footer-options[school_affiliation_url]" type="text" value="' . $school_url .'" />';

}

function my_social_general() {
    
}

function twitter_name() {
    $options = get_option( 'social-media-options' );
    $twitter_name = ( $options['twitter_name'] != "" ) ? sanitize_text_field( $options['twitter_name'] ) : '';
    echo '<input id="twitter_name"  placeholder="name" name="social-media-options[twitter_name]" type="text" value="' . $twitter_name .'" />';

}

function fb_name(){
    $options = get_option( 'social-media-options' );
    $fb_name = ( $options['fb_name'] != "" ) ? sanitize_text_field( $options['fb_name'] ) : '';
    echo '<input id="fb_name"  placeholder="name" name="social-media-options[fb_name]" type="text" value="' . $fb_name .'" />';

}

function linkedin_name(){
    $options = get_option( 'social-media-options' );
    $linkedin_name = ( $options['linkedin_name'] != "" ) ? sanitize_text_field( $options['linkedin_name'] ) : '';
    echo '<input id="linkedin_name"  placeholder="name" name="social-media-options[linkedin_name]" type="text" value="' . $linkedin_name .'" />';

}

function email_address(){
    $options = get_option( 'social-media-options' );
    $email_address = ( $options['email_address'] != "" ) ? sanitize_text_field( $options['email_address'] ) : '';
    echo '<input id="email_address"  name="social-media-options[email_address]" type="text" value="' . $email_address .'" />';

}

function social_option(){
    $options = get_option( 'social-media-options' );
    ?>
    Yes
    <input id="social_yes" type="radio" name="social-media-options[social_option]" value="yes"<?php checked( 'yes' == $options['social_option'] ); ?> />
    No
    <input id="social_no" type="radio" name="social-media-options[social_option]" value="no"<?php checked( 'no' == $options['social_option'] ); ?> />
    <?php
}

function my_options_general() {
    
}


function site_desc() {
    $desc = get_option( 'site_desc' );
    $args = array("textarea_name" => "site_desc", "wpautop" => false);
    echo wp_editor($desc , 'site_desc', $args);
    echo '<p>*This will appear on your site\'s home page. Please limit to 55 words or fewer.</p>';
}

function site_title_setting(){
    $options = get_option( 'general-options' );
    ?>
    Yes
    <input type="radio" name="general-options[site_title_setting]" value="yes"<?php checked( 'yes' == $options['site_title_setting'] ); ?> />
    No
    <input type="radio" name="general-options[site_title_setting]" value="no"<?php checked( 'no' == $options['site_title_setting'] ); ?> />
    <?php
}

function featured_image_setting(){
    $options = get_option( 'general-options' );
    ?>
    Yes
    <input type="radio" name="general-options[featured_image_setting]" value="yes"<?php checked( 'yes' == $options['featured_image_setting'] ); ?> />
    No
    <input type="radio" name="general-options[featured_image_setting]" value="no"<?php checked( 'no' == $options['featured_image_setting'] ); ?> />
    <?php
}

function cc_setting() {
    $options = get_option( 'general-options' );
    $cc_setting = ( $options['cc_setting'] != "" ) ? sanitize_text_field( $options['cc_setting'] ) : '';
    echo '<select id="cc_setting"  name="general-options[cc_setting]" >';
        $license = array('None', 'CC BY', 'CC BY-SA', 'CC BY-ND', 'CC BY-NC', 'CC BY-NC-SA', 'CC BY-NC-ND');
        $current_license = $cc_setting;

    foreach($license as $l) {
        if($l == $current_license) {
            echo '<option selected="selected" value="' . $l . '">'.$l.'</option>';
        }else {
            echo '<option value="' . $l . '">'.$l.'</option>';
        }
    }
    echo '</select>';
}

remove_filter('site_desc','wpautop');


