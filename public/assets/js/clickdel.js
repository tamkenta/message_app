var clickdel = function(){
  $(".btn-danger").click(function(){
    if (confirm("削除しますか？")) {
      var m_id = $(this).attr("id");
      $("ul").text("");
      
      var $f = $(this);
      var $b = $f.find('button');
      var url = "api/del"
      var data ={
              id: m_id,
              };
      $.ajax(url,{
          type:'POST',
          dataType:'text',
          timeout: 10000,
          data: data,
          multiplier:1,
          maxCalls:1,
      }).done(function(data){
        $.ajax({
          url:'api/create.json',
          type:'get',
          data: {request : id},
          dataType:'json',
          multiplier:1,
          maxCalls:1
        }).done(function(msg){
          output(msg);
          clickdel();
          recentrydate();
          scrollbtn();
        }).fail(function(data){
          alert("shock");
        })
      }).fail(function(data){
        alert("none");
      })
    }
  });
}