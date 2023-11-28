// delete_product.php

<?php
require('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 商品IDを取得
    $item_id = isset($_POST['item_id']) ? intval($_POST['item_id']) : 0;

    // 商品を削除するクエリ
    $query = "DELETE FROM items WHERE item_id = :item_id";

    // クエリを実行
    $stmt = $db->prepare($query);
    $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
    $stmt->execute();
}
?>
