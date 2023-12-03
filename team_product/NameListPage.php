<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name LIst</title>
    <link rel="stylesheet" href="NameListPage/NameListPage.css">
    <script src="https://kit.fontawesome.com/4302d0f98e.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    <a href="NameEntryPage.php">
        <i class="fa-solid fa-user-plus" style="color: #472e3a;"></i>
    </a>
    <div class="clear"></div>
    </header>
    <main>
    <div class="name-list">
    <ul>
        <?php
            require('common/dbconnect.php');
            $query = "SELECT user_id, user_name FROM users";
            $stmt = $db->prepare($query);
            $stmt->execute(); // クエリの実行
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users as $user) {
                echo "<li><a href=\"PersonalPage.php?user_id={$user['user_id']}\">{$user['user_name']}</a></li>" . PHP_EOL;
                }
        ?>
    </ul>
    </div>
    </main>
    <footer>

    </footer>
</body>
</html>
