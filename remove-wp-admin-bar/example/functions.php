<?php

if(!is_admin()){
	add_filter( 'show_admin_bar', '__return_false' );
}