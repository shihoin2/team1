<?php
// session_start();
require('common/dbconnect.php');
  // URLからユーザーIDを取得
  $userId = $_GET['user_id'] ?? '';
  // ユーザーIDからユーザー名を取得
  $userNameQuery = "SELECT user_name FROM users WHERE user_id = :userId";
  // ユーザーIDに紐づいた商品情報を取得
  $itemsQuery = "SELECT item_id, item_name, like_status FROM items WHERE user_id = :userId";
  // SQLステートメントを準備
  $userNameStmt = $db->prepare($userNameQuery);
  $itemsStmt = $db->prepare($itemsQuery);
  // パラメータをバインド
  $userNameStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
  $itemsStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
  // SQLステートメントを実行
  $userNameStmt->execute();
  $itemsStmt->execute();
  // 結果を取得
  $user = $userNameStmt->fetch(PDO::FETCH_ASSOC);
  $items = $itemsStmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>個人ページ</title>
<link rel="stylesheet" href="PersonalPage/styles.css">
</head>
<body>

<header id="header">
<button class="home-button"><a href="NameListPage.php"><img src="../img/home.svg" alt="ホーム"></a></button>
<button class="add-button"><a href="index.php?user_id=<?php echo $userId; ?>"><img src="../img/add.svg" alt="ホーム"></a></button>
</header>

<div id="app">
    <!-- ユーザー名を動的に表示 -->

<?php
  // ユーザー名を表示
  echo "<div class='user-name'>{$user['user_name']}</div>";
  ?>

    <div class="content">
    <details class="like-section">
    <summary class="like-button">
      <span class="triangle"><img src="../img/three.svg" alt="三角"></span>
      <span class="heart"><img src="../img/like.svg" alt="ホーム"></span>LIKE
    </summary>
      <ul class="like-list">
        <!-- 「いいね」した商品を動的に表示 -->
        <?php
          foreach ($items as $item) {
              if ($item['like_status'] === 'like') {
                  echo "<li><a href=\"ProductDetails.php?item_id={$item['item_id']}\">{$item['item_name']}</a></li>";
                }
              }
              ?>

      </ul>
    </details>
    <details class="dislike-section">
    <summary class="like-button">
      <span class="triangle"><img src="../img/three.svg" alt="三角"></span>
      <span class="heart"><img src="../img/dislike.svg" alt="ホーム"></span>DISLIKE</summary>
      <!-- Dislike items here -->
      <ul class="like-list">
      <?php
        foreach ($items as $item) {
            if ($item['like_status'] === 'dislike') {
                echo "<li><a href=\"ProductDetails.php?item_id={$item['item_id']}\">{$item['item_name']}</a></li>";
              }
            }
        ?>

      </ul>
    </details>
  </div>
</div>

<script src="PersonalPage/script.js"></script>
</body>
</html>
