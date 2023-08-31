# phpforum

## Project Overview

This project is a discussion forum inspired by platforms like Stack Overflow. Users can create topics, participate in discussions, and exchange messages related to specific topics. The forum allows for user registration, authentication, and topic management. It is built using PHP and follows an MVC architecture, with Bootstrap and Bootswatch for styles and responsive design.

**Key Features:**

- User registration and authentication
- Topic creation and management
- Messaging system for discussions
- Responsive design for mobile and desktop users

**Technologies Used:**

- PHP
- MVC architecture
- Bootstrap
- Bootswatch

**User Benefits:**
The forum provides a platform for users to engage in meaningful discussions, seek help, and share knowledge within specific topic areas. It encourages collaboration and learning among its community members.

**Demo:**
Check out the live demo [here](https://your-demo-link.com).

## Installation

<!-- Include step-by-step instructions for setting up the project on a local machine. Specify prerequisites, dependencies, and any configuration needed. -->

**Guide for local install**

1. Install XAMPP
2. clone the project within **htdocs/**
3. create the database from `dbmodel.sql`. Set it up with your own credentatials.
4. Launch by running the following steps:
   - Ensure you have xampp running. You can start the process with `/opt/lampp/lampp start`
   - go to http://localhost and go to the **htdocs/** folder, the projects folder. In the project folder, access the **public/** folder. This is the folder where the `index.php` is. The website should load automatically after accessing the **public/** folder.

## Usage

<!--
- Describe how to use the project, including how to navigate the interface, create topics, and send messages.
- Explain user registration and authentication.
- Mention any special features like user profiles, topic deletion, etc.
-->

### Website launching

- if you cloned the project on your local machine, ensure you followed the install steps
- launch xampp and access in your browser the following url: https://localhost/your_project_folder_name/public/
- you can also access the website on live demo throught the following link: [link to demo](https://example.com)

### Navigation

- when you arrive on the homepage, you can view every topics created in the default forum
- the navbar contains a link to the home page and the website logo. Login/logout - sign up button are included in the navbar on the right hand side. When the user is logged, a profile link is shown besides the home page link.
- you can also view links to every created forums between the navbar and the list of topics. Not all links are viewable at first sight. You may have to click on a drop down to display every links

### Topics creation and messages

- To create a topic, you need to be connected. You will see just above the list of created topics a "create" button. Clicking on that button will lead you to topic creation page
- To send a messsage related to a topic, you also need to be connected. Just access a topic, write a message in the text area and send it by clicking on the button.

### Forum creation

- Anybody can create its own forum, as long as it is registered. The website can host up to 20 supplementary forums, for 24h starting the creation time.
- To create a forum, you need to be connected. A button 'Create a forum' will be on display within the "others forum" area.
- Once you click on the button, you will be redirected to a creation page, where you can choose the forum name.
- During the creation, you can asked to make this new forum the default forum when you login

### User registration and authentication

- Registration is done by clicking on the button 'signup', leading to a form. To register, the user needs to provide an email and a password. The use can also provide a profile picture.
- authentication is done by clicking on the button 'login'. Email and password are asked.

### User profil

- When the user is logged, a profile link is besided the home page link. When clicking it, it accesses to the the profile management. The use can view
  - Its profile picture
  - Its name, surename and pseudo
  - A list of created topics
  - A list of created forums. A tag _default_ is along the default forum
- At the bottom, there is a 'change' button to proceed to some changes. When clicking on the button, a special for changes is loaded. Here are the possible changes:
  - delete a created topics (delete button along the name)
  - change default forum (radio button on the names with default in green. When a button is cheked, it is blue with a check symbol inside)
  - delete a forum (delete button along the name)

### Topics, messages and forum deletion

- Topics: a button bellow the topic enable the creator of it to delete it. Topics can also be deleted via the list of topics created on the user profile. Confirmation before deletion.
- Messages: a button bellow the message enable its author to delete it. No confirmation before deletion.
- Forums: a small trash button along the forum name in the list of created forum enables the creator to delete its forum. Confirmation before deletion.

## Screenshots

<!--
- Embed screenshots or GIFs to visually showcase different parts of your application.
- TODO:
   - Select main screenshots to show case
   - create a gallery to let the viewer see more
-->

### Desktop

_main_

- Home (disconnected)
- Home (connected)
- Topic discussion (disconnected)
- Topic discussion (connected)
- Connection
- Registration
- User settings
- GIF Topic creation
- GIF Topic deletion
- GIF Reveal other forums
- GIF Forum creation
- GIF change default forum

_optional_

### Mobile

_main_

- Home (disconnected)
- Home (connected)
- Topic discussion (disconnected)
- Topic discussion (connected)
- Connection
- Registration
- User settings
- GIF Topic creation
- GIF Topic deletion
- GIF Reveal other forums
- GIF Forum creation
- GIF change default forum

_optional_

## Security Measures

<!-- Briefly mention any security practices you've implemented. -->

- Protection against:
  - SQL injection
  - CSS attacks
- Password hashing

## Technologies Used

<!-- List the technologies and frameworks used in your project. -->

- PHP
- Bootstrap
- Bootswatch themes
- SQL

## Code Organization

<!-- Briefly explain the organization of your codebase, where to find key files, and how to navigate the structure. -->

The code adopt an Model View Controller (MVC) architecture. The main folders are:

- **config/**: contains the configuration of the web app: database, routes, app name, etc.
- **public/**: contains `index.php`, the main files of the project. This is by this file that the webpage is generated in the browser. The folder also contains the error 404 page and a folder containing uploaded files
- **src/**: contains the controllers and the models (respectivelly in **src/controllers** and **src/models/**). Models are interfaces between the database and the app. Controllers are functions triggered by the web app which perform actions like page loading, database requests, etc.
- **views/**: contains the views of the web app. Views are the webpages of the websites. There are organized within subfolders by common themes / purposes. For example, _user_ related pages, _connection_ related pages, etc.
  - All webpages are structured like so : header - main - footer. The main can vary throughout pages, yet pages have (almost) the same header and footer. Therefore, to follow the DRY principle, the header and footer are coded in separate files within **views/\_partials/** and included with PHP following the structure stated above.

## Database architecture

## Deployment

<!--
- Provide instructions for deploying the project on a web host if applicable.
- If you have a live version, share the URL.
-->

**With a webhost**

- Send the files with filezilla for example
- Integration
  - Incorporate it to an existing domain:
  - Dedicated domain:

**Live version**

Live version of the website is available [here](https://example.com).

## Demo

<!-- If possible, include a link to a live demo of the project. -->

Here is live demo of the project: [live demo](https://example.com).

## Challenges and Solutions

<!--
Share any challenges you faced and how you overcame them during development.
-->

## Future Enhancements

<!-- Mention any planned improvements or features you'd like to add in the future. -->

- adding a pages interface for topics display and messages as well
- Refactor the project with symphony or laravel

## Feedback and Impact

<!--
Share any feedback you've received from users and how the project has made a positive impact.
-->
