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
  <button class="home-button">ホーム</button>
  <button class="add-button">+</button>
</header>

<div id="app">
 
    <div class="user-name">OOさん</div> 
    <div class="content">
    <details class="like-section">
      <summary class="like-button"><span class="heart">❤️</span>LIKE</summary>
      <ul class="like-list">
        <li>商品名1</li>
        <li>商品名2</li>
        <li>商品名3</li>
        <li>商品名4</li>
      </ul>
    </details>
    <details class="dislike-section">
      <summary class="dislike-button"><span class="broken-heart">💙</span>DISLIKE</summary>
      <!-- Dislike items here -->
    </details>
  </div>
</div>

<footer id="footer"></footer>

<script src="script.js"></script>
</body>
</html>