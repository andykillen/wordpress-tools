/**
 * Plugin Name: Don't show a nag
 * Description: 1 Method to not show a nag
 * Version: 1.0
 * Author: Andy Killen
 * License: GPL
 */


 class dontShowMeANag{

 	/**
 	* Class constructor
 	*
 	*/
	function __construct(){
	  // do something every time this is started	
	}

	/**
	* remove update nag message from this plugin
	*
	*/
	function remove_update_nag($value) {
	    unset($value->response[ plugin_basename(__FILE__) ]);
	    return $value;
	}

 }

 $nagLess = new dontShowMeANag();

 add_filter('site_transient_update_plugins', array($nagLess,'remove_update_nag') );


