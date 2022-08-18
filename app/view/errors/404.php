<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="/public/css/bootstrap-grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Comfortaa:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <script src="/public/js/script.js" defer></script>
    <title>404</title>
</head>

<style>
    @media (max-width: 576px) {
        .container{
            width: 90%;
        }
    }
</style>
<body>

<?php
if (isset($_SESSION['user']['id']))
include "app/view/blocks/navbar.php"
?>

<div class="error">
    <span class="error-code">404</span>
    <span class="error-message">
        Looks like nothing was found
    </span>
</div>

<?php
include "app/view/blocks/footer.php"
?>
</body>