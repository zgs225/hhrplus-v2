$(function(){
  //Goto Top
  $('.gototop').click(function(event) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: $("body").offset().top
    }, 500);
  });

  $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

  // 验证吗获取和验证
  var captchaDrop = undefined, captchaValid = false, captchaChars = 5;

  $('input[name=captcha]').keyup(function() {
      var captcha = $(this).val();

      if (captcha.length == captchaChars) {
        $.ajax({
          'method' : 'GET',
          'url'    : '/captcha/check',
          'data'   : {'captcha': captcha},
          'context': captchaDrop
        }).done(function(data) {
          captchaValid = data.isValid;

          var formGroup = $(this.target).closest('.form-group');
          if (captchaValid) {
            formGroup.find('.captcha-btn').removeAttr('disabled');
            formGroup.find('.hhrplus-add-on .hhrplus-add-on-item').remove();
            formGroup.find('.hhrplus-add-on').append(' <span class="hhrplus-add-on-item"> <i class="fa fa-check-circle-o"></i></span>');
            setTimeout(function() {
              captchaDrop.destroy();
            }, 50);
          } else {
            formGroup.find('.captcha-btn').attr('disabled', true);
            formGroup.find('.hhrplus-add-on .hhrplus-add-on-item').remove();
            formGroup.find('.hhrplus-add-on').append(' <span class="hhrplus-add-on-item"> <i class="fa fa-times-circle-o"></i></span>');
          }
        });
      }
  });

  $('input[name=captcha]').focus(function() {
    if (captchaDrop && captchaDrop.isOpened()) { return true; }

    captchaDrop && captchaDrop.target && captchaDrop.destroy();

    captchaDrop = new Drop({
      target   : this,
      content  : '<div class="hhrplus-captcha-block"><img src="/captcha? ' + Math.random() + '" alt="合伙人+图形验证码"><br><a href="#">看不清？</a></div>',
      position : 'bottom left',
      classes  : 'drop-theme-hubspot-popovers',
      openOn   : 'always'
    });

    $(this).val('');
    var formGroup = $(this).closest('.form-group');
    formGroup.find('.hhrplus-add-on .hhrplus-add-on-item').remove();
    formGroup.find('.captcha-btn').attr('disabled', true);
    captchaValid = false;
  });

  $(':has(input[name=captcha])').delegate('.hhrplus-captcha-block img, .hhrplus-captcha-block a', 'click', function(e) {
    e.preventDefault();
    $(this).closest('.hhrplus-captcha-block').find('img').attr('src', '/captcha?' + Math.random());
  });

  $(':has(input[name=captcha]) .captcha-btn').click(function(e) {
    e.preventDefault();
    var form      = $(this).closest('form'),
        button    = $(this),
        captcha   = form.find('[name=captcha]').val(),
        telephone = form.find('[name=buyer_telephone]').val(),
        remainSec = 60,
        errorBlock= $(button).closest('.controls').find('.help-block');

    function checkTelephone() {
      return telephone && /\d{11}/.test(telephone);
    }

    if (!checkTelephone()) {
      errorBlock.html('<ul role="alert"><li>请输入正确的手机号码, 目前只支持中国地区。</li></ul>');
      return false;
    }

    errorBlock.empty();

    $.ajax({
      'method' : 'GET',
      'url'    : '/captcha/needsSmsValidation',
      'data'   : {'captcha': captcha, 'telephone': telephone},
    }).done(function(data) {
      function countDown() {
        if (remainSec && remainSec > 0) {
          button.text('已发送(' + remainSec + ')');
          button.attr('disabled', true);
          remainSec--;
        }
        else{
          button.text('短信验证码');
          button.removeAttr('disabled');
          return true;
        }

        if (data.statusCode == 1) {
          setTimeout(countDown, 1000);
        } else {
          alert(data.status);
        }
      }

      if (data.status) {
        countDown();
      }
    });
  });
});
