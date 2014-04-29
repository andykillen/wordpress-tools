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
