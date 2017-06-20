<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>main </title>
<!--css,jsload-->
<?php echo Asset::css(array('bootstrap.css', 'ss.css', 'mine.css','jquery.fs.tipper.css')); ?>
<?php echo Asset::js(array('jquery-3.2.1.js','jquery.periodicalupdater.js','jquery.fs.tipper.min.js')); ?>
<?php echo Asset::js(array('recentry.js','output.js','clickdel.js','scrollbtn.js', 'clicksubmit.js','reload.js','sendmessage.js','edit.js')); ?>
<!--/*echo Asset::js('autosize.js'); */-->


<script>
var current = '<?php print(Auth::get_screen_name()); ?>';
$(".test-btn").click(function(){
    // クリックされたユーザを変数に格納
    var id = $(this).attr('name');
});
// マウスオーバーでTipperを呼び出して吹き出し作成

$(document).ready(function(){
    $(".Tipper-demo").tipper();
    //各要素のdata属性にオプションを設定しています
});

// $('div#name').load(function(){
$(document).ready(function(){
    var new_post = $(this).attr("name");

        $("div.test-btn").map(function(){
            return $(this).attr("name");
        });
});

</script>

</script>
<style>

</style>

</head>
               
<body>

<div class="container">
    <div class="row">
        <!--<div class="col-md-3">-->
        <div class="left-window">
            <h3><?php print(Auth::get_screen_name()); ?></h3><br />
                           
            <?php foreach($data as $row): ?>
            <div id="name" class="btn test-btn btn-info Tipper-demo" name="<?= $row['username'] ?>" data-title="<?= $row['username'] ?>" data-tipper-options='{"direction":"right","follow":"true"}'>
                <h4 name="<?= $row['username'] ?>" class = "users dropdown"><?= $row['username']?></h4>
            </div>
            <br />
            <?php endforeach; ?>

            <?php if(false): ?>
            <p>trueです</p>
            <?php endif; ?>

                
        </div>
<!--<div class="btn test-btn" attr="id5">test</div>-->
<!--<div class="btn test-btn" attr="id8">test2</div>-->

<!--メッセージユーザ表示-->
        <!--<div class="col-md-9">-->
        <div class="right-window">
            <div class="page-header">
                <h1 id="timeline"><p id="output"></p></h1>
                <?php echo Form::open('/logout'); ?>
                <div class="logout">
                <?php 
                $img =  Asset::img('button.png', array('id' => 'logo'));
                echo Form::button('logout','Logout '.$img,array('id' => 'blogout', 'autofocus','class' => 'btn btn-primary'));
                ?>
                </div>
                <?php echo Form::close();?>
            </div>
            <br />
            <div id="me">
                <ul class="timeline">

                <h1 class="opening">Select talk user</h1>
<!--チャットのbootstrap終わり-->
<!--メッセージをajaxでデータベースから取得-->
                </ul>
                
            </div>
            <div class="arrow"> 
                <?php $uparrow = Asset::img('uparrow.png',array('id' => 'uparrow')); ?>
                <p><a id="move-page-top" class="move-page-top"><?php print($uparrow) ?></a></p>
            </div>

<!--フォーム-->
            <?php 
                $plane =  Asset::img('plane.png', array('id' => 'plane'));
                $reload = Asset::img('reload.png', array('id' => 'reload'));
            ?>
            <!--<div id="page-top" class="page-top">-->
            <div id="send">
            <form id="the-form" action="api/in" method="post">
                <input id="scale" type="text" name="message" placeholder="Write Message!!" required>
                <button id="go" class = "btn" type="submit" name="button"><?php print($plane) ?></button>
                <button id="re" class = "btn" type="reset" name="button"><?php print($reload) ?></button>
            </form>
            </div>
        </div>
    </div>
</div>





</body>
</html>
<!--echo Asset::js('indicate.js');-->