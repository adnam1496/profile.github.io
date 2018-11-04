<?php
/*
Plugin Name: Facebook Messenger for WordPress
Plugin URI: https://www.brontobytes.com/blog/facebook-messenger-free-wordpress-plugin/
Description: Live chat with your visitors using Facebook Messenger.
Author: Brontobytes
Author URI: https://www.brontobytes.com/
Version: 2.2
License: GPLv2
*/

if ( ! defined( 'ABSPATH' ) )
	exit;

function fb_messenger_menu() {
	add_options_page('FB Messenger Settings', 'FB Messenger', 'administrator', 'fb-messenger-settings', 'fb_messenger_settings_page', 'dashicons-admin-generic');
}
add_action('admin_menu', 'fb_messenger_menu');

function fb_messenger_settings_page() { ?>
<div class="wrap">
<h2>FB Messenger Settings</h2>
<p>This plugin allows your visitors to easily contact with your business using Facebook Messenger.</p>
<form method="post" action="options.php">
    <?php
		settings_fields( 'fb-messenger-settings' );
		do_settings_sections( 'fb-messenger-settings' );
	?>
	<!-- WP Img Uploader -->
	<script>
    jQuery(document).ready(function($){
    var custom_uploader;
    $('#fb_messenger_upload_image_button').click(function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: true
        });
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            console.log(custom_uploader.state().get('selection').toJSON());
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#fb_messenger_upload_image').val(attachment.url);
        });
        //Open the uploader dialog
        custom_uploader.open();
    });
	});
	</script>
	<!-- WP Img Uploader - END -->
	
    <table class="form-table">
        <tr valign="top">
			<th scope="row"><label for="fb_messenger_page">Facebook Page</label></th>
			<td>
				<input type="text" size="50" name="fb_messenger_page" value="<?php echo esc_attr( get_option('fb_messenger_page') ); ?>" /> <small>Ex. https://www.facebook.com/WordPress/<br />This has to be a Facebook Page. Groups and Profiles are not accepted.<br />To enable messaging on your Facebook page visit https://www.facebook.com/YOUR_PAGE_NAME/settings/?tab=settings&amp;section=messages&amp;view</small>
			</td>
        </tr>
		<tr valign="top">
			<th scope="row"><label for="fb_messenger_timeline_tab">Show Timeline Tab</label></th>
			<td>
				<input type="checkbox" name="fb_messenger_timeline_tab" value="true" <?php echo ( get_option('fb_messenger_timeline_tab') == true ) ? ' checked="checked" />' : ' />'; ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="fb_messenger_events_tab">Show Events Tab</label></th>
			<td>
				<input type="checkbox" name="fb_messenger_events_tab" value="true" <?php echo ( get_option('fb_messenger_events_tab') == true ) ? ' checked="checked" />' : ' />'; ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="fb_messenger_lang">Language</label></th>
			<td>
				<input type="text" size="10" name="fb_messenger_lang" value="<?php echo esc_attr( get_option('fb_messenger_lang') ); ?>" /> <small>Ex. en_US<br />All supported languages available at <a href="https://www.facebook.com/translations/FacebookLocales.xml">https://www.facebook.com/translations/FacebookLocales.xml</a></small>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="fb_messenger_hide_button">Hide the Chat button</label></th>
			<td>
				<input type="checkbox" name="fb_messenger_hide_button" value="true" <?php echo ( get_option('fb_messenger_hide_button') == true ) ? ' checked="checked" />' : ' />'; ?><br /><small>You can also call the chat modal with a text link: &lt;a href="#fb-messenger"&gt;Chat Now&lt;/a&gt;</small>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="fb_messenger_left_side">Chat button on the Left Side</label></th>
			<td>
				<input type="checkbox" name="fb_messenger_left_side" value="true" <?php echo ( get_option('fb_messenger_left_side') == true ) ? ' checked="checked" />' : ' />'; ?>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="fb_messenger_icon">Custom chat button Icon</label></th>
			<td>
				<label for="fb_messenger_upload_image">
					<input id="fb_messenger_upload_image" name="fb_messenger_upload_image" type="text" size="50" value="<?php echo esc_attr( get_option('fb_messenger_upload_image') ); ?>" /> 
					<input id="fb_messenger_upload_image_button" name="fb_messenger_upload_image_button" class="button" type="button" value="Upload Image" /><br />
					<small>Enter a URL (http://) or Upload an Image. <i><a href="<?php echo plugins_url( 'images/fb-messenger-icons.zip', __FILE__ ) ?>">Download</a> a sample set of Facebook Messenger Icons.</i></small>
				</label>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="fb_messenger_powered_by">Discreet 'powered by' link</label></th>
			<td>
				<input type="checkbox" name="fb_messenger_powered_by" value="true" <?php echo ( get_option('fb_messenger_powered_by') == true ) ? ' checked="checked" />' : ' />'; ?><br /><small>We are very happy to be able to provide this and other <a href="https://www.brontobytes.com/blog/c/wordpress-plugins/">free WordPress plugins</a></small>
			</td>
		</tr>
    </table>
    <?php submit_button(); ?>
</form>
<p>Plugin developed by <a href="https://www.brontobytes.com/"><img width="100" style="vertical-align:middle" src="<?php echo plugins_url( 'images/brontobytes.svg', __FILE__ ) ?>" alt="Web hosting provider"></a></p>
</div>
<?php }

function fb_messenger_settings() {
	register_setting( 'fb-messenger-settings', 'fb_messenger_page' );
	register_setting( 'fb-messenger-settings', 'fb_messenger_timeline_tab' );
	register_setting( 'fb-messenger-settings', 'fb_messenger_events_tab' );
	register_setting( 'fb-messenger-settings', 'fb_messenger_lang' );
	register_setting( 'fb-messenger-settings', 'fb_messenger_hide_button' );
	register_setting( 'fb-messenger-settings', 'fb_messenger_left_side' );
	register_setting( 'fb-messenger-settings', 'fb_messenger_upload_image' );
	register_setting( 'fb-messenger-settings', 'fb_messenger_upload_image_button' );
	register_setting( 'fb-messenger-settings', 'fb_messenger_powered_by' );
}
add_action( 'admin_init', 'fb_messenger_settings' );

function fb_messenger_deactivation() {
    delete_option( 'fb_messenger_page' );
    delete_option( 'fb_messenger_timeline_tab' );
    delete_option( 'fb_messenger_events_tab' );
    delete_option( 'fb_messenger_lang' );
    delete_option( 'fb_messenger_hide_button' );
    delete_option( 'fb_messenger_left_side' );
    delete_option( 'fb_messenger_upload_image' );
    delete_option( 'fb_messenger_upload_image_button' );
    delete_option( 'fb_messenger_powered_by' );
}
register_deactivation_hook( __FILE__, 'fb_messenger_deactivation' );

function fb_messenger_dependencies() {
	wp_register_script( 'fb-messenger-index', plugins_url('js/index.js', __FILE__),  array('jquery'), '', true );
	wp_enqueue_script( 'fb-messenger-index' );
	wp_register_style( 'fb-messenger-style', plugins_url('css/style.css', __FILE__) );
	wp_enqueue_style( 'fb-messenger-style' );
}
add_action( 'wp_enqueue_scripts', 'fb_messenger_dependencies' );

//WP Img Uploader
function fb_messenger_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'fb-messenger-settings') {
        wp_enqueue_media();
        wp_register_script('fb-messenger-admin-js', plugins_url('js/index.js', __FILE__), array('jquery'));
        wp_enqueue_script('fb-messenger-admin-js');
    }
}
add_action('admin_enqueue_scripts', 'fb_messenger_admin_scripts');

function fb_messenger() { ?>
<!-- FB Messenger -->
<?php if (get_option('fb_messenger_hide_button') != true) {
$fb_messenger_upload_image = get_option( 'fb_messenger_upload_image' );
if ( empty( $fb_messenger_upload_image ) ) $fb_messenger_upload_image = plugins_url( 'images/fb-messenger.png', __FILE__ );
?>
<div id="fbMsg<?php if (get_option('fb_messenger_left_side') == true) { ?>-leftside<?php } ?>">
	<img data-remodal-target="fb-messenger" src="<?php echo $fb_messenger_upload_image; ?>">
</div>
<?php }//hide_button ?>

<div class="remodal" data-remodal-id="fb-messenger">
	<div class="fb-page" data-tabs="messages<?php if (get_option('fb_messenger_timeline_tab') == true) { ?>, timeline<?php } ?><?php if (get_option('fb_messenger_events_tab') == true) { ?> , events<?php } ?>" data-href="<?php echo esc_attr( get_option('fb_messenger_page') ); ?>" data-width="310" data-height="330" data-href="<?php echo esc_attr( get_option('fb_messenger_page') ); ?>" data-small-header="true"  data-hide-cover="false" data-show-facepile="true" data-adapt-container-width="true">
		<div class="fb-xfbml-parse-ignore">
			<blockquote>Loading...</blockquote>
		</div>
	</div>
	<?php if (get_option('fb_messenger_powered_by') == true) { ?> <div style="font-size:x-small;"><a href="https://www.brontobytes.com/blog/facebook-messenger-free-wordpress-plugin/">Facebook Messenger for Wordpress</a></div> <?php } ?>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php if (get_option('fb_messenger_lang')==''){ echo "en_US"; }else{ echo esc_attr( get_option('fb_messenger_lang') ); } ?>/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- End FB Messenger -->
<?php
}
add_action( 'wp_footer', 'fb_messenger', 10 );