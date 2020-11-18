<?php
$num_correct = $_POST['num_correct'];
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>3択クイズ</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main">

            <div class="title"> 
                3択クイズ:簡単自己紹介
            </div>

            <div class="explanation">
                あなたは3問中<?php echo "$num_correct";?>問正解しました！<br>
            </div>

            <div class="button">
                <a href="index.html"><button>トップ画面へ</button></a>
            </div>

        </div>
    </body>
</html>