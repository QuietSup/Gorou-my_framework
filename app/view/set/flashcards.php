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
    <script src="/public/js/script.js" type="text/javascript" defer></script>
    <script src="/public/js/flashcards.js" type="text/javascript" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!--    <script src="/public/js/script.js" type="text/javascript" defer></script>-->
    <title>Study</title>
</head>

<style>
    @media (max-width: 576px) {
        .container{
            width: 90%;
        }
    }
</style>

<script>
    var flashcards = <?= json_encode($flashcards) ?>;
    var i = "0"
    // console.log(flashcards);
</script>

<body>

<!--NAVIGATION-->
<?php include "app/view/blocks/navbar.php" ?>


<div class="content">
<!--CONTENT-->
<div class="container">

    <div class="flashcard-content">
        <div class="tip-flashcard-all">
            <div class="tip"><span>Click card to see term 👇</span></div>
            <div class="flashcard">
                <span class="definition"></span>
                <span class="term"></span>
            </div>
            <div class="all-buttons">
                <button class="previous">
                    <img src="/public/img/prev-next.svg">
                </button>
                <a href="/set/all_terms/<?= $slug ?>"><button class="button">
                    <span class="text">
                        All terms
                    </span>
                    <img src="/public/img/all.svg">
                </button></a>
                <button class="next">
                    <img src="/public/img/prev-next.svg">
                </button>
            </div>
        </div>

            <div class="info">
                <div class="cards-title">
                    <img src="/public/img/flashcards.svg">
                    <span><?= $set_name ?></span>
                </div>

                <div class="progress">
                    <span class="pr">3/14</span>
                    <div class="bar">
<!--                        <hr class="bottom">-->
                        <span class="top"></span>
                    </div>
                </div>

                <div class="author">
                    <div class="text">
                        <span>made by</span>
                        <h1><?= $author['username'] ?></h1>
                    </div>
                    <img src="<?= $author['avatar'] == ('' or null) ? '/uploads/defaultAvatar.png' : '/uploads/'.$author['avatar'] ?>">
                </div>

        </div>
    </div>
</div>


</div>
<!--FOOTER-->
<?php include "app/view/blocks/footer.php" ?>


</body>
</html>