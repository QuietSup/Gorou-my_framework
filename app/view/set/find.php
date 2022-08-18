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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/public/js/script.js" defer></script>
  <title>Search</title>
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

  <form action="/set/find" method="get" class="search-space">
    <div class="input-space">
      <input name="search" class="enter">
      <button class="search-button" type="submit">
        <img class="icon" src="/public/img/search.svg">
      </button>
    </div>
  </form>

  <div class="row">
      <?php if (empty($allSets)) echo 'nothing' ?>

      <?php foreach ($allSets as $key => $card): ?>
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <span><?= $card['name'] ?></span>

        <div class="terms-author">
          <span><?= $card['terms_num'] ?> <?= ($card['terms_num'] > 1 ) ? 'terms' : 'term' ?> | <?= $card['username'] ?> </span>
          <img src="<?= $card['avatar'] == ('' or null) ? '/uploads/defaultAvatar.png' : '/uploads/'.$card['avatar'] ?>" alt="author"/>
        </div>

        <div class="buttons search-card">
          <a href="/set/all_terms/<?= $card['slug'] ?>"><button class="button">
                    <span class="text">
                        All terms
                    </span>
          </button></a>
          <button class="button button-svg save-B" style="background: <?= $card['color'] ?>" value="<?= $card['id'] ?>">
            <img src="/public/img/bookmark.svg">
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