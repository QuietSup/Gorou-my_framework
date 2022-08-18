<div class="container">
    <nav class="navbar">
        <a href="/" class="logo">
            <div class="name">Gorou</div>
        </a>
        <div class="menu">
            <a href="#" class="close"><img class="close" src="/public/img/Vector.svg"></a>
            <a href="/" class="menu_title">My space</a>
            <a href="/set/find" class="menu_title">Find set</a>
            <a href="/set/create_flashcards" class="menu_title">Create set</a>
            <div class="accounts">
                <a href="#" class="account"><span class="menu_title"><?= $_SESSION['user']['username'] ?></span><img class="avatar" src="/uploads/<?= $_SESSION['user']['avatar'] ?>" alt="account"></a>
                <a href="/user/account/<?= $_SESSION['user']['id'] ?>/<?= str_replace(' ', '-', $_SESSION['user']['username']) ?>" class="account-link"><span class="menu_title"><?= $_SESSION['user']['username'] ?></span><img class="avatar" src="/uploads/<?= $_SESSION['user']['avatar'] ?>" alt="account"></a>
            </div>
        </div>
    </nav>
</div>