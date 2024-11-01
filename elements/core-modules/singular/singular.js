
var loadTitanModuleScript = function(element){  
if(element == "singular"){
 jQuery( document ).ready(function($) {	
 
/* Select Container for editing ###################################################################### */
var loadTitanSingularbuttons = function(){
// Singular data filter quotes	
$("#titan-elements-singular-data").val($("#titan-elements-singular-data").val().replace("@##singleQuote##@","&#39;"));
$("#titan-elements-singular-data").val($("#titan-elements-singular-data").val().replace("@##doubleQuote##@","&#34;"));
// Setup custom buttons and inputs	
$('.tem-custom-button').click(function(event){
    // Grab selected value
    var contentId = this.id.replace("-layout-button", "");
    var name = this.id.split("-");
    // Set evertyhing back to normal
    $('.tem-custom-button').css('backgroundColor', '#888');
    $('.tem-layout-edit').css('display', 'none');
    // Define selected
    $('#'+this.id).css('backgroundColor', '#08D');
    $('#'+contentId).css('display', 'block');
    $('#titan-elements-tem-container-name').html("C"+(Number(name[3])+1));
    $("#titan-elements-singular-c-selected").val(name[3]); 
    // Change connected inputs
    data = JSON.parse($("#titan-elements-singular-data").val());
    singular_update_when_selected(name[3]);   
});
}
loadTitanSingularbuttons();
/* When action buttons clicked ###################################################################### */
$('.tem_custom_action_buttons').click(function(event){
    var task = this.id.replace("titan-elements-tem-", ""),
    data = $("#titan-elements-singular-data").val(),
    selected = $("#titan-elements-singular-c-selected").val();
    jQuery.post(ajaxurl, {action:'titan_elements_tem_actions', task:task, selected:selected, data:data}, function(data) {
            toastr.success('Saved Successfully!');
            data = JSON.parse(data);
            $("#titan-elements-singular-main-content").html(data.content);
            loadTitanSingularbuttons();
            $(".tem-rich-textarea").css("display", 'block');
            titan_editor_tinymce_init();
            $(".tem-rich-textarea").css("display", 'none');
            $("#titan-elements-singular-data").val(data.array);
    });
});
/* When Grid Break or size is changed ###################################################################### */
$('#titan-elements-tem-singular-flex').change(function(){
    var data = JSON.parse($("#titan-elements-singular-data").val()); 
    data.flex = this.value; 
    $("#titan-elements-singular-data").val(JSON.stringify(data));
});
/* When Grid Break or size is changed ###################################################################### */
$('#titan-elements-tem-grid-break, #titan-elements-tem-grid-size').on( "change", function(event){
	var value = $("#"+this.id).val(),
	output = "",	
	data = JSON.parse($("#titan-elements-singular-data").val()),
	selected = $("#titan-elements-singular-c-selected").val(),
    gridSize = $('#titan-elements-tem-grid-size').val(),
    previousGridSize = data.gridSize[selected]; 
	output = singularFilterGridTypes(value, 0);
    gridSize = singularFilterGridSizes(gridSize, 0);
	output = "col-"+output+"-"+gridSize;
	// Assign and save transformed data
    data.gridSize[selected] = output;
    if(previousGridSize != data.gridSize[selected]){
	$("#titan-elements-singular-data").val(JSON.stringify(data));
    jQuery.post(ajaxurl, {action:'titan_elements_generate_container_view', gridContent:data.gridContent, gridSize:data.gridSize}, function(data) {
        $("#titan-elements-singular-main-content").html(data);
        loadTitanSingularbuttons();
        $(".tem-rich-textarea").css("display", 'block');
        titan_editor_tinymce_init();
        $(".tem-rich-textarea").css("display", 'none');
    });
    }
});
/* Change values when selected ####################################################################### */
var singular_update_when_selected = function(selected){	
	data = JSON.parse($("#titan-elements-singular-data").val());
    $gridSize = data.gridSize[selected].split("-");
    $('#titan-elements-tem-grid-break').val(singularFilterGridTypes($gridSize[1], 1));
    $('#titan-elements-tem-grid-size').val(singularFilterGridSizes($gridSize[2], 1));
}
/* Helper Dictionary sorts ###################################################################### */
var singularFilterGridTypes = function(value, direction){
    var output = "";
    if(direction == 0){
    switch(value){
	case "x-small": output = "xs"; break;
	case "small": output = "sm"; break;
	case "medium": output = "md"; break;
	case "large": output = "lg"; break;	
	default: output = "md"; break;
	}
    } else {
    switch(value){
	case "xs": output = "x-small"; break;
	case "sm": output = "small"; break;
	case "md": output = "medium"; break;
	case "lg": output = "large"; break;	
	default: output = "medium"; break;
	}
    }
    return output;
}
var singularFilterGridSizes = function(value, direction){
    if(direction == 0){
        var output = value.replace("/12", "");
    } else {
        var output = value+"/12";   
    }
    return output;
}
});
}
}
/* Update temporary when textarea edited ###################################################################### */
var temSaveRichTextEditor = function(texteditor){
	// Get required data
	var elementData = JSON.parse(jQuery("#titan-elements-singular-data").val()),
	selected = jQuery("#titan-elements-singular-c-selected").val(),
	data = texteditor.getContent();
	//Assign Data and save back to data field
    data = data.replace("'", "&#39;"); // Replace single quotes
    data = data.replace('"', "&#34;"); // Replace double quotes
	elementData.gridContent[selected] = data;
	jQuery("#titan-elements-singular-data").val(JSON.stringify(elementData));  
} 