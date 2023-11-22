<?php
session_start();
require('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>登録フォーム</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<header id="header">
  <div class="header">
    <button class="home-button">ホーム</button>
  </div>

</header>

  <div class="registration-form">
    <form id="registrationForm" method="POST" action="register.php">
      <div class="input-group">
      <label for="user_name">Name</label>
      <input type="text" id="name" name="user_name" placeholder="Enter your name" required>
      </div>
      <button type="submit" class="register-button">登録</button>
    </form>
  </div>

<footer id="footer"></footer>
<!-- <script src="script.js"></script>
<script>
  document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // デフォルトの送信を防止
    registerUser();
  });
</script> -->
</body>
</html> 