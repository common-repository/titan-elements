 var temInitNow = function(){   

    jQuery( document ).ready(function($) {	  

        titan_editor_tinymce_init();

        /* Select Box Inputs ###################################################################### */

        $('INPUT.tem-select-box').click(function(event){

            // Grab selected value

            var parentId = this.name;

            var elementId = $("#titan-element-list").val();

            $( "#"+parentId ).val( this.value );

             $( "#"+parentId ).change();

            // Close Dropdown
            $( ".input-group-btn.open").removeClass( "open" );

        });

        /* Media Library Inputs ###################################################################### */

        $('.tem-media-library').click(function(e) {

        e.preventDefault();

        var image = wp.media({ 

            title: 'Upload Image',

            // mutiple: true if you want to upload multiple files at once

            multiple: false

        }).open()

        .on('select', function(e){

            // This will return the selected image from the Media Uploader, the result is an object

            var uploaded_image = image.state().get('selection').first();

            // We convert uploaded_image to a JSON object to make accessing it easier

            // Output to the console uploaded_image

            var image_url = uploaded_image.toJSON().url;

            // Let's assign the url value to the input field

            $('#'+key).val(image_url);

            $( "#titan-preview" ).css( value, "url('"+image_url+"')" ); 

        });

        });

        // When value change save them to tian data

      /*  $('INPUT').keyup(function() {

            var elementId = $("#titan-element-list").val();   

            temDataUpdate(elementId, this.id, $("#"+this.id).val());

        }); */

        

        var temDataUpdate = function(element, key, value){    

            key = key.replace("titan-elements-tem-", "");

            jQuery.post(ajaxurl, {action:'titan_elements_update_data', element:element, key:key, value:value}, function(data) {

            console.log("saved: "+data);

            });        

        }

        // Hook-in your own custom javascript for your module

        loadTitanModuleScript($("#titan-element-list").val()); 

    });   

}

  /* Give elements a way to Update preview window

  var titanElementsUpdatePreview = function(){

    var name = jQuery('#titan-section-previous-name').val();

    var package = jQuery('#titan-section-previous-package').val();

    if(name != "" && package != ""){

    // Load Preview   

    jQuery.post(ajaxurl, {action:'titan_load_section_preview', package:package, name:name}, function(data) {

         jQuery("#titan-preview-container").html(data);

    });

    } else {

        toastr.error("Must save once before updating the preview window.");

    }

} */