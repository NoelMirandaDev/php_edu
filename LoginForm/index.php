<?php // Controller File
declare (strict_types=1);


require_once __DIR__ . '/config.php';

// Handles POST request method logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (CSRF::validToken($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $_SESSION['csrf_token'] = CSRF::generateToken();
        $loggedIn = true; // WIP functionality
        $sanitizedInputs = array_map(function($value) {
            return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
            }, $_POST);
        $title = 'Logged In';
        $contentFile = __DIR__ . '/views/loggedIn.php';

    } else {
        $error = 'Was unable to successfully log in. Please try again.';

    }
}

// Loads layout with contentFile variable
include __DIR__ . '/views/layout.php';
?>
