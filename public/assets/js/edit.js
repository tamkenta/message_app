var edit = function(){
  $('button.data').click(function(){
    var msg_id = $(this).data('msg');
    if(!$('p#'+msg_id).hasClass('on')){
      $('p#'+msg_id).addClass('on');
      var text = $('p#'+msg_id).text();
      $('p#'+msg_id).html('<textarea id="edit"  rows="6" maxlength="80">'+text+'</textarea>');
      // $('textarea').autosize();
      textarea();
      $('p#'+msg_id+' > textarea').focus().blur(function(){
        var inputValue = $(this).val();
        if(inputValue==''){
          inputValue = this.defaultValue;
          alert('メッセージを空にできません。');
        }
       
        $(this).parent().removeClass('on').text(inputValue);
        var url = "api/update";
        var data ={
                id: msg_id,
                editval: inputValue
                };
        $.ajax(url,{
            type:'POST',
            dataType:'text',
            timeout: 10000,
            data: data,
            multiplier:1,
            maxCalls:1,
        }).done(function(data){
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
        }).fail(function(data){
          console.log('Connecction failed');
        })
      });
    }
  });
}

var textarea  = function(){
  $('textarea').focus(function(e) {
    //文字数から高さ取得
    var height=this.scrollHeight + 'px';
    $(this).css("height", height);
    })
    .blur(function(e) {
    $(this).css("height", "auto");
  });
}
