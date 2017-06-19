var scrollbtn = function(){
  var topBtn = $("#move-page-top");
  // ボタンを隠す
  topBtn.hide();
  $("#me").scrollTop($("ul").height())
  .scroll(function(){
    if($(this).scrollTop() > $("ul").height() - 1000){
      topBtn.fadeIn();
    }else if($("#me").scrollTop() == 0){
      topBtn.fadeOut();
    }else{
      topBtn.fadeOut();
    }
  });
  topBtn.click(function(){
    $("#me").animate({
      scrollTop:0
    },500);
    return false;
  });
}

