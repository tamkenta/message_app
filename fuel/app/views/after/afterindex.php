<!DOCTYPE html>
<html lang="ja">
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">		
<?php echo Asset::css('bootstrap.css'); ?>
<?php echo Asset::js('jquery-3.2.1.js') ?>
<?php echo Asset::js('bootstrap.js') ?>
<title>送信完了</title>
<style>
div.waku{
  border: 5px outset;
  text-align:center;
  margin-top:60px;
  margin-right: 100px;
  margin-left: 100px;
  box-shadow: 10px 10px 10px rgba(0,0,0,0.5);
  background-color: white;
}
body{
  height: 100%;
  width: 100%;
  background-color: #8BC34A;
}
</style>
</head>
<body>

<div class="waku">
  <div>
    <h1>メールを送信しました。</h1>
  </div>
  <div>
    <p>メールに記載のURLから、登録を完了させてください。</p>
    <p>尚、このページは更新しますと何度もメールが送られてしまうため、消して頂くことを推奨します。</p>
    <!--<button class="btn">--><a href="https://www.google.co.jp/">不明点がある方はこちらへ</a><!--</button>-->
  </div>
  <!--<button class="btn">--><a href="/">サインインはこちらへ</a><!--</button>-->
</div>
</body>
</html>