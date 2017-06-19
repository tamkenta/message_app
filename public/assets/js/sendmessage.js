// 選択ユーザへのメッセージのPOSTと追加後のメッセージログの取得
$(document).ready(function(){
    var ic = "";
    
    $(".test-btn").click(function(){
        ic = $(this).attr('name');
    });
    // ユーザが選択されていなければ送信できない
    $('#the-form').submit(function(event){
        if(ic == ""){
          console.log("ユーザー未選択");
          return false;
        }
        // formタグの無効か
        event.preventDefault();
        
        var $f = $(this);
        var $b = $f.find('button');
        var url = "api/in.json"
        var data ={
                mes: $('input[name="message"]').val(),
                user: ic
                };
        $.ajax(url,{
            type:'POST',
            dataType:'text',
            timeout: 10000,
            data: data,
            multiplier:1,
            maxCalls:1,

            // 送信前
            beforeSend: function(xhr, setting){
                $b.attr('disabled', true);
            },
            // 応答後
            complete: function(xhr, textStatus){
                $b.attr('disabled', false);
            },
        }).done(function(){
          $.ajax({
            url:'api/create.json',
            type:'get',
            data: {request : ic},
            dataType:'json',
            multiplier:1,
            maxCalls:1
          }).done(function(msg){
            $("ul").text("");
            output(msg);
            allbtn(msg);
            recentrydate();          
            $f[0].reset(); 
          })
        });
    });     
});