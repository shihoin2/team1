<?php
try {
    $db = new PDO ('mysql:dbname=team1;host=shiotoukairinoMacBook-Air.local; charset=utf8', 'root', 'Doppo123');
} catch (PDOException $e) {
    echo 'DB接続エラー' . $e->getMessage();
}
?>