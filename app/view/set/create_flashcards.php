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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/public/js/script.js" defer></script>
<!--    <script src="jquery-3.6.0.min.js"></script>-->
  <title>Create set</title>
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



<form method="post" action="/set/create_flashcards" class="content">
<!--CONTENT-->
<div class="container">
  <div class="create-space">
    <div class="enter-name">
        <label class="title">Flashcards name</label>
        <div class="input-name-space">
          <input name="name" type="text" class="enter" required>
        </div>
    </div>

    <div class="new-term-space">
      <div class="number-delete">
        <span class="title">1</span>
        <button type="button" class="delete"><img src="/public/img/delete.svg"></button>
      </div>

      <div class="term-definition">
        <div>
          <label class="title">Term</label>
          <div class="input_space">
            <input name="term-1" type="text" class="enter" required>
          </div>
        </div>
        <div>
          <label class="title">Definition</label>
          <div class="input_space">
            <input name="definition-1" type="text" class="enter" required>
          </div>
        </div>
      </div>
    </div>

    <div class="add-space">
      <button type="button">
        <img src="/public/img/add.svg">
        <span>Add flashcard</span>
      </button>
    </div>

  </div>

    <div style="display: flex; align-content: center; justify-content: center">

    <button type="submit" class="confirm">
              <span class="button_text">
                  Save
              </span>
    </button>
    </div>

</div>

</form>
<!--FOOTER-->
<?php include "app/view/blocks/footer.php" ?>

</body>
</html>