// // When the user scrolls down 20px from the top of the document, show the button
// window.onscroll = function() {scrollFunction()};

// function scrollFunction() {
//     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//         document.getElementById("backToTop").style.display = "block";
//     } else {
//         document.getElementById("backToTop").style.display = "none";
//     }
// }

// //When the user clicks on the button, scroll to the top of the document
// function topFunction() {
//     document.body.scrollTop = 0;
//     document.documentElement.scrollTop = 0;
// }


  jQuery(document).ready(function($){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 20) {
            $('#backToTop').fadeIn('slow');
        } else {
            $('#backToTop').fadeOut('slow');
        }
    });
    $('#backToTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 2000);
        return false;
    });
});
