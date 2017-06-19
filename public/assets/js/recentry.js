var recentrydate = function(){
  $.ajax({
      url:'api/recentry.json',
      type:'get',
      dataType:'json',
      multiplier:1,
      maxCalls:1
  }).done(function(data){
    recentry_spread(data);
  }).fail(function(data){
    console.log('connection error');
  })
}

var recentry_spread = function(data){
  var new_post = $("div.test-btn").map(function(){
    return $(this).attr("name");
  });
  console.log(data);
  console.log(new_post);
  console.log(current);

  // jsonで返ってきたオブジェクトの展開のためのループ
  for(let i = 0; i < data.length; i++){
    // console.log(new_post[j]);
    var datetime = data[i]["recentry_date"]
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
    var nengappi = (y+"/"+m+"/"+d);
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
    // ユーザ覧の上からの順でループする
    for(let j = 0; j < new_post.length; j++){
      // ユーザ一覧に返ってきたオブジェクトのfromユーザまたはtoユーザのどちらかが一致すれば処理
      if((new_post[j] == data[i]['username'] || new_post[j] == data[i]['touser'])){
        // console.log("h6#"+new_post[j]);
        // 新しく作る予定のh6要素になにも入っていない場合（メッセージなし）
        if($("h6#"+new_post[j]) == null){
          $("h4[name="+new_post[j]+"]").append("<h6 daata-name='"+new_post[j]+"'>"+nengappi+"</h6>");
          // 入っていた場合中身を消して新しく挿入
        }else{
          $("h6#"+new_post[j]).text("");
          $("h4[name="+new_post[j]+"]").append("<h6 data-name='"+new_post[j]+"'>"+nengappi+"</h6>");
        }
      //}else{
       //$("h4[name="+new_post[j]+"]").append("<h6 id='"+new_post[j]+"'>メッセージがありません</h6>");
      }
    }
  }
}