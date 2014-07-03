<?php
/**
 *  Add DNS Prefetch
 *  
 * output string
 * 
 * Reads the wp_styles and wp_scripts globals to see if it is loading scripts or styles from external websites.  
 * If it is loading it from an external site, it will try to add a dns-prefetch statement.  If the site has already 
 * been "prefetched" then it will skip loading it a second time.
 *  
 * usage:  
 * 
 * either call it direct in the header.php or use a do_action()/add_action() 
 */
function add_dns_prefetch(){   
    $prefetch_array = array(); 
    $checking = array("wp_scripts", "wp_styles");    
    $base = parse_url(get_bloginfo("url"));    
    foreach($checking as $places){
        if(isset($GLOBALS[$places]->queue) ){
            foreach($GLOBALS[$places]->queue as $item){
                $url = parse_url($GLOBALS[$places]->registered[$item]->src);              
                if(isset($url['host']) && !in_array( "//".$url['host'], $prefetch_array) && $base['host'] != $url['host'] ){
                    $prefetch_array[] = "//".$url['host'];
                    echo "<link rel='dns-prefetch' href='//".$url['host']."'>\r\n";                
                }                
            }
        }
    }    
}
