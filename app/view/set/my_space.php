<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../public/css/styles.css">
  <link rel="stylesheet" href="../../../public/css/bootstrap-grid.css">
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Comfortaa:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/public/js/script.js" defer></script>
  <title>My space</title>
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

  <span class="title">Flashcards</span>

  <div class="row">
<!--    Card 1 -->
      <?php foreach ($saved as $card): ?>
    <div class="col-lg-4 col-md-6 col-12">
<!--      <a href="flashcards.html">-->
      <div class="card">
        <span><?= $card['name'] ?></span>

        <div class="terms-author">
          <span><?= $card['terms_num'] ?> <?= ($card['terms_num'] > 1 ) ? 'terms' : 'term' ?> | <?= $card['username'] ?></span>
          <img src="<?= $card['avatar'] == ('' or null) ? '/uploads/defaultAvatar.png' : '/uploads/'.$card['avatar'] ?>" alt="author"/>
        </div>

        <div class="buttons">
          <button class="icon-link delete-mine" type="button" value="<?= $card['id'] ?>">
            <img src="/public/img/delete.svg" alt="delete">
          </button>
        </div>
      </div>
<!--      </a>-->
    </div>
      <?php endforeach; ?>




  </div>


  <span id="flashcard-section" class="title">My cards</span>

  <div class="row">

<!--    Card 1-->
      <?php foreach ($mycards as $key => $mycard): ?>
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <span><?= $mycard['name'] ?></span>

        <div class="terms-author">
          <span><?= $mycard['terms_num'] ?> <?= ($mycard['terms_num'] > 1 ) ? 'terms' : 'term' ?> | <?= $mycard['username'] ?> </span>
          <img src="<?= $mycard['avatar'] == ('' or null) ? '/uploads/defaultAvatar.png' : '/uploads/'.$mycard['avatar'] ?>" alt="author"/>
        </div>

        <div class="buttons">
          <a class="icon-link" href="/set/edit/<?= $mycard['slug'] ?>">
            <img src="/public/img/edit.svg" alt="edit">
          </a>
          <button class="icon-link remove" value="<?= $mycard['id'] ?>">
            <img src="/public/img/delete.svg" alt="delete">
          </button>
        </div>
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