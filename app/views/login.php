
<div class='flex h-screen'>
  <div class='flex-1 flex flex-col justify-center items-center px-6 py-12 bg-white'>

    <div class='w-full max-w-sm'>

      <!-- toggle tabs -->
      <div class='grid grid-cols-2 gap-1 bg-gray-100 rounded-xl p-1 mb-8'>
        <button class='toggle-tab active' id='tab-login'>Zaloguj się</button>
        <a href="/register"><button class='toggle-tab flex items-center justify-center' id='tab-register'>Utwórz konto</button></a>
      </div>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class='text-sm text-red-500'><?= e($_SESSION['error'])?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif ?>

      <!-- LOGIN PANEL -->
      <div id='panel-login' class='fade-in'>
        <form method='post' action='/login'>
          <div class='mb-7'>
            <h1 class='font-display text-3xl font-semibold text-black leading-snug mb-1'>Witaj z powrotem.</h1>
            <p class='text-sm text-gray-400'>Zaloguj się, aby kontynuować.</p>
          </div>
          <!-- fields -->
          <div class='space-y-3 mb-7'>
            <input type='email' class='input-field' placeholder='Adres e-mail' name='email'/>
            <div class='relative'>
              <input type='password' id='pass-login' name='password' class='input-field' placeholder='Hasło' style='padding-right: 44px;'/>
            </div>
          </div>
          <button class='btn-primary mb-5' name='login' type='submit'>Zaloguj się</button>
        </form>
      </div>
    </div>

    <!-- footer note -->
    <div class='mt-12 text-xs text-gray-300 text-center'>
      © 2026 biletone
    </div>
  </div>
</div>

<!-- <script src='/js/login.js'></script> -->