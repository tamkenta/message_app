var output = function(data){
  for(let i = 0; i < data.length; i++){
    //console.log(data[i]);
    var datetime = data[i]['date']
    var parsedate = new Date(datetime);
    // 日付の格納
    var y = parsedate.getFullYear();
    var m = parsedate.getMonth()+1;
    var w = parsedate.getDay();
    var d = parsedate.getDate();
    var yobi = new Array("日","月","火","水","木","金","土");

      // 時間の格納
    var hour = parsedate.getHours();
    var minute =parsedate.getMinutes();
    
    //昨日の抽出
    var yesterday = parsedate.setDate(d+1);
    yesterday = new Date(yesterday);
    var yes = yesterday.getDate();
    // console.log(yes);
    // 年月日に整形
    var nengappi = (y+"年"+m+"月"+d+"日["+yobi[w]+"] "+hour+":"+minute);
    //今日の日付
    var today = new Date();
    var todayy = today.getFullYear();
    var todaym = today.getMonth()+1;
    var todayd = today.getDate();
    // 今日の日付との比較
    if(todayy == y && todaym == m && todayd == d){
      nengappi = '今日'+hour+':'+minute;
    }else if(todayy == y && todaym == m && todayd == yes){
      nengappi = '昨日'
    }
    var m_id = data[i]['message_id'];


    if(data[i]['username']==current){
      // 現在のユーザがusernameに入っていれば右に追加
      $("ul").prepend('\
        <li class="timeline-inverted">\
          <div class="timeline-panel">\
            <div class="timeline-heading">\
              <h4 class="timeline-title">'+data[i]['username']+'</h4>\
              <p class="time"><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'+nengappi+'</small></p>\
            </div>\
            <div class="timeline-body">\
              <p id="'+m_id+'" class="data">'+data[i]['contents']+'</p>\
            </div>\
            <div>\
              <button id="'+ m_id +'" class="btn btn-danger">削除</button>\
              <button data-msg="'+m_id+'" class="data btn btn-warning">編集</button>\
          </div>\
        </li>\
      ');
    }else{
      // 左に追加
      $("ul").prepend('\
        <li>\
          <div class="timeline-panel">\
            <div class="timeline-heading">\
              <h4 class="timeline-title">'+data[i]['username']+'</h4>\
              <p class="time"><small class="text-muted"><i class="glyphicon glyphicon-time"></i>'+nengappi+'</small></p>\
            </div>\
            <div class="timeline-body">\
              <p data-msg="'+m_id+'" class="data">'+data[i]['contents']+'</p>\
            </div>\
          </div>\
        </li>\
      ');
    }
  }
  
  edit();
  scrollbtn();
  clickdel();
}

var allbtn = function(data){
  if(data.length >= 20){
    $("ul").prepend(
      $('<button class="btn" id="add" type="button" name="button">全件表示</button>')
      .click(function(){
        $("ul").text("");                        
        $.ajax({
          url:'api/all.json',
          type:'get',
          data: {request : id},
          dataType:'json',
          multiplier:1,
          maxCalls:1
          
        }).done(function(data){
          output(data);
          clickdel();
        }).fail(function(data){
          alert('Not Connection');
        })
      })
    );
  }
} 