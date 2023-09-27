"use strict"
const forumList = document.querySelectorAll('.forum_link');
const moreForumList = document.querySelectorAll('.more_forum_link');
const moreButton = document.querySelector('#more_forum_button');

const forum_listing = () => {
    const viewportWidth = window.innerWidth;
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
    forumList.forEach((forum) => {
        if (i < numForumsToDisplay) {
            forum.hidden = false;
        } else {
            forum.hidden = true;
        }
        i++;
    });
    i = 0;
    moreForumList.forEach((forum) => {
        if (i < numForumsToDisplay - 3) {
            forum.hidden = true;
        } else {
            forum.hidden = false;
        }
        i++;
    });
    // if everything is hidden, we ensure to not show the more button
    if ([...moreForumList].every((forum) => {return forum.hidden == true})) {
        moreButton.hidden = true;
    } else {
        moreButton.hidden = false;
    }
}

forum_listing();

window.addEventListener('resize', forum_listing);