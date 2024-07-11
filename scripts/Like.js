const likeButtons = document.querySelectorAll('.like-button');
const dislikeButtons = document.querySelectorAll('.dislike-button');

likeButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const likeCount = button.querySelector('.like-count');
    const currentLikeCount = parseInt(likeCount.textContent);
    likeCount.textContent = currentLikeCount + 1;

    // Get the like count from local storage
    let likes = localStorage.getItem('likes');
    if (likes === null) {
      likes = {};
    } else {
      likes = JSON.parse(likes);
    }

    // Increment the like count for the current button
    const buttonId = button.getAttribute('id');
    if (likes[buttonId] === undefined) {
      likes[buttonId] = 1;
    } else {
      likes[buttonId]++;
    }

    // Update local storage with the new like count
    localStorage.setItem('likes', JSON.stringify(likes));
  });
});

dislikeButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const dislikeCount = button.querySelector('.dislike-count');
    const currentDislikeCount = parseInt(dislikeCount.textContent);
    dislikeCount.textContent = currentDislikeCount + 1;

    // Get the dislike count from local storage
    let dislikes = localStorage.getItem('dislikes');
    if (dislikes === null) {
      dislikes = {};
    } else {
      dislikes = JSON.parse(dislikes);
    }

    // Increment the dislike count for the current button
    const buttonId = button.getAttribute('id');
    if (dislikes[buttonId] === undefined) {
      dislikes[buttonId] = 1;
    } else {
      dislikes[buttonId]++;
    }

    // Update local storage with the new dislike count
    localStorage.setItem('dislikes', JSON.stringify(dislikes));
  });
});

// Get the like and dislike counts from local storage and update the UI
window.onload = function() {
  // Get the like count from local storage
  let likes = localStorage.getItem('likes');
  if (likes!== null) {
    likes = JSON.parse(likes);

    // Update the UI with the like count
    const likeButtons = document.querySelectorAll('.like-button');
    likeButtons.forEach((button) => {
      const buttonId = button.getAttribute('id');
      if (likes[buttonId]!== undefined) {
        const likeCount = button.querySelector('.like-count');
        likeCount.textContent = likes[buttonId];
      }
    });
  }

  // Get the dislike count from local storage
  let dislikes = localStorage.getItem('dislikes');
  if (dislikes!== null) {
    dislikes = JSON.parse(dislikes);

    // Update the UI with the dislike count
    const dislikeButtons = document.querySelectorAll('.dislike-button');
    dislikeButtons.forEach((button) => {
      const buttonId = button.getAttribute('id');
      if (dislikes[buttonId]!== undefined) {
        const dislikeCount = button.querySelector('.dislike-count');
        dislikeCount.textContent = dislikes[buttonId];
      }
    });
  }
}

//! Clear local storage when the page is unloaded
window.onbeforeunload = function() {
  localStorage.clear();
};

