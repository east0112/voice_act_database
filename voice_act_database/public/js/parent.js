$(function () {
    var menufun = function( event ){
      event.preventDefault();
    }
      $(".js-mobile-nav-click").click(function(){
        //ハンバーガーアイコン非表示
        $(".js-mobile-nav-click").fadeOut();
        // スクロール停止
        $("body").css("overflow","hidden");
        window.addEventListener( 'touchmove' , menufun , { passive: false } );

        //メニュー項目を表示
        $(".mobile-nav-close").fadeIn();  
        $(".mobile-nav").fadeIn();  
        return false;
      });
      $(".js-mobile-nav-close").click(function(){
        // スクロール開始
        window.removeEventListener( 'touchmove' , menufun , { passive: false } );
        $("body").css("overflow","auto");
        $(".js-mobile-nav-click").fadeIn();
        $(".mobile-nav").fadeOut()
        return false;
      });
  });