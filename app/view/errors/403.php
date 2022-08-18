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

<div class="error" style="<?= !isset($_SESSION['user']['id']) ? 'height: 80vh' : '' ?>">
    <span class="error-code">403</span>
    <span class="error-message">
        Access denied
    </span>
    <?php if (!isset($_SESSION['user']['id'])): ?>
    <span style="
    font-family: 'Open Sans';
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    display: flex;
    color: #000000; margin-top: 20px">
        Please,&nbsp;<a href="/user/registration" style="text-decoration-line: underline;
    color: #78D3B2">sign up</a>&nbsp;
        to continue</span>
    <?php endif; ?>
</div>

<?php
include "app/view/blocks/footer.php"
?>
</body>