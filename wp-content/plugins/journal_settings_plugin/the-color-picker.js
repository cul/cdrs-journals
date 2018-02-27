jQuery( document ).ready(function(){

    "use strict";

    //This if statement checks if the color picker widget exists within jQuery UI

    //If it does exist then we initialize the WordPress color picker on our text input field

    if( typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function' ){

        jQuery( '.color' ).wpColorPicker();

    }

    else {

        //We use farbtastic if the WordPress color picker widget doesn't exist

        jQuery( '.colorpicker' ).farbtastic( '#color' );

    }

    var file_frame;
    var file_frame_two;
    var file_frame_three;
    var file_frame_four;

  jQuery('#logo').live('click', function( event ){

    event.preventDefault();

    // If the media frame already exists, reopen it.
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      var attachment = file_frame.state().get('selection').first().toJSON();

      // Do something with attachment.id and/or attachment.url here
      jQuery.ajax({
        type: 'POST',   // Adding Post method
        url: logoSelector.ajaxurl, // Including ajax file
        data: {"action": "logo_save", "logo_url": attachment.url }, // Sending data dname to post_word_count function.
        success: function(data){ // Show returned data using the function.
            jQuery("#new_logo").remove();
            jQuery("#logo_init").remove();
            jQuery("#logo").after("<img id=new_logo src=" + attachment.url + ">");
            jQuery("#new_logo").after("<button id=logo_remove>Remove Image</button>");
            jQuery(".media-modal-close").click();
            jQuery("button.logo_removal").remove();
        }
        }).done(function(){
          jQuery("button#logo_remove").on("click", function(){
            event.preventDefault();
            jQuery.ajax({
              type: 'POST',
              url: logoRemove.ajaxurl,
              data: {"action": "logo_remove"},
              success: function(data){
                jQuery("img#new_logo").remove();
                jQuery("img#logo_init").remove();
                jQuery("button#logo_remove").remove();
              }
            });
          });
        });


    });

    // Finally, open the modal
    file_frame.open();
  });

  // Restore the main ID when the add media button is pressed
  jQuery('a.add_media').on('click', function() {
    wp.media.model.settings.post.id = wp_media_post_id;
  });

  jQuery('#back_image').live('click', function( event ){

    event.preventDefault();

    // If the media frame already exists, reopen it.
    if ( file_frame_two ) {
      file_frame_two.open();
      return;
    }

    // Create the media frame.
    file_frame_two = wp.media.frames.file_frame_two = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame_two.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      var attach = file_frame_two.state().get('selection').first().toJSON();

      // Do something with attachment.id and/or attachment.url here
      jQuery.ajax({
        type: 'POST',   // Adding Post method
        url: backgroundSelector.ajaxurl, // Including ajax file
        data: {"action": "background_image_save", "background_image_url": attach.url }, // Sending data dname to post_word_count function.
        success: function(data){ // Show returned data using the function.
            jQuery("#new_back_img").remove();
            jQuery("#back_image_init").remove();
            jQuery("#back_image").after("<img id=new_back_img src=" + attach.url + ">");
            jQuery("#back_image").after("<button id=back_remove>Remove Image</button>");
            jQuery(".media-modal-close").click();
            jQuery("button.background_removal").remove();
        }
        }).done(function(){
          jQuery("button#back_remove").on("click", function(){
            event.preventDefault();
            jQuery.ajax({
              type: 'POST',
              url: backgroundRemove.ajaxurl,
              data: {"action": "background_image_remove"},
              success: function(data){
                jQuery("img#new_back_img").remove();
                jQuery("img#back_image_init").remove();
                jQuery("button#back_remove").remove();
              }
            });
          });

        });


    });

    // Finally, open the modal
    file_frame_two.open();
  });

  // Restore the main ID when the add media button is pressed
  jQuery('a.add_media').on('click', function() {
    wp.media.model.settings.post.id = wp_media_post_id;
  });

  jQuery('input#favicon').live('click', function( event ){

    event.preventDefault();

    // If the media frame already exists, reopen it.
    if ( file_frame_three ) {
      file_frame_three.open();
      return;
    }

    // Create the media frame.
    file_frame_three = wp.media.frames.file_frame_three = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame_three.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      var fav_attach = file_frame_three.state().get('selection').first().toJSON();

      // Do something with attachment.id and/or attachment.url here
      jQuery.ajax({
        type: 'POST',   // Adding Post method
        url: faviconSelector.ajaxurl, // Including ajax file
        data: {"action": "favicon_save", "favicon_url": fav_attach.url }, // Sending data dname to post_word_count function.
        success: function(data){ // Show returned data using the function.
            jQuery("#new_favicon").remove();
            jQuery("#favicon_init").remove();
            jQuery("#favicon").after("<img id=new_favicon src=" + fav_attach.url + ">");
            jQuery("#new_favicon").after("<button id=favicon_remove>Remove Image</button>");
            jQuery(".media-modal-close").click();
            jQuery("button.favicon_removal").remove();
        }
        }).done(function(){
          jQuery("button#favicon_remove").on("click", function(){
            event.preventDefault();
            jQuery.ajax({
              type: 'POST',
              url: faviconRemove.ajaxurl,
              data: {"action": "favicon_remove"},
              success: function(data){
                jQuery("img#new_favicon").remove();
                jQuery("img#favicon_init").remove();
                jQuery("button#favicon_remove").remove();
              }
            });
          });
        });


    });

    // Finally, open the modal
    file_frame_three.open();
  });

  // Restore the main ID when the add media button is pressed
  jQuery('a.add_media').on('click', function() {
    wp.media.model.settings.post.id = wp_media_post_id;
  });

  jQuery('#menu_logo').live('click', function( event ){

    event.preventDefault();

    // If the media frame already exists, reopen it.
    if ( file_frame_four ) {
      file_frame_four.open();
      return;
    }

    // Create the media frame.
    file_frame_four = wp.media.frames.file_frame_four = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame_four.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      var menu_logo_attachment = file_frame_four.state().get('selection').first().toJSON();

      // Do something with attachment.id and/or attachment.url here
      jQuery.ajax({
        type: 'POST',   // Adding Post method
        url: menuLogoSelector.ajaxurl, // Including ajax file
        data: {"action": "menu_logo_save", "menu_logo_url": menu_logo_attachment.url }, // Sending data dname to post_word_count function.
        success: function(data){ // Show returned data using the function.
            jQuery("#new_menu_logo").remove();
            jQuery("#menu_logo_init").remove();
            jQuery("#menu_logo").after("<img id=new_menu_logo src=" + menu_logo_attachment.url + ">");
            jQuery("#new_menu_logo").after("<button id=menu_logo_remove>Remove Image</button>");
            jQuery(".media-modal-close").click();
            jQuery("button.menu_logo_removal").remove();
        }
        }).done(function(){
          jQuery("button#menu_logo_remove").on("click", function(){
            event.preventDefault();
            jQuery(this).remove();
            jQuery.ajax({
              type: 'POST',
              url: menuLogoRemove.ajaxurl,
              data: {"action": "menu_logo_remove"},
              success: function(data){
                jQuery("img#new_menu_logo").remove();
                jQuery("img#menu_logo_init").remove();
                jQuery("button#menu_logo_remove").remove();
              }
            });
          });
        });


    });

    // Finally, open the modal
    file_frame_four.open();
  });

  // Restore the main ID when the add media button is pressed
  jQuery('a.add_media').on('click', function() {
    wp.media.model.settings.post.id = wp_media_post_id;
  });


  //hides everything
  jQuery("#twitter_name").parent().parent().parent().parent().parent().contents().hide();

  //showing style tab by default
    jQuery("#wp-site_desc-wrap").parent().parent().parent().css( "display", "block");
    jQuery("#wp-site_desc-wrap").parent().parent().parent().show();
    jQuery("#wp-site_desc-wrap").parent().parent().parent().parent().prev().css("display", "block");
    jQuery("#wp-site_desc-wrap").parent().parent().parent().parent().prev().next().css("display", "block");
    jQuery("#wp-site_desc-wrap").parent().parent().parent().parent().prev().show();
    jQuery("#journal_settings_submit").parent().css("display", "block").show();
  
    //get site description
    //text tab uses textarea and visual tab uses iframe
    var original_desc = jQuery("#site_desc").val();
    jQuery("#journal_settings_submit").on('click', function(){
      var desc = jQuery("#site_desc").val();
      if( jQuery("#mceu_27").css('display') != 'none' && original_desc !== desc){
       jQuery.ajax({
        type: 'POST',
        url: descAdd.ajaxurl,
        data: {"action": "desc_add", "site_desc": desc}
      }).done(function(){ location.reload(); }); 
     }else{
      var other_desc = document.getElementById("site_desc_ifr").contentDocument.body.innerHTML;
      jQuery.ajax({
        type: 'POST',
        url: descAdd.ajaxurl,
        data: {"action": "desc_add", "site_desc": other_desc}
      }).done(function(){ location.reload(); });
     }
      
    });




});

jQuery("#logo_init").after("<button class=logo_removal>Remove Image</button>");
jQuery(".logo_removal").on("click", function(){
                        event.preventDefault();
                        jQuery.ajax({
                          type: 'POST',
                          url: logoRemove.ajaxurl,
                          data: {"action": "logo_remove"},
                          success: function(data){
                            jQuery("img#new_logo").remove();
                            jQuery("img#logo_init").remove();
                            jQuery("button.logo_removal").remove();
                          }
                        });
                      });

jQuery("#menu_logo_init").after("<button class=menu_logo_removal>Remove Image</button>");
jQuery(".menu_logo_removal").on("click", function(){
                        event.preventDefault();
                        jQuery.ajax({
                          type: 'POST',
                          url: menuLogoRemove.ajaxurl,
                          data: {"action": "menu_logo_remove"},
                          success: function(data){
                            jQuery("img#new_menu_logo").remove();
                            jQuery("img#menu_logo_init").remove();
                            jQuery("button.menu_logo_removal").remove();
                          }
                        });
                      });

jQuery("#back_image_init").after("<button class=background_removal>Remove Image</button>");
jQuery("button.background_removal").on("click", function(){
          event.preventDefault();
          jQuery.ajax({
            type: 'POST',
            url: backgroundRemove.ajaxurl,
            data: {"action": "background_image_remove"},
            success: function(data){
              jQuery("img#new_back_img").remove();
              jQuery("img#back_image_init").remove();
              jQuery("button.background_removal").remove();
            }
          });
        });

jQuery("#favicon_init").after("<button class=favicon_removal>Remove Image</button>");
jQuery("button.favicon_removal").on("click", function(){
          event.preventDefault();
          jQuery.ajax({
            type: 'POST',
            url: faviconRemove.ajaxurl,
            data: {"action": "favicon_remove"},
            success: function(data){
              jQuery("img#new_favicon").remove();
              jQuery("img#favicon_init").remove();
              jQuery("button.favicon_removal").remove();
            }
          });
        });

function tabWork(args){
  args.forEach(function(tab){ 
    var that = tab[0];
    jQuery((tab[0])).on("click", function(){
      jQuery(tab[0]).addClass("active");

      jQuery(tab[1]).parent().parent().parent().css( "display", "block");
      jQuery(tab[1]).parent().parent().parent().show();
      jQuery(tab[1]).parent().parent().parent().parent().prev().css("display", "block");
      jQuery(tab[1]).parent().parent().parent().parent().prev().next().css("display", "block");
      jQuery(tab[1]).parent().parent().parent().parent().prev().show();
      jQuery("#journal_settings_submit").parent().css("display", "block").show();
      args.forEach(function(other_tabs){
        if( other_tabs[0] != that){
          jQuery(other_tabs[0]).removeClass("active");
          jQuery(other_tabs[1]).parent().parent().parent().hide();
          jQuery(other_tabs[1]).parent().parent().parent().parent().prev().hide();
        }
      });
    });
  });
   
}

tabWork([[ "#style.nav-tab","#logo"],["#general_admin", "#wp-site_desc-wrap"], ["#footer.nav-tab", "#ac_partner"], ["#social_media.nav-tab", "#twitter_name"]]);



