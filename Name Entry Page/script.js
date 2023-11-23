'use strict';

function registerUser() {
  // ステップ1: 入力する情報を取得（ここではユーザー名）
  const name = document.getElementById('name-input').value;

  // ステップ2: POSTに送信先URLを指定（PHPファイルのパス）
  if (name) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'register.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // ステップ4: 結果を確認
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4) {
<<<<<<< HEAD
        console.log(xhr.responseText); // レスポンスをコンソールに出力
=======
        console.log(xhr.responseText); 
>>>>>>> 7261f2b65159982a73cb98504fb234dc10077564
        if (xhr.status == 200) {
          alert('登録が成功しました！');
        } else {
          alert('登録中にエラーが発生しました。');
        }
      }
    };

    // ステップ3: PHPにデータを送信
    xhr.send('name=' + encodeURIComponent(name));
  } else {
    alert('名前を入力してください。');
  }
}
