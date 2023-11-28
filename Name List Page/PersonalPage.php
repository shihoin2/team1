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
      <?php
require('dbname.php');

    $userId = 1; // ここに対象のユーザーIDを指定
    $likeStatus = 'like';
    $sql = "SELECT items.item_id, items.item_name, items.description, categories.category_name
            FROM items
            INNER JOIN categories ON items.category_id = categories.category_id
            WHERE items.user_id = :userId AND items.like_status = :likeStatus";

    // SQLステートメントを準備
    $stmt = $db->prepare($sql);

    // パラメータをバインド
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':likeStatus', $likeStatus, PDO::PARAM_STR);

    // SQLステートメントを実行
    $stmt->execute();

    // 結果を取得
    $likeItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // like_statusが 'like' の商品情報を表示
    echo "<li>\n";
    print_r($likeItems);
    echo "</li>";
    // dislikeの場合も同様に取得、表示することができます
    // $db = null;
?>
      </ul>
    </details>
    <details class="dislike-section">
      <summary class="dislike-button"><span class="broken-heart">💙</span>DISLIKE</summary>
      <ul>
      <?php
// データベース接続情報
require('dbname.php');

    // ユーザーIDに紐づく、like_statusが 'dislike' の商品情報を取得するSQLクエリ
    $userId = 1; // ここに対象のユーザーIDを指定
    $dislikeStatus = 'dislike';
    $sql = "SELECT items.item_id, items.item_name, items.description, categories.category_name
            FROM items
            INNER JOIN categories ON items.category_id = categories.category_id
            WHERE items.user_id = :userId AND items.like_status = :dislikeStatus";

    // SQLステートメントを準備
    $stmt = $db->prepare($sql);

    // パラメータをバインド
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':dislikeStatus', $dislikeStatus, PDO::PARAM_STR);

    // SQLステートメントを実行
    $stmt->execute();

    // 結果を取得
    $dislikeItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // dislikeの商品情報を表示
    echo "<li>\n";
    print_r($dislikeItems);
    echo "</li>";

// データベース接続を閉じる
$db = null;
?>
      </ul>
      <!-- Dislike items here -->
    </details>
  </div>
</div>

<footer id="footer"></footer>

<script src="script.js"></script>
</body>
</html>
