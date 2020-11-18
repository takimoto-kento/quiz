<?php

//入力された値の設定

if(isset($_POST['times'])){
    $times = $_POST['times'];
}
else{
    //エラー
    $times= 0;
}
if(isset($_POST['num_correct'])){
    $num_correct = $_POST['num_correct'];
}
else{
    //エラー
    $num_correct= 0;
}
?>

<?php
$question0 = ["私の血液型は？","A型","O型","AB型",
 "img/ketsuekigata_a.png","img/ketsuekigata_o.png","img/ketsuekigata_ab.png","次へ！"];
$question1 = ["私の好きなスポーツは？","野球","サッカー","バスケ",        "img/sports_baseball_man_asia.png","img/soccer_dribble2.png","img/basketball_dunk.png","次へ！"];
$question2 = ["私が大学入学まで要した期間は？","現役合格","1浪","2浪",
              "img/happy_schoolboy.png","img/pose_kandou_man.png","img/pose_zetsubou_man.png","終了！"];

$arr = [$question0, $question1, $question2];

$response_left =$arr[$times][1];
$response_center =$arr[$times][2];
$response_right =$arr[$times][3];

$response_pic_left = $arr[$times][4];
$response_pic_center = $arr[$times][5];
$response_pic_right = $arr[$times][6];
$response_submit = $arr[$times][7];

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Quiz</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main">
            <div class="title2">
                <?php
                $a = $times + 1;
                echo "第","$a","問";
                ?>
            </div>
            <div class="border-hedder">
            </div>
            <div class="question-instruction">
<!--               問題文-->
                <?php echo $arr[$times][0]; ?>
            </div>
            
            <div class="question-box">
                <form method="POST" class="form" action="quiz_result.php">
                    <div class="question-box-left">
                        <div class="question-number1">①</div>
                        <div class="question-text"><?php echo $response_left;?>
                            <input id="check-a" type="radio" name="response" value="left" checked><label for="check-a"></label>
                        </div>
                        <div class="question-image"><img src="<?php echo $response_pic_left;?>" alt="logo"></div>
                    </div>
                    
                    <div class="question-box-center">
                        <div class="question-number2">②</div>
                        <div class="question-text"><?php echo $response_center;?>
                            <input id="check-b" type="radio" name="response" value="center"><label for="check-b"></label>
                        </div>
                        <div class="question-image"><img src="<?php echo $response_pic_center;?>" alt="logo"></div>
                    </div>
                    
                    <div class="question-box-right">
                        <div class="question-number3">③</div>
                        <div class="question-text"><?php echo $response_right;?>
                            <input id="check-c" type="radio" name="response" value="right"><label for="check-c"></label>
                        </div>
                        <div class="question-image"><img src="<?php echo $response_pic_right;?>" alt="logo"></div>
                    </div>
                    <br>
                    <input type="hidden" name="times" value="<?php echo $times;?>">
                    <input type="hidden" name="num_correct" value="<?php echo $num_correct;?>">
                    <input type="submit" value="<?php echo $response_submit;?>">
                </form>          
            </div>
        </div>
    </body>
</html>