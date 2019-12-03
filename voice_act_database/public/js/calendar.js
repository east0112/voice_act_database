$(function () {
  var modalId ;
  var movefun = function( event ){
    event.preventDefault();
  }
    $(".js-view-detail").click(function(){
      modalId = event.target.id;
      if($(".item" + modalId).length){
        // スクロール停止
        $("body").css("overflow","hidden");
        window.addEventListener( 'touchmove' , movefun , { passive: false } );
 
        $(".item" + modalId).show();
        $(".modal").fadeIn();  
        $(".modal-content-event").fadeIn();  
      }
      return false;
    });
    $(".js-modal-close").click(function(){
      // スクロール開始
      window.removeEventListener( 'touchmove' , movefun , { passive: false } );
      $("body").css("overflow","auto");
      $(".modal-content-event").fadeOut();  
      $(".modal-content-select-month").fadeOut();  
      $(".modal").fadeOut()
      $(".item" + modalId).fadeOut();
      return false;
    });

    $(".js-view-year").click(function(){
      // スクロール停止
      $("body").css("overflow","hidden");
      window.addEventListener( 'touchmove' , movefun , { passive: false } );

      $(".modal").fadeIn();  
      $(".modal-content-select-month").fadeIn();  
    return false;
    });
    /*
    $(".js-modal-year-close").click(function(){
      // スクロール開始
      window.removeEventListener( 'touchmove' , movefun , { passive: false } );
      $("body").css("overflow","auto");
      $(".modal-content-select-month").fadeOut();  
      $(".modal").fadeOut()
      return false;
    });
    */
    //年月指定画面・year-next
    $(".js-select-year-back").click(function(){
      var current_year = $('input:hidden[name="currentYear"]').val();
      $('input:hidden[name="currentYear"]').val(parseInt(current_year) - 1);
      $(".modal-calendar-header-date").text(parseInt(current_year) - 1);
    });
    //年月指定画面・year-next
    $(".js-select-year-next").click(function(){
      var current_year = $('input:hidden[name="currentYear"]').val();
      $('input:hidden[name="currentYear"]').val(parseInt(current_year) + 1);
      $(".modal-calendar-header-date").text(parseInt(current_year) + 1);
    });

    //年月指定画面・submit
    $(".js-select-month-submit").click(function(){
      //月の取得       
      var month = $(this).text();
      month = month.slice(0,-1);
      //hiddenにセット
      $('input:hidden[name="currentMonth"]').val(month);
      document.select_search.submit();

      });

});