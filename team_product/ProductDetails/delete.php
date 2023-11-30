<?php
require('../common/dbconnect.php');

// URLからアイテムIDを取得
$itemId = $_GET['item_id'] ?? '';

// アイテムを削除するSQLクエリ
$deleteQuery = "DELETE FROM items WHERE item_id = :itemId";
$deleteStmt = $db->prepare($deleteQuery);
$deleteStmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);

// 削除クエリ実行
if ($deleteStmt->execute()) {
  // 削除成功の場合
  echo json_encode(['success' => true]);
} else {
  // 削除失敗の場合
  echo json_encode(['success' => false]);
}

$db = null;
