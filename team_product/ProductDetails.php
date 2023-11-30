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
$userStmt->bindParam(':itemId', $userId, PDO::PARAM_INT);

$itemStmt->execute();
$userStmt->execute();

$item = $itemStmt->fetch(PDO::FETCH_ASSOC);
$user = $userStmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品情報</title>
  <link rel="stylesheet" href="ProductDetails/PcProductDetails.css">
  <!-- <link rel="stylesheet" href="ProductDetails/relProductDetails.css"> -->
  <script src="https://kit.fontawesome.com/4302d0f98e.js" crossorigin="anonymous"></script>
</head>
<body>

  <header>
  <?php
    echo "<a href=\"PersonalPage.php?user_id={$user['user_id']}\" ><i class=\"fa-solid fa-rotate-left\" style=\"color: #472e3a;\"></i></a>";
    ?>
    <div class="clear"></div>
  </header>
  <main>
  <div class="content">
    <div class="product_img">
    <?php

// 画像を表示
if (empty($item)) {
  header("Status: 500 Internal Server Error");
}

$imageData = $item['image_data'];
// echo '<div class="img"><img src="' . $imageData . '" alt="画像"></div>';
echo '<img src="' . $imageData . '" alt="画像"></div>';


echo "<div class=\"product-wrapper\">";
echo "<div class=\"product_name\">";
echo "<P class=\"title\">商品名</P><P>{$item['item_name']}</P></div>";
echo "<p class=\"line\"></p>";
echo "<div class=\"favorite\"><p class=\"title\">好み</p><p>{$item['like_status']}</p></div>";
echo "<p class=\"line\"></p>";
echo "<div class=\"comment\">{$item['description']}</div></div>";

$db = null;

?>



  </main>
  <footer>
  <form id="deleteForm" action="ProductDetails/delete.php" method="post">
  <input type="hidden" name="itemId" value="<?php echo $itemId; ?>">
  <i id="deleteIcon" class="fa-solid fa-trash-can" style="color: #472e3a; cursor: pointer;"></i>
</form>

  <script>
  document.getElementById('deleteIcon').addEventListener('click', function() {
    document.getElementById('deleteForm').submit();
  });
</script>

    <div class="clear"></div>
  </footer>
  <script src="ProductDetails/ProductDetails.js"></script>
</body>
</html>
