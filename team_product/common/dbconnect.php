<?php
$dsn = 'mysql:host=localhost;dbname=team1;charset=utf8';
$user = 'root';
$pwd = '';

// LAPTOP-M8O94PKH
try{
	// 接続
	$db = new PDO($dsn, $user, $pwd);
	// echo 'データベース接続成功' . PHP_EOL;
	// 切断
	// $db = null;
} catch(PDOException $e){
    echo "データベース接続失敗" . PHP_EOL;
	echo $e->getMessage();
	exit;
}
?>

<!-- <?php
// try {
//     $db = new PDO ('mysql:dbname=team1;host=shiotoukairinoMacBook-Air.local; charset=utf8', 'root', 'Doppo123');
// } catch (PDOException $e) {
//     echo 'DB接続エラー' . $e->getMessage();
// }
?> -->
