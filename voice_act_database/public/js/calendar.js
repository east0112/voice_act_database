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
      }
      return false;
    });
    $(".js-modal-close").click(function(){
      // スクロール開始
      window.removeEventListener( 'touchmove' , movefun , { passive: false } );
      $("body").css("overflow","auto");
      $(".modal").fadeOut()
      $(".item" + modalId).fadeOut();
      return false;
    });
});