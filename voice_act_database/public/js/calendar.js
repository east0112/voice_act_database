$(function () {
  var modalId ;
    $(".js-view-detail").click(function(){
      modalId = event.target.id;
      if($(".item" + modalId).length){
        $("body").css("position","fixed");
        $(".item" + modalId).show();
        $(".modal").fadeIn();  
      }
      return false;
    });
    $(".js-modal-close").click(function(){
      $("body").css("position","static");
      $(".modal").fadeOut()
      $(".item" + modalId).fadeOut();
      return false;
    });
});