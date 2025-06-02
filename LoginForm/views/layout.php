<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title ?? 'Login Form'?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" 
    crossorigin="anonymous">
</head>
<body>
    <header>
        <?php require_once __DIR__ . '/navbar.php'; ?>
    </header>

    <main class="container mt-5">
        <?php include_once $contentFile; ?>
    </main>
</body>
</html>
