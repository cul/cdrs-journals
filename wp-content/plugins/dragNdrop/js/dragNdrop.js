jQuery(document).ready(function(){
	
	jQuery("select").on('change', function(){
        if(jQuery(".sortable_area")){
            jQuery(".sortable_area").remove();
        }
		var issue = jQuery("option:selected");
		var issueSlug = ( issue.val());

		jQuery.ajax({
        type: 'POST',   // Adding Post method
        url: fetchArticles.ajaxurl, // Including ajax file
        data: {"action": "fetch_articles", "issue_slug": issueSlug }, // Sending data dname to post_word_count function.
        success: function(data){ // Show returned data using the function.
            jQuery(".articles_issues").after(jQuery('<div class="sortable_area"></div>'));
            jQuery(".sortable_area").html(data);
            jQuery("#sortable_nav").sortable({
                placeholder: "ui-state-highlight",
                helper: 'clone',
                cursor: function(e, ui){
                    jQuery(this).css({ cursor: '-webkit-grabbing'});
                },
                start: function(e, ui){
                    jQuery(ui.helper).css({background: "yellow"});
                },
                sort: function(e, ui) {
                    jQuery(ui.placeholder).html(Number(jQuery("#sortable_nav > li:visible").index(ui.placeholder)) + 1);
                },
                update: function(event, ui) {
                    var lis = jQuery(this).children('li');
                    var dataArray = "";
                    jQuery(lis).each(function() {
                        var li = jQuery(this);
                        var newVal = jQuery(this).index() + 1;
                        jQuery(this).children('.sortable-number').html(newVal);
                        jQuery(this).children('#item_display_order').val(newVal);
                        dataArray += (jQuery(this).attr("id") + "--");
                    });
                    updateOrder(dataArray);
                }
            });
            jQuery( "#sortable" ).disableSelection();


        }
        });
	});

    function updateOrder(infoArray){


        jQuery.post(updateMenuOrder.ajaxurl,
                {
                    // wp ajax action
                    action : "update_order",
                    
                    // vars
                    the_order : infoArray,
                 
                    // send the nonce along with the request
                    nextNonce : updateMenuOrder.menuOrderNonce
                },
                function( response ) {
                    // console.log( response);
                }
        );
            return false;
    
    }

    




});

