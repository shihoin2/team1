// ProductDetails.js

// document.addEventListener("DOMContentLoaded", function() {
//   // 削除ボタンがクリックされたときの処理
//   document.getElementById("delete").addEventListener("click", function() {

//     // 確認ダイアログを表示
//     if (confirm("この商品を削除しますか？")) {
//       // PHPで埋め込まれたitemIdを使用

//       // 商品の削除をサーバーにリクエスト
//       fetch("delete.php?item_id=" + itemId, {
//         method: "GET",
//       })
//       .then(response => response.json())
//       .then(data => {
//         if (data.success) {
//           // 削除成功時、ユーザーページにリダイレクト
//           window.location.href = "PersonalPage.php?user_id=<?php echo $user['user_id']; ?>";
//         } else {
//           // 削除失敗時の処理
//           alert("商品の削除に失敗しました。");
//         }
//       })
//       .catch(error => {
//         console.error("Error:", error);
//       });
//     }
//   });
// });
