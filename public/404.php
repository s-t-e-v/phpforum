<?php

if(!session_status()) session_start();
$_SESSION['messages']['danger'][] = "La page demandée n'existe pas.";
AppController::index();