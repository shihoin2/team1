"use strict";

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('registrationForm');
  
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // フォームのデフォルトの送信を防ぎます
    
    const name = document.getElementById('name-input').value;
    if (name) {
      alert(`こんにちは、${name}さん！`);
      // ここに送信処理を書くことができます。例えば:
      // sendFormData(name);
    } else {
      alert('名前を入力してください。');
    }
  });

  // 非同期でフォームデータを送信する関数の例
  function sendFormData(userName) {
    // ここに非同期通信のコードを書きます。例:
    /*
    fetch('your-endpoint', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ name: userName }),
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch((error) => console.error('Error:', error));
    */
  }
});