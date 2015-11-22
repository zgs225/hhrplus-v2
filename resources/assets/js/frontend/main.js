$(function(){
  //Goto Top
  $('.gototop').click(function(event) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: $("body").offset().top
    }, 500);
  });

  $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
});
