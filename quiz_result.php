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

//問題文配列
$question0 = ["私の血液型は？","A型","O型","AB型",
              "img/ketsuekigata_a.png","img/ketsuekigata_o.png","img/ketsuekigata_ab.png","正解へ！"];
$question1 = ["私の好きなスポーツは？","野球","サッカー","バスケ",                                 
              "img/sports_baseball_man_asia.png","img/soccer_dribble2.png","img/basketball_dunk.png","正解へ！"];
$question2 = ["私が大学入学まで要した期間は？","現役合格","1浪","2浪",
              "img/happy_schoolboy.png","img/pose_kandou_man.png","img/pose_zetsubou_man.png","正解へ！"];

$arr = [$question0, $question1, $question2];

$response_left =$arr[$times][1];
$response_center =$arr[$times][2];
$response_right =$arr[$times][3];

$response_pic_left = $arr[$times][4];
$response_pic_center = $arr[$times][5];
$response_pic_right = $arr[$times][6];
$response_submit = $arr[$times][7];

$response = $_POST['response'];
//答えが正解のときの順番
$answer=["right","center","right"];

if($response == $answer[$times]){
    $t_or_f = 1;
    $num_correct = $num_correct + 1;
}
else{
    $t_or_f = 0;
}

if($t_or_f == 1){
?>
<div class="true">
    正解
</div>
<?php
}else{
?>
<div class="false">
    不正解
</div>
<?php }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>Quiz</title>
        <link rel="stylesheet" href="quiz_result.css">
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
                <?php if($answer[$times] == "left"){ ?>
                <div class="question-box-left">
                    <div class="c-mark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#f31414" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                    </div>
                    <div class="question-number1">①</div>
                    <div class="question-text"><?php echo $response_left;?>
                        <input id="check-c" type="radio" name="response" value="right"><label for="check-c"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_left;?>" alt="logo"></div>
                </div>

                <?php }else{ ?>

                <div class="question-box-left-white">
                    <div class="question-number1">①</div>
                    <div class="question-text"><?php echo $response_left;?>
                        <input id="check-c" type="radio" name="response" value="right"><label for="check-c"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_left;?>" alt="logo"></div>
                </div>

                <?php } ?>

                <?php if($answer[$times] == "center"){ ?>
                <div class="question-box-center">
                    <div class="c-mark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#f31414" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                    </div>
                    <div class="question-number2">②</div>
                    <div class="question-text"><?php echo $response_center;?>
                        <input id="check-b" type="radio" name="response" value="center"><label for="check-b"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_center;?>" alt="logo"></div>
                </div>

                <?php }else{ ?>
                <div class="question-box-center-white">
                    <div class="question-number2">②</div>
                    <div class="question-text"><?php echo $response_center;?>
                        <input id="check-b" type="radio" name="response" value="center"><label for="check-b"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_center;?>" alt="logo"></div>
                </div>
                <?php } ?>

                <?php if($answer[$times] == "right"){ ?>
                <div class="question-box-right">
                    <div class="c-mark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24" fill="none" stroke="#f31414" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                    </div>
                    <div class="question-number3">③</div>
                    <div class="question-text"><?php echo $response_right;?>
                        <input id="check-c" type="radio" name="response" value="right"><label for="check-c"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_right;?>" alt="logo"></div>
                </div>
                <?php }else{ ?>
                <div class="question-box-right-white">
                    <div class="question-number3">③</div>
                    <div class="question-text"><?php echo $response_right;?>
                        <input id="check-c" type="radio" name="response" value="right"><label for="check-c"></label>
                    </div>
                    <div class="question-image"><img src="<?php echo $response_pic_right;?>" alt="logo"></div>
                </div>
                <?php } ?>

                <br>
                <br>
                <?php $times = $times + 1;?>
                <?php if($times != 3){ ?>
                <form method="POST" class="form" action="quiz.php">
                    <input type="hidden" name="times" value="<?php echo $times;?>">
                    <input id="send_button" type="submit" value="次の問題へ">
                    <input type="hidden" name="num_correct" value="<?php echo $num_correct;?>">
                </form>
                    <?php }else{ ?>
                <form method="POST" class="form" action="result.php">
                    <input id="send_button" type="submit" value="結果を表示">
                    <input type="hidden" name="num_correct" value="<?php echo $num_correct;?>">
                </form>
                    <?php } ?>
            </div>
        </div>
    </body>
</html>