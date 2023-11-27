// ProductDetails.js

document.addEventListener('DOMContentLoaded', function () {
  // 削除ボタンをクリックしたときの処理
  document.querySelector('.delete_product').addEventListener('click', function () {
    // 確認ダイアログを表示
    if (confirm('本当に削除しますか？')) {
      // 削除処理を実行
      deleteProduct();
    }
  });

  // 商品削除処理
  function deleteProduct() {
    // 商品ID（例として1を指定）
    var item_id = 1;

    // Ajaxリクエストを作成
    var xhr = new XMLHttpRequest();

    // リクエストの設定
    xhr.open('POST', 'delete_product.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // レスポンスが返ってきたときの処理
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // レスポンスが成功したらページをリロード
        location.reload();
      }
    };

    // データを送信
    xhr.send('item_id=' + item_id);
  }
});
