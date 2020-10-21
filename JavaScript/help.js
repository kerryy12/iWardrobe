$(window).load(function () {
    $(".popup_help").click(function(){
       $('.background_hover').show();
    });
    $('.background_hover').click(function(){
        $('.background_hover').hide();
    });
    $('.popupCloseButton').click(function(){
        $('.background_hover').hide();
    });
});