jQuery(document).ready(function ($) {

    // get document viewpoint height
    var vh_height = $(window).height();

    // If default scroll is more than viewpoint height then shows icon
    if($(document).scrollTop() >= (vh_height/2))
    {
        $('.sttcp').css({'display':'flex'});        
    }

    // Check user scrolling
    $(document).on('scroll', function(){
        
        // get current scrolling height
        let current_scroll =  $(document).scrollTop();

        /*
        * If current scroll is more than viewpoint height then shows icon
        * Else hide icon
        */
        if(current_scroll >= (vh_height / 2)){
            $('.sttcp').css({'display':'flex'});
        }
        else{
            $('.sttcp').hide();            
        }
    });

    // Scroll to top on icon clikc
    $(document).on('click', '.sttcp', function(){

        // scroll to top
        $('html, body').animate({ scrollTop: 0 }, 'slow');

        // hide scroll to top icon
        $(this).hide();
    });
});