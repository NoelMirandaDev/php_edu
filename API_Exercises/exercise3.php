<?php

if (!empty($_GET['name'])) {
// First, Sanitize user input (this is a simple process, it could be more intensive if one likes)
$sanitizedInput = htmlspecialchars(trim($_GET['name']));

// Assign decoded response (initially JSON format to associative array) from API call to variable
$response = json_decode(file_get_contents("https://api.agify.io/?name={$sanitizedInput}"), true);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API WEB Integration</title>
</head>
<body>
    <form>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name"/>
        <button type="submit">Guess age</button>
    </form>
    <?php if (isset($response)): ?>
        <p>Age guessed: <?=$response['age']?></p>
    <?php endif; ?>
</body>
</html>