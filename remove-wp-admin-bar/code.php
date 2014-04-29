<?php


/**
*  Remove Wordpress Admin bar from front end
*
*/

if(!is_admin()){
	add_filter( 'show_admin_bar', '__return_false' );
}