"use strict"; // Enable strict mode

// Select forum elements and the "more" button
const forumList = document.querySelectorAll('.forum_link');
const moreForumList = document.querySelectorAll('.more_forum_link');
const moreButton = document.querySelector('#more_forum_button');

const forum_listing = () => {
    const viewportWidth = window.innerWidth;
    let numForumsToDisplay;
    let i;

    // Determine the number of forums to display based on viewport width
    if (viewportWidth >= 992) // lg breakpoint
        numForumsToDisplay = 6; 
    else if (viewportWidth >= 768) // md breakpoint
        numForumsToDisplay = 4;
    else
        numForumsToDisplay = 3;

    i = 0;

    // Toggle visibility for main forum list
    forumList.forEach((forum) => {
        forum.hidden = i >= numForumsToDisplay;
        i++;
    });

    i = 0;

    // Toggle visibility for "more" forum list
    moreForumList.forEach((forum) => {
        forum.hidden = i < numForumsToDisplay - 3;
        i++;
    });

    // Toggle "more" button visibility
    moreButton.hidden = [...moreForumList].every((forum) => forum.hidden);
}

// Initially set forum visibility based on the viewport width
forum_listing();

// Update forum display on window resize
window.addEventListener('resize', forum_listing);
