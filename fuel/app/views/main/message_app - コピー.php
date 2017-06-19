<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>main </title>
<!--css,jsload-->
<?php echo Asset::css(array('bootstrap.css', 'ss.css', 'mine.css')); ?>
<?php echo Asset::js(array('jquery-3.2.1.js', 'clicksubmit.js','jquery.periodicalupdater.js')); ?>


<script>
var current = '<?php print(Auth::get_screen_name()); ?>';
$(".test-btn").click(function(){
    // クリックされたユーザを変数に格納
    var id = $(this).attr('name');
});

</script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-3"><h3>current:<?php print(Auth::get_screen_name()); ?></h3><br />
            


                           
            <?php foreach($data as $row): ?>
            <div id="name" class="btn test-btn" name="<?= $row['username'] ?>"><h4>friend: <?= $row['username']?></h4></div>
            <br />
            <?php endforeach; ?>

            <?php if(false): ?>
            <p>trueです</p>
            <?php endif; ?>

                
        </div>
<!--<div class="btn test-btn" attr="id5">test</div>-->
<!--<div class="btn test-btn" attr="id8">test2</div>-->

<!--メッセージユーザ表示-->
        <div class="col-md-9">
            <div class="page-header">
                <h1 id="timeline"><p id="output"></p></h1>
                <?php echo Form::open('/logout'); ?>
                <div class="logout">
                <?php 
                $img =  Asset::img('button.png', array('id' => 'logo'));
                echo Form::button('logout','Logout '.$img,array('id' => 'blogout', 'autofocus'));
                ?>
                </div>
                <?php echo Form::close();?>
            </div>
            <br />
            <div id="me">
                <ul class="timeline">

                <h1>Select talk user</h1>
<!--チャットのbootstrap終わり-->
<!--メッセージをajaxでデータベースから取得-->
                </ul>
            </div>
<!--フォーム-->
            <?php 
                $plane =  Asset::img('plane.png', array('id' => 'plane'));
            ?>
            <div id="send">
            <form id="the-form" action="api/in" method="post">
                <input id="scale" type="text" name="message" size="100%" required>
                <button id="go" type="submit" name="button"><?php print($plane) ?></button>

            </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>