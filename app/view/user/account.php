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
    <script src="/public/js/account.js" defer></script>
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



<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
    </div>

    <div class="container">
        <div class='alert alert__error spacer' role='alert'>
            <i class="fas fa-minus-circle alert__icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-face-id-error" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                    <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                    <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                    <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M9 10h.01"></path>
                    <path d="M15 10h.01"></path>
                    <path d="M9.5 15.05a3.5 3.5 0 0 1 5 0"></path>
                </svg>
            </i>
            <?= $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>

            <button type="button" class="alert__close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times-circle alert__close"></i></span>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<div class="content">


<!--CONTENT-->
    <form method="post" action="/user/account/<?= $slug ?>" class="container" enctype="multipart/form-data">
        <div class="show_acc">
            <div class="main">
                <input accept="image/*" name="avatar" type="file" id="imgupload" style="display:none"/>
                <img class="avatar" src="/uploads/<?= $user['avatar'] ?>" alt="avatar">
                <div class="nick_space">
                    <label class="title">Nickname
                    </label>
                        <div class="input_space">
                        <input name="username" type="text" class="enter" value="<?= $user['username'] ?>">
                        </div>

                </div>
            </div>

                <div class="details">
                    <span>📚 Sets created: <?= $created ?></span>
                    <span>🎓 Sets studying: <?= $studying ?></span>
                    <button formmethod="post" formaction="/user/logout"><span class="log-out">Log out</span></button>
                </div>
        </div>
        <div class="edit_data">
                <img src="/public/img/Frame.png" alt="">
            <div class="email_pass">
                <div class="input">
                    <label class="title">Email</label>
                    <div class="input_space">
                        <input name="email" type="text" class="enter" value="<?= $user['email'] ?>">
                    </div>
                </div>
                <div class="input">
                    <label class="title">Password</label>
                    <div class="input_space">
                        <div class="enter"  style="padding: 0">
                        <input name="password" id="change-password" type="password" class="enter" placeholder="new password">
                        <button type="button" id="password-switch">
                            <img class="icon"  style="margin: 0" src="/public/img/eye.svg">
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="center-button">
        <a href="account.php"><button class="confirm">
            <span class="button_text">
                Save
            </span>
        </button></a>
        </div>
    </form>


</div>
<!--FOOTER-->
<?php include "app/view/blocks/footer.php" ?>

</body>
</html>