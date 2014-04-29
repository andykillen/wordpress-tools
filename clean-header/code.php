<?php
/**
*  It helps to remove many of the old or un-needed items from the head section. 
*
*/


if(!is_admin()){
    // remove RDS link 
	remove_action ('wp_head', 'rsd_link');
	// removes WLW manifest
    remove_action( 'wp_head', 'wlwmanifest_link');
    // removes wordpress generator and viersion number
    remove_action('wp_head', 'wp_generator');
}