"use strict";

document.addEventListener('DOMContentLoaded', () => {
  const likeDetails = document.querySelector('.like-section');
  const dislikeDetails = document.querySelector('.dislike-section');

  // likeDetails の toggle イベントを監視
  likeDetails.addEventListener('toggle', () => {
    const triangle = likeDetails.querySelector('.triangle img');
    // 開いているときは初期の90度からさらに90度回転して合計180度にする
    triangle.style.transform = likeDetails.open ? 'rotate(180deg)' : 'rotate(90deg)';
  });

  // dislikeDetails の toggle イベントを監視
  dislikeDetails.addEventListener('toggle', () => {
    const triangle = dislikeDetails.querySelector('.triangle img');
    // 同じく開いているときは合計180度にする
    triangle.style.transform = dislikeDetails.open ? 'rotate(180deg)' : 'rotate(90deg)';
  });
});

