<div class="content-center">
<!--CONTENT-->
<div class="container">


    <?php if(isset($_SESSION['error'])): ?>
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
        <div class="container">
            <div class='alert alert__success spacer' role='alert'>
                <i class="fas fa-minus-circle alert__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-face-id" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                        <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                        <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                        <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                        <line x1="9" y1="10" x2="9.01" y2="10"></line>
                        <line x1="15" y1="10" x2="15.01" y2="10"></line>
                        <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                    </svg>
                </i>
                <?= $_SESSION['success']; ?>
                <?php unset($_SESSION['success']); ?>

                <button type="button" class="alert__close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle alert__close"></i></span>
                </button>
            </div>
        </div>
    <?php endif; ?>


    <form action="/user/login" method="post" class="login-space">

      <div class="logo">Gorou</div>
      <div class="email-password">
        <div class="input-register">
          <label class="title">Email:</label>
          <div class="input_space">
            <input name="email" type="text" class="enter">
          </div>
        </div>
        <div class="input-register">
          <label class="title">Password:</label>
          <div class="input_space">
            <input name="password" class="enter" type="password" autocomplete="current-password" id="current-password">
          </div>
        </div>
      </div>
      <div class="register-or-login">
<!--        <a href="#">-->
          <button type="submit" class="confirm">
              <span class="button_text">
                  Log in
              </span>
          </button>
<!--        </a>-->
        <span>or&nbsp;<a href="/user/registration">Sign up</a>&nbsp;if you don't have account</span>
      </div>

    </form>


</div>
</div>

<!--FOOTER-->
<?php include "app/view/blocks/footer.php" ?>
