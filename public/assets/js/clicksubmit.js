// document.write('<script type="text/javascript" language="JavaScript" src="jquery.periodicalupdater.js"></script>');
// ユーザをクリックイベント時ににやり取り履歴を出力するスクリプト
//documentが開いたら(画像とかは含まない)

$(document).ready(function(){
	// console.log($(this).attr);
  // ユーザ選択イベント
  recentrydate();
  $(".test-btn").click(function(){
    // クリックされたユーザを変数に格納
    var id = $(this).attr('name');
    // console.log(id);
    // これはhtmlに書いたスクリプトの変数が使えるかの確認
    // console.log(current);
    // チャットの初期化
    $("ul").text("");
    // idがoutputのタグに選択されたユーザを出力
    $("#output").text(id);
    // GETで抽出する履歴の条件
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
    })
  });
});

// ユーザを一番上で表示（デフォルト）
$(document).ready(function(){
  $(".col-md-3").scrollTop(0);
});
/*$(document).ready(function(){
    $.PeriodicalUpdater({
    //  オプション設定
        url: 'api/create.json',  // 送信リクエストURL
        minTimeout: 1000,    // 送信インターバル(ミリ秒)
        method:'get',              // 'post'/'get'：リクエストメソッド
        //sendData             // 送信データ
        //maxTimeout           // 最長のリクエスト間隔(ミリ秒)
        //multiplier           // リクエスト間隔の変更(2に設定の場合、レスポンス内容に変更がないときは、リクエスト間隔が2倍になっていく)
        type:'json',                 // xml、json、scriptもしくはhtml (jquery.getやjquery.postのdataType)
    },
    function(msg){
       $("ul").text("");
            for(let i = 0; i < msg.length; i++){
              var datetime = msg[i]['date']
              var parsedate = new Date(datetime);
              // 日付の格納
              var y = parsedate.getFullYear();
              var m = parsedate.getMonth()+1;
              var w = parsedate.getDay();
              var d = parsedate.getDate();
              var yobi = new Array("日","月","火","水","木","金","土");
              var nengappi = (y+"年"+m+"月"+d+"日["+yobi[w]+"]");
              
              var today = new Date();
              var todayy = today.getFullYear();
              var todaym = today.getMonth()+1;
              var todayd = today.getDate();

              if(todayy == y && todaym == m && todayd == d){
                nengappi = '今日';
              }else if(todayy == y && todaym == m && (todayd-1) == d){
                nengappi = '昨日'
              }else{
                return nengappi;
              }
              if(msg[i]['username']==current){
                $("ul").append('\
                  <li class="timeline-inverted">\
                    <div class="timeline-panel">\
                      <div class="timeline-heading">\
                        <h4 class="timeline-title">'+msg[i]['username']+'</h4>\
                        <p class="time"><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'+nengappi+'</small></p>\
                      </div>\
                      <div class="timeline-body">\
                        <p class="msg">'+msg[i]['contents']+'</p>\
                      </div>\
                    </div>\
                  </li>\
                ');
              }else{
                $("ul").append('\
                  <li>\
                    <div class="timeline-panel">\
                      <div class="timeline-heading">\
                        <h4 class="timeline-title">'+msg[i]['username']+'</h4>\
                        <p class="time"><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'+nengappi+'</small></p>\
                      </div>\
                      <div class="timeline-body">\
                        <p class="msg">'+msg[i]['contents']+'</p>\
                      </div>\
                    </div>\
                  </li>\
                ');
              }
              
            }
    });
});*/




