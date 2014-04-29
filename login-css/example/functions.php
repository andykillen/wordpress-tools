<?php

/*
 * load css for admin login page
 */

function load_login_scripts() {            
	wp_enqueue_style( 'login-css', get_bloginfo('template_directory')."/css/login.css",array(),1,"all" );            
}
add_action( 'login_enqueue_scripts', 'load_login_scripts' );