var edit = function(){
  $('button.data').click(function(){
    var msg_id = $(this).data('msg');
    if(!$('p#'+msg_id).hasClass('on')){
      $('p#'+msg_id).addClass('on');
      var text = $('p#'+msg_id).text();
      $('p#'+msg_id).html('<textarea id="edit" maxlength="80">'+text+'</textarea>');
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
          console.log(data);
        }).fail(function(data){
          console.log('Connecction failed');
        })
      });
    }
  });
}