<?php 
declare (strict_types=1);
session_start();
require_once 'CSRF.php';

$error = '';
$success = false;
$sanitizedInputs = [];

// If csrf token is empty it generates a new one
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = CSRF::generateToken();
   }

// Handles POST request method logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (CSRF::validToken($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $_SESSION['csrf_token'] = CSRF::generateToken();
        $success = true;
        $sanitizedInputs = array_map('htmlspecialchars', $_POST);
    } else {
        $error = 'Was unable to successfully log in. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" 
    crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/loginform/">Login Form v3</a>
        </div>
    </nav>
    <?php if (false === $success): ?>
        <?php if ($error): ?>
            <p class="text-danger bg-danger-subtle w-25 text-center m-5"><?=$error?></p>
        <?php endif; ?>
        <form method="POST" action="/loginform/" class="d-flex justify-content-center mt-5 container">
            <div class="d-flex flex-column border p-4 rounded shadow-sm bg-light container" style="max-width: 600px;">
                <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>"/>

                <div class="p-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required />
                </div>

                <div class="p-2 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required />
                </div>
                <button type="submit" class="btn btn-primary w-25 m-auto">Login</button>
            </div>
        </form>
    <?php else: ?>
        <p class="m-5">Hello, <?=$sanitizedInputs['username'] ? $sanitizedInputs['username'] : 'stranger'?>!</p>
        <a href="/loginform/" class="d-flex flex-column text-center mt-3">Back to form</a>
    <?php endif; ?>
</body>
</html>