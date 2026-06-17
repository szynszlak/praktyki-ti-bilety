
<div class='flex h-screen'>
  <div class='flex-1 flex flex-col justify-center items-center px-6 py-12 bg-white'>

    <div class='w-full max-w-sm'>

      <!-- toggle tabs -->
      <div class='grid grid-cols-2 gap-1 bg-gray-100 rounded-xl p-1 mb-8'>
        <a href="/login"><button class='toggle-tab' id='tab-login'>Zaloguj się</button></a>
        <button class='toggle-tab active' id='tab-register'>Utwórz konto</button>
      </div>

        <?php if (!empty($_SESSION['error'])): ?>
            <p class='text-sm text-red-500'><?= e($_SESSION['error'])?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif ?>

      <!-- REGISTER PANEL -->
      <div id='panel-register' style=''>
      <form method='post'>
        <div class='mb-7'>
          <h1 class='font-display text-3xl font-semibold text-black leading-snug mb-1'>Nowe konto.</h1>
            <p class='text-sm text-gray-400'>Zaloguj się, aby kontynuować.</p>
        </div>

        <div class='space-y-3 mb-7'>
          <div class='grid grid-cols-2 gap-3'>
            <input type='text' name='name' class='input-field' placeholder='Imię'/>
            <input type='text' name='lastname' class='input-field' placeholder='Nazwisko'/>
          </div>
          <input type='email' name='email' class='input-field' placeholder='Adres e-mail'/>
          <div class='relative'>
            <input type='password' id='pass-reg' class='input-field' name='password' placeholder='Hasło (min. 8 znaków)' style='padding-right: 44px;'/>
          </div>
        </div>

        <button class='btn-primary mb-5' name='register' type='submit'>Utwórz konto</button>
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