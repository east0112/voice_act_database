$(function () {
        var menufun = function( event ){
        event.preventDefault();
        }
        var topBtn = $('#page-top');  
        //topBtn.hide();
      $(".js-mobile-nav-click").click(function(){
        //ハンバーガーアイコン非表示
        $(".js-mobile-nav-click").fadeOut();
        // スクロール停止
        $("body").css("overflow","hidden");
        window.addEventListener( 'touchmove' , menufun , { passive: false } );

        //メニュー項目を表示
        $(".mobile-nav").css("opacity",0);
        //$(".mobile-nav-close").show(); 
        $(".mobile-nav").show();  
        $(".mobile-nav").animate({opacity:1},{duration:200}); 
        //メニュー項目のアニメーション
        $(".nav-item").each(function(i,elem) {
            //$(elem).delay(100 * i).css("opacity",1);
            $(elem).animate({opacity:1},{duration:300 * i}); 
        });
        return false;
      });
      $(".js-mobile-nav-close").click(function(){
        // スクロール開始
        window.removeEventListener( 'touchmove' , menufun , { passive: false } );
        $("body").css("overflow","auto");
        $(".js-mobile-nav-click").show();
        $(".mobile-nav").fadeOut(200);  
        $(".nav-item").animate({opacity:0},{duration:200}); 
        return false;
      });
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    //スクロールしてトップ
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
  });