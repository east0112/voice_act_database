$(function () {
        var menufun = function( event ){
        event.preventDefault();
        }
        var topBtn = $('#page-top');  
        var menuStatus = false;
        //topBtn.hide();
        //ナビゲーションメニュー開始
        $(".js-mobile-nav-click").click(function(){
            if(menuStatus == false){
                //ハンバーガーアイコン非表示
                $(".menu-trigger").toggleClass("active");
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
                    $(elem).animate({opacity:1},{duration:400 * i}); 
                });
                menuStatus = true;
            }else{
                $(".menu-trigger").toggleClass("active");
                // スクロール開始
                window.removeEventListener( 'touchmove' , menufun , { passive: false } );
                $("body").css("overflow","auto");
                $(".mobile-nav").fadeOut(200);  
                $(".nav-item").animate({opacity:0},{duration:200}); 
                menuStatus = false;
            }
            return false;
        });
        //ナビゲーションメニュー終了
        $(".js-mobile-nav-close").click(function(){
            $(".menu-trigger").toggleClass("active");
            // スクロール開始
            window.removeEventListener( 'touchmove' , menufun , { passive: false } );
            $("body").css("overflow","auto");
            $(".mobile-nav").fadeOut(200);  
            $(".nav-item").animate({opacity:0},{duration:200}); 
            menuStatus = false;
            return false;
        });
        //ナビゲーションメニュー項目ホバー
        //$(".nav-item").hover(function(){
        //});

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