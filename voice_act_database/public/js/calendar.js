$(function () {
  var modalId ;
    $(".js-view-detail").click(function(){
      modalId = event.target.id;
      if($(".item" + modalId).length){
        //$("body").css("position","fixed");
        $("body").css("overflow","hidden");
        //$("body").css("top",$(window).scrollTop() & "px");
        $(".item" + modalId).show();
        $(".modal").fadeIn();  
      }
      return false;
    });
    $(".js-modal-close").click(function(){
      //$("body").css("position","static");
      $("body").css("overflow","auto");
      $(".modal").fadeOut()
      $(".item" + modalId).fadeOut();
      return false;
    });
});