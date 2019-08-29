$(function () {
    $(".js-view-detail").click(function(){
      $(".modal").fadeIn()
      return false;
    });
    $(".js-modal-close").click(function(){
      $(".modal").fadeOut()
      return false;
    });
});