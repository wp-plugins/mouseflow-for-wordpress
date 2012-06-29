<?php
/*
Plugin Name: Mouseflow
Plugin URI: http://mouseflow.com
Description: Integrate Mouseflow analytics on your blog. Create a free account <a href="http://mouseflow.com">here</a>, and paste in your recording code <a href="options-general.php?page=mouseflow-for-wordpress">here</a>.
Author: Mouseflow
Version: 1.1
Author URI: http://mouseflow.com
*/

function mouseflow_addOptions()
{
	add_option('mouseflow_script');
}
register_activation_hook(__FILE__, 'mouseflow_addOptions');

function mouseflow_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=mouseflow-for-wordpress">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'mouseflow_settings_link' );


function mouseflow_menu() {
  add_options_page('Mouseflow', 'Mouseflow', 'administrator', 'mouseflow-for-wordpress', 'mouseflow_options');
}

function mouseflow_options() {
echo '
<div class="wrap">
<h2>Mouseflow recording script</h2>

<form method="post" action="options.php">';
wp_nonce_field('update-options'); 

echo '

<table class="form-table">

<tr valign="top">
<th scope="row"><h3>Your current Mouseflow code</h3></th></tr>
<tr>
<td>';

if(get_option('mouseflow_script') == ''){
	echo "Not yet installed.";
}
else{
	echo str_replace(">", "&gt;",str_replace("<", "&lt;", get_option('mouseflow_script')));
}
echo '
</td></tr>
<tr>
<td><h3>Insert new code</h3></td></tr>
<td><textarea name="mouseflow_script" style="width:300px;height:100px;"></textarea></td>
</tr>
 

</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="mouseflow_script" />



<p class="submit">
                <input type="submit" name="update_message" value="';
echo  _e('Save Changes');
echo '" />
            </p>


</form>
</div>
';

}


add_action('admin_menu', 'mouseflow_menu');


function add_mouseflow_script()
{
	echo get_option('mouseflow_script');
}
add_action('wp_head', 'add_mouseflow_script');

?>
