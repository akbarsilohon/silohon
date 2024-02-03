// Landing page js ===================
// ===================================
function paidSection( sectionNumber ){

    document.getElementById('paidForm1').classList.add('slhidden');
    document.getElementById('paidForm2').classList.add('slhidden');
    document.getElementById('paidForm3').classList.add('slhidden');

    document.getElementById('paidForm' + sectionNumber ).classList.remove('slhidden');

    document.querySelectorAll('.paid_btn').forEach( tab => {
        tab.classList.remove( 'active' );
    });

    document.querySelector( '.paid_btn:nth-child('+ sectionNumber +')' ).classList.add( 'active' );
    localStorage.setItem('selectedSection', sectionNumber);
}

var selectedSection = localStorage.getItem('selectedSection');
if( selectedSection ){
    paidSection( selectedSection );
} else{
    paidSection(1);
}


// Media uploader content 1 ======================
// ===============================================
jQuery( document ).ready( function( $ ){
    var MediaContent_1;

    $( '#paid_change_img_1' ).on( 'click', function( e ){

        e.preventDefault();

        if( MediaContent_1 ){
            MediaContent_1.open();
            return;
        }

        MediaContent_1 = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Thumnail for post 1',
            button: {
                text: 'Chose a Image'
            },
            multiple: false
        });

        MediaContent_1.on( 'select', function(){
            attachment = MediaContent_1.state().get('selection').first().toJSON();
            $( '#paid_img_1' ).val( attachment.url );
        });

        MediaContent_1.open();

    });
});


// Media uploader content 2 ======================
// ===============================================
jQuery( document ).ready( function( $ ){
    var MediaContent_2;

    $( '#paid_change_img_2' ).on( 'click', function( e ){
        e.preventDefault();

        if( MediaContent_2 ){
            MediaContent_2.open();
            return;
        }

        MediaContent_2 = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Thumnail for post 2',
            button: {
                text: 'Chose a Image'
            },
            multiple: false
        });

        MediaContent_2.on( 'select', function(){
            attachment = MediaContent_2.state().get('selection').first().toJSON();
            $( '#paid_img_2' ).val( attachment.url );
        });

        MediaContent_2.open();

    });
});


// Media uploader content 3 ======================
// ===============================================
jQuery( document ).ready( function( $ ){
    var MediaContent_3;

    $( '#paid_change_img_3' ).on( 'click', function( e ){
        e.preventDefault();

        if( MediaContent_3 ){
            MediaContent_3.open();
            return;
        }

        MediaContent_3 = wp.media.frames = wp.media({
            title: 'Choose a Thumnail for post 3',
            button: {
                text: 'Chose a Image'
            },
            multiple: false
        });

        MediaContent_3.on( 'select', function(){
            attachment = MediaContent_3.state().get('selection').first().toJSON();
            $( '#paid_img_3' ).val( attachment.url );
        });

        MediaContent_3.open();

    });
});


// Media Content Bot ======================
// ========================================
jQuery( document ).ready( function( $ ){
    var MediaContent_4;

    $( '#bot_change_img' ).on( 'click', function( e ){
        e.preventDefault();

        if( MediaContent_4 ){
            MediaContent_4.open();
            return;
        }

        MediaContent_4 = wp.media.frames = wp.media({
            title: 'Choose a Thumnail',
            button: {
                text: 'Choose a Image'
            },
            multiple: false
        });

        MediaContent_4.on( 'select', function(){
            attachment = MediaContent_4.state().get('selection').first().toJSON();
            $( '#bot_img' ).val( attachment.url );
        });

        MediaContent_4.open();

    });
});