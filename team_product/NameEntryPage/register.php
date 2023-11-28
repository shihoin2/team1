<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['user_name'];

    if (empty($name)) {
        http_response_code(400);
        echo '名前が入力されていません。';
        error_log('名前が入力されていません。');
        exit;
    }

    // $mysqli = new mysqli('shiotoukairinoMacBook-Air.local', 'root', 'Doppo123', 'team1');
    $mysqli = new mysqli('localhost', 'root', '', 'team1');
    if ($mysqli->connect_error) {
        http_response_code(500);
        $errorMessage = 'データベースに接続できませんでした: ' . $mysqli->connect_error;
        echo $errorMessage;
        error_log($errorMessage);
        die;
    }

    $stmt = $mysqli->prepare('INSERT INTO users (user_name) VALUES (?)');
    if (!$stmt) {
        http_response_code(500);
        $errorMessage = 'データベースエラー: ' . $mysqli->error;
        echo $errorMessage;
        error_log($errorMessage);
        die;
    }

    $stmt->bind_param('s', $name);
    if (!$stmt->execute()) {
        http_response_code(500);
        $errorMessage = 'データベースエラー: ' . $stmt->error;
        echo $errorMessage;
        error_log($errorMessage);
        die;
    }

    $stmt->close();
    $mysqli->close();

    // リダイレクト
    header('Location: ../NameEntryPage.php'); // 元のフォームページにリダイレクト
    exit;
} else {
    http_response_code(400);
    echo 'Invalid request';
    error_log('Invalid request');
}
?>
