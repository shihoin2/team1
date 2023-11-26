<?php
session_start();
require('dbconnect.php');

try {
    $db = new PDO ('mysql:dbname=team1;host=shiotoukairinoMacBook-Air.local; charset=utf8', 'root', 'Doppo123');
    $userId = $_SESSION['user_id']; // セッションにユーザーIDが保存されていると仮定

    // ユーザー名の取得
    $stmt = $db->prepare("SELECT user_name FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // 「いいね」した商品の取得
    $stmt = $db->prepare("SELECT item_name FROM items WHERE user_id = ? AND like_status = 'like'");
    $stmt->execute([$userId]);
    $likedItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 「よくない」商品の取得
    $stmt = $db->prepare("SELECT item_name FROM items WHERE user_id = ? AND like_status = 'dislike'");
    $stmt->execute([$userId]);
    $likedItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
}
?>