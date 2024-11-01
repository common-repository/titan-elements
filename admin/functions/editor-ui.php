<?php
/* Function Input ################################################################## */
function titan_admin_input($name, $id, $type){
?>
<label><?php echo $name ?>:</label>
<?php if($type == "minicolors"){ ?>
<input id="<?php echo $id ?>" class="form-control minicolors titan-main-field" />
<?php } else { ?>
<input id="<?php echo $id ?>" class="form-control titan-main-field" />    
<?php
}
}
/* Function Input with units (px, %, em, rem)  ################################################################## */
function titan_admin_input_with_units($name, $id_main, $id_unit, $select){
?>
<label><?php echo $name ?>:</label>
<div class="input-group"><!-- /input-group -->
<input id="<?php echo $id_main ?>" class="form-control titan-main-field" />
<div class="input-group-btn"><!-- /btn-group -->
<input id="<?php echo $id_unit ?>" type="button" class="btn btn-default dropdown-toggle" style="font-weight:bold;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="px">
<ul class="dropdown-menu dropdown-menu-right">
<li><input class="te-no-border titan-units-<?php echo $select ?>-select form-control" type="button" value="px"></li>
<li><input class="te-no-border titan-units-<?php echo $select ?>-select form-control" type="button" value="%"></li>
<li><input class="te-no-border titan-units-<?php echo $select ?>-select form-control" type="button" value="em"></li>
<li><input class="te-no-border titan-units-<?php echo $select ?>-select form-control" type="button" value="rem"></li>
</ul>
</div><!-- /btn-group -->
</div><!-- /input-group --> 
<?php 
}
/* Function Select Dropdown  ################################################################## */
function titan_admin_selectbox($name, $id, $select, $options){
?>
<label><?php echo $name ?>:</label>
<div class="input-group-btn"><!-- /btn-group -->
<input id="<?php echo $id ?>" type="button" class="btn btn-default form-control dropdown-toggle titan-main-field" style="font-weight:bold;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="<?php echo $options[0] ?>">
<ul class="dropdown-menu" style="width:100%;">
<?php // loop through select options
for($i = 0; $i < count($options); $i++){
    echo '<li><input class="te-no-border titan-'.$select.'-select form-control" type="button" value="'.$options[$i].'"></li>';
}
?>
</ul>
</div><!-- /btn-group -->
<?php 
}
/* Function Get from Media Library  ################################################################## */
function titan_admin_media_library_input($name, $id, $type){
?>
<label><?php echo $name; ?>:</label>
<div class="input-group"><!-- /input-group -->
<input type="text" class="form-control titan-main-field" id="<?php echo $id; ?>" class="regular-text">
<div class="input-group-btn">
<input type="button" id="<?php echo $id; ?>-btn" class="btn btn-default" value="Get <?php echo $type; ?>">
</div><!-- /btn-group -->
</div><!-- /input-group --> <?php
}
?>