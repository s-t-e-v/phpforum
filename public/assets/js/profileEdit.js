"use strict";

const forumList = document.querySelector(".forum_list");
const topicList = document.querySelector(".topic_list");

const toggleDelIco = (e) => {
    const delIco = e.target.nextElementSibling.querySelector("i");
    delIco.hidden = !e.target.checked;
}

const setTopicListState = (e) => {
    toggleDelIco(e);
}

// Event listener
if (forumList)
    forumList.addEventListener('change', toggleDelIco);
if (topicList)
    topicList.addEventListener('change', setTopicListState);


