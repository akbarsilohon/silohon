// --------------------------------------------
// Page Builder Disabled or Enabled -----------
// --------------------------------------------
jQuery('#is_call_builder').click( function(){
    if( jQuery(this).hasClass('builder-active')){
        jQuery(this).removeClass('button-primary builder-active');
        jQuery('#silo_builder_active').val('');
        jQuery('#postdivrich, #pageparentdiv, #postimagediv').fadeIn();
        jQuery('#home_builder').hide();
    } else{
        jQuery(this).addClass('button-primary builder-active');
        jQuery('#silo_builder_active').val('true');
        jQuery('#postdivrich, #pageparentdiv, #postimagediv').hide();
        jQuery('#home_builder').fadeIn();
    }

    return false;
});

if( jQuery('#silo_builder_active').val() == 'true' ){
    jQuery('#postdivrich, #pageparentdiv, #postimagediv').hide();
}

// ------------------------------------------
// Grid Section Builder ---------------------
// ------------------------------------------
var defCat = jQuery('#cats_default').html();
jQuery('.add_item').click( function(){
    var style = jQuery(this).data('style');
    var title = jQuery(this).data('title');
    var numb = ( style == 'g6' ? 6 : 9 );
    jQuery('#item_list').append('\
    <li id="grid_item_'+nextCell+' ?>" class="grid_item">\
        <div class="grid_header">\
            <h3 class="grid_title">\
                Grid Layout: '+title+'\
                <a style="display:none;" class="toggle-open">+</a>\
                <a style="display:block;" class="toggle-close">-</a>\
            </h3>\
        </div>\
        <div class="grid_body">\
            <label>\
                <span>Category: </span>\
                <select name="grid_layouts['+nextCell+'][cat]" id="grid_layouts['+nextCell+'][cat]">\
                '+defCat+'\
                </select>\
            </label>\
            <label>\
                <span>Post Number: </span>\
                <input type="number" value="'+numb+'" name="grid_layouts['+nextCell+'][num]" id="grid_layouts['+nextCell+'][num]">\
            </label>\
            <label>\
                <span>Random Post: </span>\
                <div class="grid_checkbox disabled">\
                    <input type="checkbox" name="grid_layouts['+nextCell+'][order]" id="grid_layouts['+nextCell+'][order]" value="rand">\
                </div>\
            </label>\
            <input type="hidden" name="grid_layouts['+nextCell+'][style]" id="grid_layouts['+nextCell+'][style]" value="'+style+'">\
            <a class="del-cat"></a>\
        </div>\
    </li>');
    nextCell++;
});

// Close or Open All -----------------
// -----------------------------------
jQuery(document).on( 'click', '#close_all', function(){
    jQuery('#item_list .grid_body').slideUp(300);
    jQuery('#item_list .toggle-open').show();
    jQuery('#item_list .toggle-close').hide();
});

jQuery(document).on( 'click', '#open_all', function(){
    jQuery('#item_list .grid_body').slideDown(300);
    jQuery('#item_list .toggle-open').hide();
    jQuery('#item_list .toggle-close').show();
});

jQuery( document ).on( 'click', '.toggle-close', function(){
    jQuery(this).parent().parent().parent().find('.grid_body').slideUp(300);
    jQuery(this).hide();
    jQuery(this).parent().find('.toggle-open').show();
});

jQuery( document ).on( 'click', '.toggle-open', function(){
    jQuery(this).parent().parent().parent().find('.grid_body').slideDown(300);
    jQuery(this).hide();
    jQuery(this).parent().find('.toggle-close').show();
});

// Menu Checkbox ---------------------
// -----------------------------------
jQuery( document ).on( 'click', '.grid_checkbox', function(){
    jQuery(this).toggleClass('disabled');
});

// Delete List -----------------------
// -----------------------------------
jQuery( document ).on( 'click', '.del-cat', function(){
    jQuery( this ).parent().parent().addClass('removered').fadeOut( function(){
        jQuery( this ).remove();
    });
});


// ----------------------------------------------------
// Last Section Jquery --------------------------------
// ----------------------------------------------------
jQuery('#last_sec').click( function(){
    if( jQuery(this).hasClass('last_disabled') ){
        jQuery(this).removeClass('last_disabled');
        jQuery('.section_bot').slideDown(400);
        jQuery('.section_bot').css('display', 'grid');
    } else{
        jQuery(this).addClass('last_disabled');
        jQuery('.section_bot').slideUp(400);
    }
});

jQuery( document ).on( 'click', '#last_rand', function(){
    jQuery(this).toggleClass('disabled');
});

// ---------------------------------------------
// Hero Jquery ---------------------------------
// ---------------------------------------------
jQuery('#hero_sec').click( function(){
    if( jQuery(this).hasClass('hero_disabled')){
        jQuery(this).removeClass('hero_disabled');
        jQuery('.hero_bot').slideDown(400);
        jQuery('.hero_bot').css('display', 'grid');
    } else{
        jQuery(this).addClass('hero_disabled');
        jQuery('.hero_bot').slideUp(400);
    }
});

jQuery( document ).on( 'click', '#hero_rand', function(){
    jQuery(this).toggleClass('disabled');
});