$(document).ready(function () {
    
    function setContent($el) {
        $('.btn-tab').removeClass('active');
        $('.panel-content').hide();

        $el.addClass('active');
        $($el.data('rel')).show();
    }
    
    $('.btn-tab').click(function (e) {
        e.preventDefault();
        setContent($(this));
    });

    // set content on load
    $('.btn-tab.active').length && setContent($('.btn-tab.active'));

    
});