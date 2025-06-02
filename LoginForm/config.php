<?php 
session_start();
require_once __DIR__ . '/services/CSRF.php';

$error = '';
$loggedIn = false;
$sanitizedInputs = [];
$title = 'Login Form';
$baseURI = '/loginform/';
$contentFile = __DIR__ . '/views/formContent.php';

// If csrf token is empty it generates a new one
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = CSRF::generateToken();
   }
