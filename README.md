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
- the navbar contains a link to the home page and the website logo. login/logout - sign up button are included in the navbar on the right hand side
- you can also view links to every created forums between the navbar and the list of topics. Not all links are viewable at first sight. You may have to click on a drop down to display every links

### Topics creation and messages

- To create a topic, you need to be connected. You will see just above the list of created topics a "create" button. Clicking on that button will lead you to topic creation page
- To send a messsage related to a topic, you also need to be connected

## Screenshots

Embed screenshots or GIFs to visually showcase different parts of your application.

## Security Measures

Briefly mention any security practices you've implemented.

## Technologies Used

List the technologies and frameworks used in your project.

## Code Organization

Briefly explain the organization of your codebase, where to find key files, and how to navigate the structure.

## Deployment

- Provide instructions for deploying the project on a web host if applicable.
- If you have a live version, share the URL.

## Demo

If possible, include a link to a live demo of the project.

## Challenges and Solutions

Share any challenges you faced and how you overcame them during development.

## Future Enhancements

<!-- Mention any planned improvements or features you'd like to add in the future. -->

- adding a pages interface for topics display and messages as well
- Refactor the project with symphony or laravel

## Feedback and Impact

Share any feedback you've received from users and how the project has made a positive impact.

Regarding your idea for a live demonstration using a classical web host:
