"use strict"

const more = document.querySelector(".more");

const get_forums = () => {

    fetch('http://phpforum/api/forums')
    .then(response => response.json())
  .then(data => {
    console.log(data);
})
.catch(error => {
    // handle the error
    console.error("Ooops! Something went wrong :/...:", error);
});
}

more.addEventListener("click", get_forums);
