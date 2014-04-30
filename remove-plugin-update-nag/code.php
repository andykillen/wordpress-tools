
/**
*
*  Remove update nag is used on a plugin by plugin basis.  
*
*  usage:
*  
*  inside the plugin file add this function, and the add_filter command. So much easier if you make your pugins with classes 
*  and then there is no worried about making the function name different each time. (big hint, make it with a class!)
*/

function remove_update_nag($value) {
    unset($value->response[ plugin_basename(__FILE__) ]);
    return $value;
}


add_filter ( 'site_transient_update_plugins', 'remove_update_nag' );        