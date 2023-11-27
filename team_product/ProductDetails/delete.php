<?php
require('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $item_id = isset($_POST['item_id']) ? intval($_POST['item_id']) : 0;


    $query = "DELETE FROM items WHERE item_id = :item_id";


    $stmt = $db->prepare($query);
    $stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
    $stmt->execute();
}
?>
