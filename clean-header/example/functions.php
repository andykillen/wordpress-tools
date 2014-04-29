<?php


// remove additional header items
if(!is_admin()){
    // remove RDS link 
	remove_action ('wp_head', 'rsd_link');
	// removes WLW manifest
    remove_action( 'wp_head', 'wlwmanifest_link');
    // removes wordpress generator and viersion number
    remove_action('wp_head', 'wp_generator');
}