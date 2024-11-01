<?php
add_action('admin_head', 'TE_add_my_tc_button');

function TE_add_my_tc_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
	// check if WYSIWYG is enabled
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "TE_add_tinymce_plugin");
		add_filter('mce_buttons', 'TE_register_my_tc_button');
	}
}

function TE_add_tinymce_plugin($plugin_array) {
   	$plugin_array['TE_tc_button'] = plugins_url( 'js/extend-wp-editor.js', __FILE__ ); 	// CHANGE THE BUTTON SCRIPT HERE
   	return $plugin_array;
}

function TE_register_my_tc_button($buttons) {
   array_push($buttons, "TE_tc_button");
   return $buttons;
}


function titan_elements_global_get_titan_sections(){
	if( file_exists (WP_TITAN_DATA_FULL."system.json")){
	$titan_post_data = file_get_contents(WP_TITAN_DATA_FULL."system.json");
    $titan_data = json_decode($titan_post_data, TRUE); 
	$section_total = count($titan_data['sectionList']);
	echo "[";
		for($i = 0; $i < $section_total; $i++){
	       echo '{"text": "'.str_replace("***", " -> ", $titan_data['sectionList'][$i]).'", "value":"'.$titan_data['sectionList'][$i].'"}';	
		   if($i != $section_total-1){
		   		echo ",";
		   }
		}
	echo "]";
	}
	wp_die();
}


add_action( 'wp_ajax_titan_elements_global_get_titan_sections', 'titan_elements_global_get_titan_sections' );

?>