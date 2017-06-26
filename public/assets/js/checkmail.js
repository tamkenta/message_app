$(function(){
  console.log('動いた');
  //$("button#sign").click(function(){
    console.log('フォーム開いたよ');
    //$("input#InputEmail").focus().blur(function(){
      
      $("button#check").click(function(){
        var mailval = $("input#InputEmail").val();
        console.log(mailval);
        var url = "api/check";
        var data = {address : mailval};
        $.ajax(url,{
            type:'POST',
            dataType:'json',
            timeout: 10000,
            data: data,
            multiplier:1,
            maxCalls:1,
        }).done(function(data){
          console.log(data);
          if(data['isUse']){
            $("button#check").remove();
            $("div#sub").append('<button type="submit" class="btn btn-info">送信</button>');
          }else{
            $('p#exist').html('');
            $("button#check").before('<p id="exist">このメールアドレスは使えません</p>');
          }
        }).fail(function(data){
          alert('只今使用できません<(_ _)>')
        })
      });
    //});
  //});
});
//append<button type="submit" class="btn info">送信</button>