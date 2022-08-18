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



<form id="edit" method="post" action="/set/edit/<?= $slug ?>" class="content">
    <!--CONTENT-->
    <div class="container">
        <div class="create-space">
            <div class="enter-name">
                <label class="title">Flashcards name</label>
                <div class="input-name-space">
                    <input name="name" type="text" class="enter" value="<?= $set['name'] ?>" required>
                </div>
            </div>

            <?php foreach ($flashcards as $row => $card): ?>
            <div class="new-term-space">
                <div class="number-delete">
                    <span class="title"><?= $row ?></span>
                    <button type="button" class="delete"><img src="/public/img/delete.svg"></button>
                </div>

                <div class="term-definition">
                    <div>
                        <label class="title">Term</label>
                        <div class="input_space">
                            <input name="term-<?= $row ?>" type="text" class="enter" value="<?= $card['term'] ?>" required>
                        </div>
                    </div>
                    <div>
                        <label class="title">Definition</label>
                        <div class="input_space">
                            <input name="definition-<?= $row ?>" type="text" class="enter" value="<?= $card['definition'] ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <div class="add-space">
                <button type="button">
                    <img src="/public/img/add.svg">
                    <span>Add flashcard</span>
                </button>
            </div>

        </div>

        <div style="display: flex; align-content: center; justify-content: center">
        <button id="submit-edit" type="button" class="confirm">
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