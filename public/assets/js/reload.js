$(document).ready(function(){
  $(".test-btn").click(function(){
    id = $(this).attr('name');
  });
  $("#re").click(function(){
    if(id == ""){
      console.log("ユーザー未選択");
      return false;
    }
    $("ul").text("");
    $.ajax({
      url:'api/create.json',
      type:'get',
      data: {request : id},
      dataType:'json',
      multiplier:1,
      maxCalls:1
      
    }).done(function(msg){
      output(msg);
      allbtn(msg);
      recentrydate(); 
    }).fail(function(msg){
      alert('Not Connection');
    })
  });
});