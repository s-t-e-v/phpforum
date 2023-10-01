"use strict";

const forumList = document.querySelector(".forum_list");

const toggleDelIco = (e) => {
    const delIco = e.target.nextElementSibling.querySelector("i");
    delIco.hidden = !e.target.checked;
}

// Event listener
forumList.addEventListener('change', toggleDelIco);

