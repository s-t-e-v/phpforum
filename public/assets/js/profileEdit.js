"use strict";

const forumList = document.querySelector(".forum_list");
const topicList = document.querySelector(".topic_list");

const toggleDelIco = (e) => {
    const delIco = e.target.nextElementSibling.querySelector("i");
    delIco.hidden = !e.target.checked;
}

const setTopicListState = (e) => {
    toggleDelIco(e);
    const topics = e.target.parentElement.querySelectorAll(".topic_item");
    const nbTopics2delete = [...topics].map((topic) => topic.checked).filter(Boolean).length;
    const forumId = (e.target.id.match(/forum(\d+)/) || [])[1];
    const topicCount = document.querySelector("#count" + forumId);
    if (nbTopics2delete > 0) {
        topicCount.querySelector(".nb2del").innerHTML = nbTopics2delete + "/";
        topicCount.classList.replace("bg-secondary", "bg-danger");
    }
    else {
        topicCount.querySelector(".nb2del").innerHTML = "";
        topicCount.classList.replace("bg-danger", "bg-secondary");
    }
}

// TODO: initialize del ico display at load depending on the state (foreach loop forumListm topicList)
// ...la

// Event listener
if (forumList)
    forumList.addEventListener('change', toggleDelIco);
if (topicList)
    topicList.addEventListener('change', setTopicListState);


