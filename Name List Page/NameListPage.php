<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>名前一覧</title>
    <link rel="stylesheet" href="resNameListPage.css">
    <link rel="stylesheet" href="PcNameListPage.css">
</head>
<body>
    <header>
    <a href="#"><img class="addperson" src="./img/addPersonSolid.png"> </a>
    <div class="clear"></div>
    </header>
    <main>
    <ul>
        <?php

            require('dbconnect.php');


            // ユーザー名を取得するクエリ
            $query = "SELECT user_name FROM users";

            // クエリを実行するための準備
            $stmt = $db->prepare($query);

            // クエリの実行
            $stmt->execute();

            // 結果を取得
            $userNames = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // 取得したユーザー名を表示
            foreach ($userNames as $user) {
                echo "<li><a href=\"#\">"
                . $user['user_name'] . "</a></li>" . PHP_EOL;
            }
        ?>
    </ul>
    </main>
    <footer>

    </footer>
    <script src="NameListPage.js"></script>
</body>
</html>
