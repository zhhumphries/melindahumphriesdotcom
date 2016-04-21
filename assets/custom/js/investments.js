$(document).ready(function() {
    $('#menu-item-investments').addClass('active');
    $(".fancybox").fancybox({

        padding: 0,

        openEffect : 'none',
        closeEffect : 'none',
        nextEffect : 'none',
        prevEffect : 'none',

        closeClick : true,

        helpers : {
            title : {
                type : 'inside'
            },
            overlay : {
                css : {
                    'background' : 'rgba(238,238,238,0.85)'
                }
            }
        }
    });
});