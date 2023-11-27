<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品情報</title>
  <link rel="stylesheet" href="ProductDetails/PcProductDetails.css">
  <link rel="stylesheet" href="ProductDetails/relProductDetails.css">
  <script src="https://kit.fontawesome.com/4302d0f98e.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
require('common/dbconnect.php');

// URLからアイテムIDを取得
$itemId = $_GET['item_id'] ?? '';
// アイテム情報を取得するSQLクエリ
$itemQuery = "SELECT items.item_name, items.like_status, items.description, images.image_data
              FROM items
              LEFT JOIN images ON items.image_id = images.image_id
              WHERE items.item_id = :itemId";

$userQuery = "SELECT user_id, user_name FROM users";

$itemStmt = $db->prepare($itemQuery);
$userStmt = $db->prepare($userQuery);

$itemStmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
$userStmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);

$itemStmt->execute();
$userStmt->execute();

$item = $itemStmt->fetch(PDO::FETCH_ASSOC);
$user = $userStmt->fetch(PDO::FETCH_ASSOC);
?>
  <header>
    <?php
    echo "<a href=\"PersonalPage.php?user_id={$user['user_id']}\"><i class=\"fa-solid fa-rotate-left\" style=\"color: #472e3a;\"></i></a>";
    ?>

    <div class="clear"></div>
  </header>
  <main>
  <div class="content">
    <div class="product_img">
    <?php

// // URLからアイテムIDを取得
// $itemId = $_GET['item_id'] ?? '';
// // アイテム情報を取得するSQLクエリ
// $itemQuery = "SELECT items.item_name, items.like_status, items.description, images.image_data
//               FROM items
//               LEFT JOIN images ON items.image_id = images.image_id
//               WHERE items.item_id = :itemId";

// $itemStmt = $db->prepare($itemQuery);
// $itemStmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
// $itemStmt->execute();

// $item = $itemStmt->fetch(PDO::FETCH_ASSOC);

// もし$itemがfalse（取得に失敗）ならエラーメッセージを表示
if ($item === false) {
    die('Item not found or database error.');
}

if (!empty($item['image_data'])) {
  echo "{$item['image_data']}</div>";
}  else {
  echo "</div>";
}

echo "<div class=\"product-wrapper\">";
echo "<div class=\"product_name\">";
echo "<P class=\"title\">商品名</P><P>{$item['item_name']}</P></div>";
echo "<p class=\"line\"></p>";
echo "<div class=\"favorite\"><p class=\"title\">好み</p><p>{$item['like_status']}</p></div>";
echo "<p class=\"line\"></p>";
echo "<div class=\"comment\">{$item['description']}</div></div>";

$db = null;

?>
<!-- //  <?php
//
//require('dbconnect.php');
//    // itemsテーブルと関連するテーブルからデータを取得するクエリ
//    $query = "SELECT items.item_name, items.like_status, items.description, images.image_data
//              FROM items
//              LEFT JOIN images ON items.image_id = images.image_id
//              WHERE items.item_id = :item_id";
//
//
//    // クエリ実行
//    $stmt = $db->prepare($query);
//    $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
//    $stmt->execute();
//
//    // 結果を取得
//    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//    // 取得したデータを表示
//    foreach ($items as $item) {
//        echo "<img src=\"" . $item['image_data'] . "\"></div>";
//        echo "<div class=\"product-wrapper\">";
//        echo "<div class=\"product_name\">";
//        echo "<P class=\"title\">商品名</P><P>" . $item['item_name'] . "</P></div>";
//        echo "<p class=\"line\"></p>";
//        echo "<div class=\"favorite\"><p class=\"title\">好み</p><p>" . $item['like_status'] . "</p></div>";
//        echo "<p class=\"line\"></p>";
//        echo "<div class=\"comment\">" . $item['description'] . "</div></div></div>";
//    }
// ?>-->

  </main>
  <footer>
    <a href="#"><i class="fa-solid fa-trash-can delete_product" style="color: #472e3a;"></i></a>
    <div class="clear"></div>
  </footer>
  <!-- <style>
    .fa-solid {
      font-size: 40px;
    }
  </style> -->
  <script src="ProductDetails/ProductDetails.js"></script>
</body>
</html>
