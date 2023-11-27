<?php

// フォームデータの受け取り
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // データベース設定
  $host = 'db';
  $db   = 'team1';
  $user = 'root';
  $password = 'team@1';
  $charset = 'utf8mb4';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  try {
    // データベースへの接続
    $pdo = new PDO($dsn, $user, $password, $options);

    // 写真以外のデータをデータベースに保存
    $sql = "INSERT INTO items (item_name, like_status, description) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['productName'], $_POST['preference'], $_POST['comment']]);

    // 写真をアップロードしサーバーに保存
    if($_FILES['photo'] != null) {
      $tmp_name = $_FILES['photo']['tmp_name'];
      $photoName = basename($_FILES['photo']['name']);
      $uploadDir = '../photos/';
      $uploadFile = $uploadDir . $photoName;

      if (move_uploaded_file($tmp_name, $uploadFile)) {
        // 写真のパスをデータベースに保存
        // TODO(chums424): imagesテーブルとitemsテーブルの紐付け
        $sql = "INSERT INTO images (image_name, image_data) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$photoName, $uploadFile]);
      }
    }
  } // エラー処理
    catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品登録</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://kit.fontawesome.com/3cd2cb9097.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="navigation">
    <a href="../NameListPage.php"><button id="backButton" class="back-button">
      <i class="fa-solid fa-arrow-rotate-left" style="color: #472e3a;"></i>
    </button></a>
  </div>

  <div class="form-container">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="productName">商品名</label>
          <input type="text" id="productName" name="productName">
        </div>
        <div class="form-group">
          <label>好き嫌い</label>
          <div class="radio-group">
            <label><input type="radio" id="like" name="preference" value="like">好き</label>
            <label><input type="radio" id="dislike" name="preference" value="dislike">嫌い</label>
          </div>
        </div>
        <div class="form-group">
          <label for="comment">コメント</label>
          <textarea id="comment" name="comment" rows="8"></textarea>
        </div>
        <div class="form-group">
          <label for="photo">写真</label>
          <input type="file" id="photo" name="photo">
        </div>
        <button type="submit" class="submit-button">登録</button>
    </form>
  </div>

  <script src="script.js"></script>

</body>
</html>
