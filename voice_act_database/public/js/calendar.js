$(function () {
  var modalId ;
    $(".js-view-detail").click(function(){
      modalId = event.target.id;
      if($(".item" + modalId).length){
        $(".item" + modalId).show();
        $(".modal").fadeIn();  
      }
      return false;
    });
    $(".js-modal-close").click(function(){
      $(".modal").fadeOut()
      $(".item" + modalId).fadeOut();
      return false;
    });
});