<?php
session_start();
require('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>個人ページ</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<header id="header">
<button class="home-button"><a href="../Name List Page/NameListPage.php"><img src="../img/home.svg" alt="ホーム"></a></button>
<button class="add-button"><img src="../img/add.svg" alt="ホーム"></button>
</header>

<div id="app">
    <!-- ユーザー名を動的に表示 -->
    <div class="user-name"><?php echo htmlspecialchars($userName, ENT_QUOTES, 'UTF-8'); ?>さん</div>
    <div class="content">
    <details class="like-section">
    <summary class="like-button">
      <span class="triangle"><img src="../img/three.svg" alt="三角"></span>
      <span class="heart"><img src="../img/like.svg" alt="ホーム"></span>LIKE
    </summary>
      <ul class="like-list">
        <!-- 「いいね」した商品を動的に表示 -->
        <?php foreach ($likedItems as $item): ?>
          <li><?php echo htmlspecialchars($item['item_name'], ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
      </ul>
    </details>
    <details class="dislike-section">
    <summary class="like-button">
      <span class="triangle"><img src="../img/three.svg" alt="三角"></span>
      <span class="heart"><img src="../img/dislike.svg" alt="ホーム"></span>DISLIKE</summary>
      <!-- Dislike items here -->
      <ul class="like-list">
        <!-- 「いいね」した商品を動的に表示 -->
        <?php foreach ($likedItems as $item): ?>
          <li><?php echo htmlspecialchars($item['item_name'], ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
      </ul>
    </details>
  </div>
</div>

<!-- <footer id="footer"></footer> -->

<script src="script.js"></script>
</body>
</html>