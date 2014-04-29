<?php
/**
 * setup DNS prefetch in the header
 */
function add_dns_prefetch(){   
    $prefetch_array = array(); 
    $checking = array("wp_scripts", "wp_styles");    
    $base = parse_url(get_bloginfo("url"));    
    foreach($checking as $places){
        foreach($GLOBALS[$places]->queue as $item){
            $url = parse_url($GLOBALS[$places]->registered[$item]->src);        
            if(!in_array( "//".$url['host'], $prefetch_array) && $base['host'] != $url['host'] ){
                $prefetch_array[] = "//".$url['host'];
                echo "<link rel='dns-prefetch' href='//".$url['host']."'>\r\n";                
            }                
        }    
    }    
}

add_action("prefetch", "add_dns_prefetch", 1);

/**
* Remove admin bar from front end
*/
if(!is_admin()){
    add_filter( 'show_admin_bar', '__return_false' );
}

/**
*  It helps to remove many of the old or un-needed items from the head section. 
*  (can be combined in to the above check for removal of the admin bar)
*/
if(!is_admin()){
    // remove RDS link 
    remove_action ('wp_head', 'rsd_link');
    // removes WLW manifest
    remove_action( 'wp_head', 'wlwmanifest_link');
    // removes wordpress generator and viersion number
    remove_action('wp_head', 'wp_generator');
}
/*
 * load css for admin login page
 */

function load_login_scripts() {            
    wp_enqueue_style( 'login-css', get_bloginfo('template_directory')."/css/login.css",array(),1,"all" );            
}
add_action( 'login_enqueue_scripts', 'load_login_scripts' );