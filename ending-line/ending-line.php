<?php
/**
* A sample plugin that appends a line to every post
* Take this as a base plugin and modify as per your need.
*
* @package Ending Line Wordpress Plugin
* @author Codemancers
* @license MIT
* @link https://github.com/code-mancers/ending-line-wp-plugin
* @copyright 2019 Codemancers Technologies. All rights reserved.
*
*            @wordpress-plugin
*            Plugin Name: Ending Line Wordpress Plugin
*            Plugin URI: https://github.com/code-mancers/ending-line-wp-plugin
*            Description: A sample plugin that appends a line to every post.
*            Version: 1.0
*            Author: Codemancers
*            Author URI: https://codemancers.com/
*            Text Domain: ending-line-wp-plugin
*            Contributors: Codemancers
*/

/**
* Adding Submenu under Settings Tab
*
* @since 1.0
*/
function add_submenu() {
  add_submenu_page (
    "options-general.php",
    "Ending Line Plugin",
    "Ending Line Plugin",
    "manage_options",
    "ending-line-wp-plugin",
    "start_plugin"
  );
}
add_action ( "admin_menu", "add_submenu" );

/**
* Setting Page Options
* - add setting page
* - save setting page
*
* @since 1.0
*/
function start_plugin() {
  ?>
  <div class="wrap">
    <h1>
      A Sample Plugin Template By <a
      href="https://codemancers.com/" target="_blank">Codemancers</a>
    </h1>

    <form method="post" action="options.php">
      <?php
      settings_fields ( "ending_line_config" );
      do_settings_sections ( "ending-line-wp-plugin" );
      submit_button ();
      ?>
    </form>
  </div>

  <?php
}

/**
* Init setting section, Init setting field and register settings page
*
* @since 1.0
*/
function init_plugin_settings() {
  add_settings_section ( "ending_line_config", "", null, "ending-line-wp-plugin" );
  add_settings_field ( "ending-line-text", "This is sample Textbox", "get_options", "ending-line-wp-plugin", "ending_line_config" );
  register_setting ( "ending_line_config", "ending-line-text" );
}
add_action ( "admin_init", "init_plugin_settings" );

/**
* Add simple textfield value to setting page
*
* @since 1.0
*/
function get_options() {
  ?>
  <div class="postbox" style="width: 65%; padding: 30px;">
    Provide any text value here for appending it to end of every post.<br />
    <input type="text" name="ending-line-text"
    value="<?php
    echo stripslashes_deep ( esc_attr ( get_option ( 'ending-line-text' ) ) );
    ?>" />
  </br>
</div>
<?php
}

/**
* Append saved textfield value to each post
*
* @since 1.0
*/
add_filter ( 'the_content', 'append_content' );
function append_content($content) {
  return $content.stripslashes_deep ( esc_attr ( get_option ( 'ending-line-text' ) ) );
}
?>