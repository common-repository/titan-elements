<?php
/* ################################################################################# */
/* Handle HTTP Requests ############################################################ */
/* ################################################################################# */
/* Add & Remove container butttons */
function titan_elements_generate_container_view(){
   titan_elements_singular_content_widget($_POST["gridContent"],
    $_POST["gridSize"], 'print');
    wp_die();
}
/* Add & Remove container butttons */
function titan_elements_tem_actions(){
    /* ------------------ Setup singular-container button actions ----------------------- */
    $data = json_decode(stripslashes($_POST['data']), TRUE);
    /* ---------------- Add before and after singular-container ----------------- */
    if($_POST['task'] == "singular-add-before" || $_POST['task'] == "singular-add-after"){
    if($_POST['task'] == "singular-add-before"){$offset = 0;} else { $offset = 1;}
    $selectedPosition = intval($_POST['selected']) + $offset;
    // Add a new value to at selected and move array to a new location
    // CONTENT
    $a = $data['gridContent'];
    $contentArray = array_merge( array_slice( $a, 0, $selectedPosition, true ), 
    array( ' ' ), array_slice( $a, $selectedPosition, null, true ) );
    // SIZE
    $b = $data['gridSize'];
    $sizeArray = array_merge( array_slice( $b, 0, $selectedPosition, true ), 
    array( "col-md-12" ), array_slice( $b, $selectedPosition, null, true ) );  
    // Assign transformed array  
    $data['gridContent'] = $contentArray;
    $data['gridSize'] = $sizeArray;
    /* ------------------ Remove singular-container ----------------------- */
    } else if ($_POST['task'] == "singular-remove"){  
       // Remove selected file
       unset($data['gridContent'][$_POST['selected']]);
       unset($data['gridSize'][$_POST['selected']]);
       // Reindex linearly
       $data['gridContent'] = array_values($data['gridContent']);
       $data['gridSize'] = array_values($data['gridSize']);
    }
    /* ------------------ Draw and save singular-container ----------------------- */   
    $content = titan_elements_singular_content_widget($data['gridContent'],
    $data['gridSize'], "return");  
    echo '{ "content" : "'.$content.'", "array" : "'.addslashes(json_encode($data)).'" }';    
    wp_die();
}
/* Save values on change */
function titan_elements_tem_singular_tempsave(){
     global $tem_data_list;
     if($_POST['isArray']){ // Array
        $tem_data_list[$_POST['element']][$_POST['property']][$_POST['selected']] = $_POST['data'];
     } else { // Single Value
        $tem_data_list[$_POST['element']][$_POST['property']] = $_POST['data'];     
     }
     titan_elements_singular_store_temp($tem_data_list[$_POST['element']]);
     echo $_POST['data'];
    wp_die();
}
?>