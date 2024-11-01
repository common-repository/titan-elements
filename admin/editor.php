<?php
 if( is_admin()){
// Load common UI elements
require_once("functions/editor-ui.php");
// Load element Functions
require_once( WP_TITAN_DIR . 'elements/functions/element-functions.php' );
/* Add Dashboard */
function titan_elements_dashboard() {
// call to the global settings	
global $titan_data;
global $titan_elements_list;
?>
<style>
</style>
<div class="container-fluid" style="padding:0px;"> <!-- Main Container -->
<!-- Header -->
   <div class="row te-row-container">
        <div class="col-sm-12 te-header te-pad-container" style="height:145px;">
        <img src="<?php echo WP_TITAN_ROOT."/resources/images/logo.png"; ?>" style="width:100px;margin:auto;display:inline-block;position:absolute;" /> 
        <div style="padding-left:120px;"><h1>Titan Elements</h1><?php echo WP_TITAN_VERSION; ?> Created by <a href="<?php echo WP_TITAN_AUTHOR_URL; ?>"><?php echo WP_TITAN_AUTHOR; ?></a></div></div>
        <div class="col-sm-12 te-header-div"> 
        <div class="col-md-12 te-pad-15">
        <a href="<?php echo WP_TITAN_BLOG_URL; ?>" target="_kyleg"><button class="btn btn-default" style="margin-right:5px;"> <i class="glyphicon glyphicon-thumbs-up"></i> <span class="hidden-xs">My Blog</span> </button></a>
        <a href="<?php echo WP_TITAN_DOCS_URL; ?>" target="_te_documentation"><button class="btn btn-default" style="margin-right:5px;"> <i class=" glyphicon glyphicon-list-alt"></i> <span class="hidden-xs">Documentation</span> </button></a>
        <a href="<?php echo WP_TITAN_MAIN_URL; ?>" target="_colossalSoftware"><button class="btn btn-default" style="margin-right:5px;"> <i class="glyphicon glyphicon-user"></i> <span class="hidden-xs">Plugin Page</span> </button></a> 
        </div>
        </div>
   </div>
<div class="row te-row-container">
<div class="col-sm-12" style="padding-right:0px !important;padding-top:0px !important;"> 
<div class="titan-elements-item-gallery">
<div id="titan-elements-loaded-packages" style="background-image:url('<?php echo WP_TITAN_ROOT."/resources/images/media-library-bg.jpg"  ?>')">
<div style="padding:10px 10px 10px 0px;">
    <div class="titan-elements-item-gallery-title titan-width-225"> <span style="float:left;padding-right:10px"> Titan Packages </span> 
    <div id="titan-package-control-tray" class="titan-tray-close">
    <button id="titan-add-new-package" class="btn btn-default"> Add </button> 
    <button id="titan-delete-package"  class="btn btn-default"> Delete </button> 
    <button id="titan-delete-all-packages" class="btn btn-default"> Delete all </button> 
    </div> <button id="titan-package-settings-toggle" class="titan-package-settings" data-status="hidden"><i class="fa fa-cog" aria-hidden="true"></i></button>
</div></div>
    <div id="titan-package-list-home">
    <?php
    echo titan_grab_package_list();
    ?>
    </div>
</div>

<div id="titan-elements-loaded-sections">
<?php
echo titan_grab_sections_list();
?>
</div>
</div>
</div>
</div>
<div class="row te-row-container" style="padding: 0 25px 0px;">
<div class="col-sm-12 te-pad-15">
<i class="fa fa-folder-o" style="font-size: 28px;color:#CCC"></i>
<input id="titan-section-package" type="text"  placeholder="Package" />
<input id="titan-section-previous-package" type="hidden" />
<i class="fa fa-arrow-right" style="font-size: 28px;color:#666"></i>
<input id="titan-section-name" type="text"  placeholder="Section Name" />
<input id="titan-section-previous-name" type="hidden" />
</div>
</div>
<div class="row te-row-container" style="padding: 0;margin-left:-15px !important;">
<div class="col-sm-12 te-pad-15" style="padding: 0px 15px 0px !important;">
<div id="titan-preview-container" style="background:url(<?php echo WP_TITAN_ROOT."/resources/images/editor-bg.png";  ?>);border:1px solid #000;width:calc(100%);height:502px;overflow:auto;margin: 0px 0px;">
<?php
titan_elements_preview_create();
?>
</div>
</div>
</div>
</div>
<div class="row te-row-container" style="padding: 5px 25px 0px;position:relative;top:1px;">
<div class="col-sm-12">
<div id='titan-pick-control-visual' class='titan-elements-controls-selection titan-elements-tabs cactive'> Visual </div>
<div id='titan-pick-control-advanced' class='titan-elements-controls-selection titan-elements-tabs'> Advanced </div>
<div id='titan-pick-control-elements' class='titan-elements-controls-selection titan-elements-tabs'> Elements </div>
</div>
</div>
<!-- Tab - Visual -->
<div id="te-tab-visual" class="row te-row-container te-controls-tab">
<div class="col-sm-12 te-pad-15" style="background-color:#EEE">
Container Settings
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input("bg color", "titan-background-color", "minicolors"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input("border color", "titan-border-color", "minicolors"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input_with_units("border width", "titan-border-width", "titan-border-width-units", "borderWidth"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_selectbox("border style", "titan-border-style", "borderStyle", array("none", "solid", "dashed", "dotted", "groove", "ridge", "inset", "outset")); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input_with_units("padding", "titan-padding", "titan-padding-units", "padding"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input_with_units("margin", "titan-margin", "titan-margin-units", "margin"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_media_library_input("bg image", "titan-background-image", "Image"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_selectbox("bg repeat", "titan-background-repeat", "backgroundRepeat", array("repeat", "repeat-x", "repeat-y", "no-repeat")); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_selectbox("bg position", "titan-background-position", "backgroundPosition", array("left top", "left center","left bottom", "right top", "right center", "right bottom", "center top", "center center", "center bottom")); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_selectbox("bg size", "titan-background-size", "backgroundSize", array("auto", "cover", "contain")); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input_with_units("height", "titan-height", "titan-height-units", "height"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input_with_units("width", "titan-width", "titan-width-units", "width"); ?>
</div>
<div class="col-sm-12 te-pad-15" style="background-color:#EEE">
Typography Settings
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input("text color", "titan-color", "minicolors"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input_with_units("font size", "titan-font-size", "titan-font-size-units", "fontSize"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_selectbox("text align", "titan-text-align", "textAlign", array("left", "right", "center", "justify")); ?>
</div>
<div class="col-sm-12 te-pad-15" style="background-color:#EEE">
Special Enhancements
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_media_library_input("bg video source", "titan-background-video-source", "Video"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_media_library_input("bg video poster", "titan-background-video-poster", "Image"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_media_library_input("parallax image", "titan-parallax-image", "Image"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input("parallax speed", "titan-parallax-speed", "standard"); ?>
</div>
<div class="col-sm-2 te-pad-15">
<?php titan_admin_input("parallax bleed", "titan-parallax-bleed", "standard"); ?>
</div>

</div> 
<!-- Modal -->
<!-- Modal -->  
<!-- Tab - Advanced -->
<div id="te-tab-advanced" class="row te-row-container te-controls-tab te-controls-hidden">
    <style type="text/css" media="screen">
    #titan-elements-advanced-editor { 
        width:100%;
        height:400px;
        border: 1px solid #DDD;
    }
       .ace_print-margin {
        position: relative;
        display: none;
    }
</style>
<div class="col-sm-12 te-pad-15" style="padding-bottom:0px !important;">
<button id="titan-elements-advanced-standard" class="titan-elements-advanced-editor-tabs titan-main-field-data" data-te-editor=""> CSS </button>
<button id="titan-elements-advanced-mobile"   class="titan-elements-advanced-editor-tabs titan-main-field-data" data-te-editor="">CSS Mobile </button>  
<button id="titan-elements-advanced-content"    class="titan-elements-advanced-editor-tabs titan-main-field-data" data-te-editor=""> HTML Content </button>
<button id="titan-elements-advanced-script"    class="titan-elements-advanced-editor-tabs titan-main-field-data" data-te-editor=""> Javascript </button> 
</div>
<div class="col-sm-8 te-pad-15" style="padding: 10px 5px 5px 5px !important;margin-bottom:20px;background:#fff;box-shadow: 1px 1px 4px #eee;">
<div id="titan-elements-advanced-editor"></div>
</div>
<div class="col-sm-4 te-pad-15">
    
<label>Section ID:</label>
<input id="titan-elements-advanced-id" class="form-control titan-main-field" />
<div style="height:15px;"></div>
<label>Section Class(es):</label>
<input id="titan-elements-advanced-class" class="form-control titan-main-field" />
<div style="height:15px;"></div>
<label>Quick Inserts:</label>
<div class="row" style="margin:0px;">
<div class="col-md-3" style="padding:0 5px 0 0 !important;"><div id="te-quick-insert-tabs-all" class="titan-advanced-qi-tabs"" > All </div></div>
<div class="col-md-3" style="padding:0 5px 0 0 !important;"><div id="te-quick-insert-tabs-css" class="titan-advanced-qi-tabs te-adv-side-active" > CSS </div></div>
<div class="col-md-3" style="padding:0 5px 0 0 !important;"><div id="te-quick-insert-tabs-html" class="titan-advanced-qi-tabs"> HTML </div></div>
<div class="col-md-3" style="padding:0 5px 0 0 !important;"><div id="te-quick-insert-tabs-js" class="titan-advanced-qi-tabs"" > JS </div></div>
</div>
<div id="te-quick-insert-panel-all" class="row te-quick-insert-panel">
<button id="titan-elements-advanced-insert-filename" class="btn btn-default col-md-6"> Insert WP Media </button>  
<button id="titan-elements-advanced-insert-pagelink" class="btn btn-default col-md-6"> Insert WP URL </button>   
</div>    
<div id="te-quick-insert-panel-css" class="row te-quick-insert-panel te-qi-active" >
<button id="titan-elements-advanced-insert-media-screen" class="btn btn-default col-md-6"> CSS Media Screen </button>
<button id="titan-elements-advanced-insert-selector" class="btn btn-default col-md-6"> CSS Selector </button> 
<button id="titan-elements-advanced-insert-animation" class="btn btn-default col-md-6"> Insert Animation </button>  
<button id="titan-elements-advanced-insert-inline-css" class="btn btn-default col-md-6"> Insert Inline CSS </button> 
<button id="titan-elements-advanced-insert-basics" class="btn btn-default col-md-6"> Insert Basic CSS </button> 
</div>
<div id="te-quick-insert-panel-html" class="row te-quick-insert-panel">
<button id="titan-elements-advanced-insert-font-awesome" class="btn btn-default col-md-6"> Insert Icon </button>
<button id="titan-elements-advanced-insert-grid" class="btn btn-default col-md-6"> Insert Grid </button>
</div>
<div id="te-quick-insert-panel-js" class="row te-quick-insert-panel">
    <button id="titan-elements-advanced-insert-js-ready" class="btn btn-default col-md-6"> jQuery Ready </button>
    <button id="titan-elements-advanced-insert-js-click" class="btn btn-default col-md-6"> Element Click </button>
    <button id="titan-elements-advanced-insert-js-function" class="btn btn-default col-md-6"> Function </button>
    <button id="titan-elements-advanced-insert-js-loop" class="btn btn-default col-md-6"> For Loop </button>
</div>   
</div>   
</div>
<!-- Tab - Elements -->
<div id="te-tab-elements" class="row te-row-container te-controls-tab te-controls-hidden">
<div class="col-sm-2 te-pad-15">   
<?php titan_admin_selectbox("element list", "titan-element-list", "elementList", $titan_elements_list); ?>
</div>
<div id="te-element-data-form" class="col-sm-12" style="min-height:400px;">
</div>
</div>
<!-- Tab - Settings -->
<div id="te-tab-settings" class="row te-row-container te-controls-tab te-controls-hidden">
<div class="col-sm-12 te-pad-15">
settings
</div>
</div>
</div><!-- Main Container -->
<div id="titan-bottom-super-menu">
<div class="container-fluid">
<div class="col-sm-12">
<button id="titan-create-section" class="btn btn-primary titan-inline-block" ><i class="fa fa-file-o"></i> New </button>
<button id="titan-duplicate-section" class="btn btn-primary titan-inline-block" ><i class="fa fa-clone"></i> Duplicate </button>
<button id="titan-delete-section" class="btn btn-danger titan-inline-block" ><i class="fa fa-remove"></i> Delete </button>
<button id="titan-save-section" class="btn btn-success titan-inline-block" ><i class="fa fa-check"></i> Save </button>
</div>
</div>
</div>


	<?php
	
	

	
}
/*********** Save Section Function ************/
function titan_elements_save_section() {	
    if( is_admin()){
		// Grab section that has been changed or created
        global $titan_data;
        global $titan_client_data;
		$data = $_POST['data'];
        if(strlen($data['name']) > 1){
        $section = str_replace(" ", "-", $data['package']."***".$data['name']);
        $package_selected = $data['packageSelected'];
        $name = str_replace(" ", "-", $data['name']);
        $old_name = $data['oldName'];
        $package = str_replace(" ", "-", $data['package']);
        $old_package = $data['oldPackage'];
        $element = $data['element'];
        $package_exists = false;
        $name_exists = false;
        
        // Action 1 - Check if it is new data
        if(strlen($old_package) < 1 || strlen($old_name) < 1){ // If new File
        // Check if package exists else add it  
        for ($i = 0; $i < count($titan_data['packageList']); $i++){
            if($titan_data['packageList'][$i] == $package){
                $package_exists = true;
            }	
        }
        if($package_exists == false){ $titan_data['packageList'][] =  $package; }
        
        // Check if name exists else add it  
        for ($i = 0; $i < count($titan_data['sectionList']); $i++){
            if($titan_data['sectionList'][$i] == $package."***".$name){
                $name_exists = true;
            }	
        }
        if($name_exists == false){  $titan_data['sectionList'][] =  $package."***".$name; }
        }
        else {
  
           // Action 2 - Remove the old section before renaming or moving            
           if($package != $old_package || $name != $old_name){
            if(strlen($old_package) > 1 && strlen($old_name) > 1){
            unset($titan_data['archive'][$old_package."***".$old_name]);
            $titan_data['sectionList'] =  array_values(array_diff($titan_data['sectionList'], array($old_package."***".$old_name)));
            $titan_data['sectionList'][] = $package."***".$name; 
            }
           }
        }
        
        // Action 3 - prepare data
        // Required
        $titan_data['archive'][$section]['package'] = $package;
        $titan_data['archive'][$section]['name'] = $name;
        // Visual
        $titan_data['archive'][$section]['css'] = $data['css'];
        $titan_data['archive'][$section]['video'] = $data['video']; 
        $titan_data['archive'][$section]['parallax'] = $data['parallax'];   
        // Adavnced        
        $titan_data['archive'][$section]['id'] = $data['id'];
        $titan_data['archive'][$section]['class'] = $data['class'];
        $titan_data['archive'][$section]['classStandard'] = $data['classStandard'];
        $titan_data['archive'][$section]['classMobile'] = $data['classMobile'];
        $titan_data['archive'][$section]['content'] = $data['content'];
        $titan_data['archive'][$section]['script'] = $data['script'];
        // Element
        $titan_data['archive'][$section]['element'] = $data['elementData'];
        
		// Action 5 - Save to admin file
        titan_Overwrite_data_file(WP_TITAN_DATA_REL."system.json", $titan_data);

        // Action 6 - Prepare deploy file
        // Required
        $titan_client_data['archive'][$section]['package'] = $package;
        $titan_client_data['archive'][$section]['name'] = $name;
        // Visual
        $titan_client_data['archive'][$section]['css'] = $data['css'];
        $titan_client_data['archive'][$section]['video'] = $data['video']; 
        $titan_client_data['archive'][$section]['parallax'] = $data['parallax'];   
        // Adavnced        
        $titan_client_data['archive'][$section]['id'] = $data['id'];
        $titan_client_data['archive'][$section]['class'] = $data['class'];
        $titan_client_data['archive'][$section]['classStandard'] = str_replace("<n />", "", $data['classStandard']);
        $titan_client_data['archive'][$section]['classMobile'] = str_replace("<n />", "", $data['classMobile']);
        $titan_client_data['archive'][$section]['content'] = str_replace("<n />", "", $data['content']);
        $titan_client_data['archive'][$section]['script'] = str_replace("<n />", "", $data['script']);
        // Element
        $titan_client_data['archive'][$section]['element'] = $data['elementData'];
        // Action 7 - Save to deploy file
        titan_Overwrite_data_file(WP_TITAN_DATA_REL."titan.json", $titan_client_data);


		echo "{\"elements\": \"".$titan_data['archive'][$section]['element']."\", \"sectionList\": \"".titan_grab_sections_list($package_selected)."\", \"packageList\": \"".titan_grab_package_list()."\"}";
        }
	}
    wp_die(); // required to terminate
} 
/*********** Load Section Function ************/
function titan_elements_load_section() {	
    global $titan_data;
    echo json_encode($titan_data['archive'][$_POST['section']], TRUE);
    wp_die(); // required to terminate
}
function titan_elements_load_preview() {
titan_elements_preview_create($_POST['name'], $_POST['package']);
    wp_die(); // required to terminate
}
/*********** Load package Function ************/
function titan_elements_load_package() {	
    if(is_admin()){ 
    $package = $_POST['package'];
    echo titan_grab_sections_list($package);
    }
    wp_die(); // required to terminate
}
/*********** Delete Section Function ************/
function titan_elements_delete_section(){
    if( is_admin()){
    global $titan_data;
    // Remove from content from sections
    //******* NOTE change to old_package *** old_name, cuase those already exist 
    //******* in the config file, remmeber to check if there empty, cant delete new files
    unset($titan_data['archive'][$_POST["package"]."***".$_POST["name"]]);
    // Remove from List
    for ($i=0; $i < count($titan_data['sectionList']); $i++) { 
        if($titan_data['sectionList'][$i] == $_POST["package"]."***".$_POST["name"]){
			array_splice($titan_data['sectionList'], $i, 1);
        }
    }
        // Save to file
        titan_Overwrite_data_file(WP_TITAN_DATA_REL."system.json", $titan_data);
        echo titan_grab_sections_list($_POST["selected"]);
    }
    wp_die(); // required to terminate
}
/*********** Delete, add, and clear all package functions ************/
function titan_package_manager(){
	global $titan_data;
    if( $_POST['data']['name'] ){
            $package_exists == false;
        // Check if package exists else add it  
        for ($i = 0; $i < count($titan_data['packageList']); $i++){
            if($titan_data['packageList'][$i] == $_POST['data']['name']){
                $package_exists = true;
            }	
        }
    }    
	/* Add a package */
	if( $_POST['data']['function'] == "add-new"){
        $thisPackage = str_replace(" ", "-", $_POST['data']['name']);
		if( $_POST['data']['name'] && $package_exists == false ){
			$titan_data['packageList'][] = $thisPackage;
			$titan_data['sectionList'][] = $thisPackage."***default";
	    	$titan_data['archive'][$thisPackage."***default"]["name"] = "default";
			$titan_data['archive'][$thisPackage."***default"]["package"] = $thisPackage;
			titan_Overwrite_data_file(WP_TITAN_DATA_REL."system.json", $titan_data);
			echo '{ "message" : "'.$thisPackage.' added!", "packageList" : "'.titan_grab_package_list().'", "sectionList" : "'.titan_grab_sections_list().'" }';
		} else {
			echo '{ "error" : "Package already exists!" }';		
		}
	}
	/* Delete a package */
	else if( $_POST['data']['function'] == "remove"){ 
		if( $_POST['data']['name'] && $package_exists ){
            // Remove Sections
            $section_list_dif = array();
            for ($i=0; $i < count($titan_data['sectionList']); $i++) { 
                $package_check = explode("***", $titan_data['sectionList'][$i]);
                if($package_check[0] == $_POST['data']['name']){
                    // Remove associated sections
                    unset($titan_data['archive'][$titan_data['sectionList'][$i]]);
                    $section_list_dif[] = $titan_data['sectionList'][$i];
                }
            }
            $titan_data['sectionList'] = array_diff($titan_data['sectionList'], $section_list_dif);
            // Remove Package
            for ($i=0; $i < count($titan_data['packageList']); $i++) { 
                if($titan_data['packageList'][$i] == $_POST['data']['name']){
                   array_splice($titan_data['packageList'], $i, 1);
                }
            }
			$arrayKey = array_search($_POST['data']['name'], $titan_data['packageList']);
		    unset($titan_data['packageList'][$_POST['data']['name']]);
           	titan_Overwrite_data_file(WP_TITAN_DATA_REL."system.json", $titan_data); 
			echo '{ "message" : "'.$_POST['data']['name'].' deleted!", "packageList" : "'.titan_grab_package_list().'", "sectionList" : "'.titan_grab_sections_list().'"  }';
		} else {
			echo '{ "error" : "Package not deleted?!" }';		
		}
	}
	/* Delete all packages */
	else if( $_POST['data']['function'] == "remove-all"){
		if( $_POST['data']['name'] == "reset"){
            $titan_data['sectionList'] = [];
            $titan_data['packageList'] = [];
            $titan_data['archive'] = [];
            titan_Overwrite_data_file(WP_TITAN_DATA_REL."system.json", $titan_data); 
            echo '{ "message" : "All packages deleted!", "packageList" : "'.titan_grab_package_list().'", "sectionList" : "'.titan_grab_sections_list().'"  }';
		} else {
			echo '{ "error" : "Packages not deleted?!" }';		
		}
	}
	wp_die();
}
/*********** Add ELEMENT admin panel ************/
function titan_get_all_links(){
    $pages = get_pages();
    foreach ( $pages as $page ) {
    $option = '<option value="' . get_page_link( $page->ID ) . '">';
    $option .= $page->post_title;
    $option .= '</option>';
    echo $option;
    }
   // Note Change Later add posts
   $posts = get_posts();
    foreach ( $posts as $post ){
        echo "<option value='". get_page_link( $post->ID ) ."'>". $post->post_title . "</option>";
    }
    
    wp_die();
} 

/*********** Add ELEMENT admin panel ************/
function titan_elements_attach_to_editor(){
    global $titan_data;
    // Replace JSON PATTERN single quotes with doubles quotes
    $data = str_replace("'", '"', $titan_data['archive'][$_POST['section']]['element']);
    $data =  json_decode($data, TRUE);
	/* Send Data to element */
    do_action( 'titan_elements_edit_panel', $_POST['element'], $data);
    wp_die(); 
}
/*********** Helper Functions ************/
function titan_elements_preview_create($name = "", $package = ""){
global $titan_data;
if($name == ""){
$titan_preview = "[titan-section id='titan-preview']"."[/titan-section]";
} else {
$titan_preview = "[titan-section id='titan-preview' package='".$package."' template='".$name."']"."[/titan-section]";   
}
echo do_shortcode($titan_preview);
 }
/* Get all the sections for loading */
function titan_grab_sections_list($package = ""){
    global $titan_data;
    if($package == 'all'){ $package = ""; }
    $list = "";
        if(count($titan_data['sectionList']) > 0){
        for ($i = 0; $i < count($titan_data['sectionList']); $i++){
        $name = explode("***", $titan_data['sectionList'][$i]);
        $section = $titan_data['sectionList'][$i];
         if(strlen($package) > 1){ // if package specified
            if($titan_data['archive'][$section]['package'] == $package){ // If this section has selected package
            $list .=  "<div id='titan-pick-section-".$section."' class='titan-elements-item-selection'>".$name[1]."</div>"; 
            }            
        } else { // Get All
            $list .=  "<div id='titan-pick-section-".$section."' class='titan-elements-item-selection'>".$name[1]."</div>"; 
        }       
        }
        }
    return $list;
}
function titan_grab_package_list(){
      global $titan_data;
      $list = "<div id='titan-pick-filter-all' class='titan-elements-package-selection titan-elements-tabs pactive'> All </div>";
        if(count($titan_data['packageList']) > 0){
        for ($i = 0; $i < count($titan_data['packageList']); $i++){
        $package = $titan_data['packageList'][$i];
            $list .=  "<div id='titan-pick-filter-".$package."' class='titan-elements-package-selection titan-elements-tabs'>".$package."</div>";     
        }
        }
    return $list;  
}
/* Overwrite data to the file System */
function titan_Overwrite_data_file($path, $data){
    	// Convert to json
		$saveData = json_encode($data);
        // Transform double quotes to singles and remove other encoding faults
        $saveData = str_replace("\\\"", "'", $saveData); // Fix encoded "
        $saveData = str_replace("\/", "/", $saveData);   // Fix encoded \/ 
        $saveData = str_replace("\\", "", $saveData);    // Fix encoded left over \
        $saveData = str_replace(" / ", " ", $saveData);  // Fix encoded random _/_ 
        // Open file and overwrite previous
		$File = WP_TITAN_DIR.$path; 
		$Handle = fopen($File, 'w'); 
		fwrite($Handle, $saveData); 
		fclose($Handle); 
 }
/* Add Menu */
function titan_elements() {
	$icon_url = WP_TITAN_ROOT."/resources/images/icon.png";
	add_menu_page('Titan Elements', 'Titan Elements', 'administrator', 'titan-elements', 'titan_elements_dashboard', $icon_url);
}
/* Add admin styles */
function titan_elements_editor_enqueue($hook) {
    
    // Global styles
    wp_enqueue_style( 'titan-base-editor-global-styles', WP_TITAN_ROOT . '/admin/css/global-style.css', '', false );
    
    // If not admin page then don't continue
	if ( 'toplevel_page_titan-elements' != $hook ) { // Don't load unless needed
        return;
    }
    
	// jQuery - polish
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-2.1.4.min.js' );
    // Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', '', false );
	// Bootstrap 3 - layout
    wp_enqueue_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js' );
    wp_enqueue_style( 'bootstrap-style', "//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css", '', false );
	// Toastr -  notifications
    wp_enqueue_script( 'toastr', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js' );
    wp_enqueue_style( 'toastr-style', "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css", '', false );
	// Minicolors -  colorpicker
    wp_enqueue_script( 'mini-colors', WP_TITAN_ROOT . '/admin/js/mini-colors/jquery.minicolors.js' );
    wp_enqueue_style( 'mini-colors-style', WP_TITAN_ROOT . '/admin/js/mini-colors/jquery.minicolors.css', '', false );
    // Tiny MCE - text editor
    wp_enqueue_script( 'tiny-mce', '//cdn.tinymce.com/4/tinymce.min.js' );
    // Select 2 boxes
    wp_enqueue_style( 'seclect-2-styles', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css', '', false );
    wp_enqueue_script( 'seclect-2-script', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js' );
    // Ace Code editor
    wp_enqueue_script( 'ace-code-editor', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ace.js' );
    wp_enqueue_script( 'ace-code-editor-mode-css', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/mode-css.js' );
    wp_enqueue_script( 'ace-code-editor-mode-html', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/mode-html.js' );
    wp_enqueue_script( 'ace-code-editor-mode-js', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/mode-javascript.js' );
    wp_enqueue_script( 'ace-code-editor-theme', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/theme-dreamweaver.js' );
    wp_enqueue_script( 'ace-code-editor-autocomplete', 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.3/ext-language_tools.js' );
	// Custom setup and functions
	wp_enqueue_script( 'titan-base-config', WP_TITAN_ROOT . '/admin/js/config.js', array('jquery', 'toastr', 'mini-colors', 'tiny-mce') );
    wp_enqueue_style( 'titan-base-editor-styles', WP_TITAN_ROOT . '/admin/css/style.css', '', false );
    // Call built in media library
    wp_enqueue_media();
    wp_enqueue_script('titan-admin-inputs', WP_TITAN_ROOT . '/admin/js/admin-inputs.js', array('jquery','media-upload', 'mini-colors', 'titan-elements-tem-functions', 'seclect-2-script'));
    // Call titan elements module js functions
    wp_enqueue_script( 'titan-elements-tem-functions', WP_TITAN_ROOT . '/elements/js/element-functions.js', array('jquery', 'toastr', 'media-upload', 'mini-colors', 'titan-base-config') );
    // Load titan animation library
    wp_enqueue_style( 'titan-elements-animation-library', WP_TITAN_ROOT.'/resources/css/titan-animate.css', '', false );
	// Parallaxing
	wp_enqueue_script( 'titan-parallax-bg-js', WP_TITAN_ROOT . '/resources/js/parallax.min.js', array('jquery'));
}
/* Admin header */
add_action("admin_menu", "titan_elements");
add_action( 'admin_enqueue_scripts', 'titan_elements_editor_enqueue' );
/* Initiate PHP HTTP Calls */
add_action( 'wp_ajax_titan_save_section', 'titan_elements_save_section' );
add_action( 'wp_ajax_titan_load_section_preview', 'titan_elements_load_preview' );
add_action( 'wp_ajax_titan_load_section', 'titan_elements_load_section' );
add_action( 'wp_ajax_titan_load_package', 'titan_elements_load_package' );
add_action( 'wp_ajax_titan_delete_section', 'titan_elements_delete_section' );
add_action( 'wp_ajax_titan_attach_to_editor', 'titan_elements_attach_to_editor' );
add_action( 'wp_ajax_titan_package_manager', 'titan_package_manager');
add_action( 'wp_ajax_titan_get_all_links', 'titan_get_all_links');
 }
?>