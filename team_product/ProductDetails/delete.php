<?php
require('../common/dbconnect.php');


$itemId = $_POST['itemId'] ?? '';

$deleteQuery = "DELETE FROM items WHERE item_id = :itemId";


$deleteStmt = $db->prepare($deleteQuery);
$deleteStmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);

$userQuery = "SELECT user_id FROM items WHERE item_id = :itemId";
$userStmt = $db->prepare($userQuery);
$userStmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);

$userStmt->execute();
$user = $userStmt->fetch(PDO::FETCH_ASSOC);

if ($deleteStmt->execute()) {
  header("Location: ../PersonalPage.php?user_id={$user['user_id']}");
  exit();
} else {
  die('削除に失敗しました。');
}
?>
