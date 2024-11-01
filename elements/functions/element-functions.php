<?php
/* Titaan element module COnstants */
define("TEM_NS", "titan-elements-tem-");
/* Function Basic Input  ################################################################## */
function tem_input_box($name, $id){
    ?>
    <label><?php echo $name ?>:</label>
    <input id='<?php echo $id ?>' class='form-control' />
   <?php 
   
}
/* Function Basic Button  ################################################################## */
function tem_button($name, $id, $class){
    ?>
    <button id='<?php echo TEM_NS . $id ?>' class='<?php echo $class ?>' ><?php echo $name ?></button>
   <?php   
}
/* Function textarea Input  ################################################################## */
function tem_textarea($name, $id, $content, $isArray, $richText, $return = "print"){
   
    $output = "<label>".$name.":</label>";
    $output .= "<textarea id='".TEM_NS.$id;
    if($isArray == true){ $output .= "-isArray"; }  
    $output .= "' class='form-control";
    if($richText == true){ $output .= " tem_rich_textarea "; } else { $output .= " tem_std_textarea "; } 
    $output .= "' >".$content."</textarea>";
    // Print or return as string *optional
    if($return == 'print'){
        echo $output;
    } else {
        return $output;
    }
}
/* Function Select Dropdown  ################################################################## */
function tem_select_box($name, $id, $options, $value = 0){
?>
<label><?php echo $name ?>:</label>
<div class="input-group-btn"><!-- /btn-group -->
<input id="<?php echo TEM_NS . $id ?>" type="button" class="btn btn-default form-control dropdown-toggle titan-main-field tem-single-value" style="font-weight:bold;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="<?php echo $options[$value] ?>">
<ul class="dropdown-menu" style="width:100%;">
<?php // loop through select options
for($i = 0; $i < count($options); $i++){
    echo '<li><input class="te-no-border tem-select-box form-control" type="button"  name="'.TEM_NS . $id .'" value="'.$options[$i].'"></li>';
}
?>
</ul>
</div><!-- /btn-group -->
<?php 
}
/* Function Get from Media Library  ################################################################## */
function tem_media_library($name, $id){
?>
<label><?php echo $name; ?></label>
<div class="input-group"><!-- /input-group -->
<input type="text" class="form-control titan-main-field" id="<?php echo $id; ?>" class="regular-text">
<div class="input-group-btn">
<input type="button" id="<?php echo $id; ?>-btn" class="btn btn-default" value="Upload Image">
</div><!-- /btn-group -->
</div><!-- /input-group --> <?php 
}
/* Function Update element data  ################################################################## */
function tem_update_element_data(){
global $tem_data_list;
$tem_data_list[$_POST['element']][$_POST['key']] = $_POST['value']; 
echo $tem_data_list[$_POST['element']][$_POST['key']];
wp_die();
}
add_action( 'wp_ajax_titan_elements_update_data', 'tem_update_element_data' );
?>