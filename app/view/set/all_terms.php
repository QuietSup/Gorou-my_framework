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
  <title><?= $title ?></title>
</head>

<style>
  @media (max-width: 576px) {
    .container{
      width: 90%;
    }
  }
</style>

<body>

<!--NAVIGATION-->
<?php include "app/view/blocks/navbar.php" ?>


<div class="content">
<!--CONTENT-->
<div class="container">
  <div class="flashcards-name-button">
    <div class="name-space">
      <span><?= $set_name ?></span>
    </div>
    <a href="/set/flashcards/<?= $slug ?>"><button class="button">
        <span class="common">Study</span>
      <img src="/public/img/study.svg">
    </button></a>
  </div>

  <div class="all-terms">
    <?php foreach ($flashcards as $card): ?>
    <div>
      <div class="term">
        <?= $card['term'] ?>
      </div>
      <div class="definition">
          <?= $card['definition'] ?>
      </div>
    </div>
      <?php endforeach; ?>


  </div>

</div>

</div>
<!--FOOTER-->
<?php include "app/view/blocks/footer.php" ?>

</body>
</html>