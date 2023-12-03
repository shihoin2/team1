<?php
session_start();
require('common/dbconnect.php');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Add Person</title>
<link rel="stylesheet" href="NameEntryPage/newstyles.css">
<!-- <link rel="stylesheet" href="NameEntryPage/styles.css"> -->
</head>
<body>

<header id="header">
  <button class="home-button"><a href="NameListPage.php"><img src="../img/home.svg" alt="ホーム"></a></button>
</header>

  <div class="registration-form">
    <form id="registrationForm" method="POST" action="NameEntryPage/register.php">
      <div class="input-group">
      <label for="user_name">Name</label>
      <input type="text" id="name" name="user_name" placeholder="Enter your name" required>
      </div>
      <button type="submit" class="register-button">登録</button>
    </form>
  </div>

<!-- <footer id="footer"></footer> -->
</body>
</html>
