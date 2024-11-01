<?php
/* ################################################################################# */
/* Master Singular module ########################################################## */
/* ################################################################################# */
//* ###################### Front-end Hook ########################################################
function titan_elements_singular($data) { // Module Function
if ($data['type'] == "singular") { // Module Check
    if ($data['flex'] == "fluid") {
        echo '<div class="container-fluid">';
    } else {
        echo '<div class="container">';
    }
    echo "<div class='row'>";  
    for( $i = 0; $i < count($data['gridContent']); $i++ ){
       // Add row if needed
       $col_width = explode("-", $data['gridSize'][$i]);
       $col_width = $col_width[2];
       if($forecast + $col_width > 12){
       echo "</div><div class='row'>";
       $forecast = 0;
       }
       $forecast += $col_width; 
       // Add row if needed
      echo "<div class='".$data['gridSize'][$i]."'>".$data['gridContent'][$i].'</div>';
	}
    echo "</div></div>";
} // Module Check
} // Module Function
// Display THIS module client-side
add_action('titan_elements_queue', 'titan_elements_singular', 10);
/* ########################## Get appropriated saved data else create it ######################## */
if(is_admin()){
    
// Load PHP Dependancies   
require_once(WP_TITAN_DIR."elements/core-modules/singular/singular-ajax.php");
/* ########################## Add panel to editor ##################################### */
function titan_elements_singular_editor($element, $data) { // Module Function
if (is_admin() && $element == "singular") { // Module Check
if(!$data){ $data = json_decode('{"type":"singular", "flex":"container", "gridContent":[""], "gridSize":["col-md-12"]}', TRUE);  }
        ?>
<!-- Store all javascript values in hidden fields -->       
<input id="titan-elements-singular-name" type="hidden" value="<?php echo $data["type"]; ?>" />
<input id="titan-elements-singular-c-selected" type="hidden" value="0" />
<textarea id="titan-elements-singular-data" class="form-control" >
<?php 
$element_data = $data;
for ($i=0; $i < count($element_data['gridContent']); $i++) { 
$element_data['gridContent'][$i] = str_replace("&#39;", "@##singleQuote##@", $element_data['gridContent'][$i]); // Replace single quotes
$element_data['gridContent'][$i] = str_replace("&#34;", "@##doubleQuote##@", $element_data['gridContent'][$i]); // Replace double quotes
}
echo json_encode($element_data);
 ?>
</textarea>
 <!-- Store all javascript values in hidden fields -->        
<div class="row">
    <div class='col-md-2'>
        <h3 style='text-align:left;color:#666;'><?php echo strtoupper(str_replace("-", " ", $data["type"])); ?></h3>
        <?php tem_select_box("container", "singular-flex", array("fluid", "1170px")); ?>
        <div style="padding:20px 0 10px 0;font-size:18px;">
        Container: <span id="<?php echo TEM_NS; ?>container-name"> C1 </span>
        </div>
        <div class="row">
           <div class='col-md-12'>
           <?php tem_select_box("mobile breakpoint", "grid-break", array("x-small", "small", "medium", "large"), 2); ?>
           </div>
           <div class='col-md-12'>
           <?php tem_select_box("grid width", "grid-size", array("1/12", "2/12", "3/12", "4/12", "5/12", "6/12", "7/12", "8/12", "9/12", "10/12", "11/12", "12/12"), 11); ?>
           </div>
           <div class='col-md-12'>
           <label> Controls: </label>
           </div>
           <div class='col-md-12'>
           <?php tem_button("Add before", "singular-add-before", "btn btn-default form-control tem_custom_action_buttons"); ?>
           </div>
           <div class='col-md-12'>
           <?php tem_button("Add After", "singular-add-after", "btn btn-default form-control tem_custom_action_buttons"); ?>
           </div>
           <div class='col-md-12'>
           <?php tem_button("Remove", "singular-remove", "btn btn-default form-control tem_custom_action_buttons"); ?>
           </div>
        </div>
    </div>
    <div id="titan-elements-singular-main-content" class='col-md-10'>
    <?php  titan_elements_singular_content_widget($data["gridContent"], $data["gridSize"], 'print');  ?>
    </div>
    
</div>
<?php
   } // Module Check
} // Module Function
//* ###################### Save THIS Module ########################################################
function titan_elements_singular_save($section, $element) { // Module Function
    if ($element == "singular") { // Module Check
    global $titan_data;
   // $tem_data_list[$element] = json_decode( file_get_contents(WP_TITAN_DIR."elements/core-modules/singular/temp.json"), TRUE);
    $titan_data['archive'][$section]['element'] = $tem_data_list[$element];
    } // Module Check
} // Module Function
/* ########################## Load THIS Module's Scripts ############################################ */
function titan_elements_singular_editor_enqueue($hook) {
	if ( 'toplevel_page_titan-elements' != $hook ) { // Don't load unless needed
        return;
    }
	// TEM Singular Script
    wp_enqueue_script( 'tem-singular', WP_TITAN_ROOT . '/elements/core-modules/singular/singular.js' );
}
/* ########################## Admin Panel Section selector and editor ##################### */
function titan_elements_singular_content_widget($content, $size, $output){
    // Selection Grid
    $output_data = "<div class='row' style='padding:20px;'>";
    for( $i = 0; $i < count($size); $i++ ){
      $num = $i + 1;
      $output_data .= "<div id='titan-elements-singular-".$i."-layout-button' class='".$size[$i]." tem-custom-button' style='background:#888;border:1px solid #CCC;padding:20px 0;color:#FFF;font-size:40px;text-align:center;'> C".$num." </div>";
	}
	$output_data .= "</div>"; 
    // Rich text editors
    for( $i = 0; $i < count($content); $i++ ){
        $num = $i + 1;
        $output_data .= "<div id='titan-elements-singular-".$i."' class='tem-layout-edit' style='display:none;'>"; 
        $output_data .= tem_textarea("Edit Content ".$num, "gridContent-".$i, $content[$i], true, true, "return");
        $output_data .= "</div>";
    }
    // Decide if data needs to be printed or returned
    if($output == 'print'){
        echo $output_data;    
    } else {
        return preg_replace('/"/', '\"',$output_data );   
    }
}
/* ########################## Actions Hooks ############################################ */
// Add THIS module's controls to the admin elements editor
add_action('titan_elements_edit_panel', 'titan_elements_singular_editor', 10, 2);
// Save THIS module's settings
add_action( 'titan_elements_save', 'titan_elements_singular_save', 10, 2 );
/* ######################### HTTP Requests ############################################# */
// Add scripts and styles to enqueue
add_action( 'admin_enqueue_scripts', 'titan_elements_singular_editor_enqueue', 12 );
// HTTP endpoints
add_action( 'wp_ajax_titan_elements_tem_actions', 'titan_elements_tem_actions' );
// Temperary saving
add_action( 'wp_ajax_titan_elements_tem_singular_tempsave', 'titan_elements_tem_singular_tempsave' );
// Generate singular container display panel
add_action( 'wp_ajax_titan_elements_generate_container_view', 'titan_elements_generate_container_view' );
}
?>