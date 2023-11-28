"use strict";

document.addEventListener('DOMContentLoaded', () => {
  const likeDetails = document.querySelector('.like-section');
  const dislikeDetails = document.querySelector('.dislike-section');

  likeDetails.querySelector('summary').addEventListener('click', (event) => {
    event.stopPropagation(); // Prevent the click event from reaching the <details> element
  });

  dislikeDetails.querySelector('summary').addEventListener('click', (event) => {
    event.stopPropagation(); // Prevent the click event from reaching the <details> element
  });

  // Toggle details open/close when clicking anywhere within the summary
  likeDetails.addEventListener('click', () => {
    likeDetails.open = !likeDetails.open;
  });

  dislikeDetails.addEventListener('click', () => {
    dislikeDetails.open = !dislikeDetails.open;
  });
});