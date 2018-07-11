<?php
/* Plugin Name: NGINX Static Asset Rewrite for MU
 * Version: 1.0.2
 * Author: Jeff Everhart
 * Author URI: http://altlab.vcu.edu/team-members/jeff-everhart/
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Description: This plugin grabs the online course feed from the VP for Instruction data feed. This exist because we don't understand CORS.
 *
*/
if (is_multisite()){

function rewrite_asset_script_tag($tag, $handle, $src ){
    $return_value = str_replace(get_site_url() . '/', network_home_url(), $tag);
    return $return_value;
}

function rewrite_asset_style_tag($html, $handle, $href, $media ){
    $return_value = str_replace(get_site_url() . '/', network_home_url(), $html);
    return $return_value;
}

add_filter( 'script_loader_tag', 'rewrite_asset_script_tag', 10, 3 );
add_filter( 'style_loader_tag',  'rewrite_asset_style_tag', 10, 4 );

}

?>