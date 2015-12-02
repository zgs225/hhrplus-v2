$(document).ready(function(){
    $(".h_h_angle_top").click(function (e) {
        $('body,html').animate({scrollTop:0},1000);
        return false;
    })
    $(".h_l_nav dl").click(function (e) {
        $('html,body').animate({scrollTop: $(".h_l_list_bt").eq($(this).index()).offset().top}, 500);
    })
})

