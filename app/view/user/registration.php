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


<form action="/user/registration" method="post" class="register-space">
  <div class="register-form">
    <div class="photo-nick">
      <button>
        <img src="../../../public/img/add_photo.svg">
      </button>
      <div class="input-register">
        <label class="title">Nickname</label>
        <div class="input_space">
          <input name="username" type="text" class="enter" required
              value=<?=isset($_SESSION['form_data']['username']) ? htmlspecialchars(
                  $_SESSION['form_data']['username'], ENT_QUOTES
              ) : '' ?>
          >
        </div>
      </div>
    </div>

    <div class="email-password">
      <div class="input-register">
        <label class="title">Email</label>
        <div class="input_space">
          <input name="email" type="text" class="enter" required
                 value=<?=isset($_SESSION['form_data']['email']) ? htmlspecialchars(
                  $_SESSION['form_data']['email'], ENT_QUOTES
              ) : '' ?>
          >
        </div>
      </div>
      <div class="input-register">
        <label class="title">Password</label>
        <div class="input_space">
          <input name="password" class="enter" type="password" autocomplete="new-password" id="new-password" required>
        </div>
      </div>
    </div>
  </div>
  <div class="image-button">
    <img src="/public/img/register.png">
    <div class="center-button">
      <div class="register-or-login">
        <a href="#">
<!--        <a href="../find.php">-->
        <button type="submit" class="confirm">
              <span class="button_text">
                  Sign up
              </span>
        </button>
        </a>
        <span>or&nbsp;<a href="/user/login">Log in</a>&nbsp;if you have account</span>
      </div>
    </div>
  </div>
  </form>

    <?php
    if (isset($_SESSION['form_data'])) unset($_SESSION['form_data'])
    ?>

</div>

</div>

<!--FOOTER-->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="foot">
        <div class="info">
          <span class="logo">Gorou</span>
          <div class="terms">
            <span>c 2021 Gorou, Inc</span>
            <span>Terms & Privacy</span>
          </div>
        </div>
        <div class="contacts">
          <a href="#"><span>Twitter</span></a>
          <a href="#"><span>Instagram</span></a>
        </div>
      </div>
    </div>
  </div>
</footer>