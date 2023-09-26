"use strict"
const forumList = document.querySelectorAll('.forum_link');
// const BASE = "http://phpforum/";

const forum_listing = () => {
    const viewportWidth = window.innerWidth;
    // console.log(viewportWidth);
    // console.log(forumList);
    let numForumsToDisplay;
    let i;
    if (viewportWidth >= 992) { // lg breakpoint
        numForumsToDisplay = 6;
    } else if (viewportWidth >= 768) { // md breakpoint
        numForumsToDisplay = 4;
    } else {
        numForumsToDisplay = 3;
    }
    i = 0;
    // console.log(i);
    // console.log(numForumsToDisplay);
    forumList.forEach((forum) => {
        if (i < numForumsToDisplay) {
            forum.hidden = false;
        } else {
            forum.hidden = true;
        }
        i++;
    });
}

forum_listing();

window.addEventListener('resize', forum_listing);