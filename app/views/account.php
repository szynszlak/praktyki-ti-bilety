<main class='min-h-screen pt-16'>
  <div class='max-w-6xl mx-auto p-6'>
    <!-- PROFILE HEADER -->
  <div class="mb-5 flex items-center gap-5 flex-wrap">
    <div class="w-14 h-14 rounded-2xl bg-black flex items-center justify-center text-white text-xl font-medium shrink-0"><?= e($user['user_name'][0] . $user['user_lastname'][0]) ?></div>
    <div class="flex-1 min-w-0">
      <h1 class="font-display text-2xl font-semibold text-black leading-tight"><?= e($user['user_name'] .' '. $user['user_lastname']) ?></h1>
      <div class="flex items-center gap-3 mt-1 flex-wrap">
        <span class="text-sm text-gray-400"><?= e($user['user_email']) ?></span>
      </div>
    </div>
    <div class="flex items-center gap-6 shrink-0">
      <!-- <div class="text-center">
        <div class="font-display text-2xl font-semibold text-black"></div>
        <div class="text-xs text-gray-400 mt-0.5">Biletów</div>
      </div> -->
      <div>
        <a href="/logout"><button class="bg-black text-white text-xs px-4 py-2.5 rounded-xl font-medium hover:bg-gray-800 transition-colors flex items-center justify-center gap-2 w-full cursor-pointer">
            Wyloguj się
        </button></a>
      </div>
    </div>
  </div>
      <div class='grid grid-cols-2 gap-1 bg-gray-100 rounded-xl p-1 mb-8'>
        <button class='toggle-tab active' id='tab-login'>Aktywne bilety</button>
        <a href="/account/inactivetickets"><button class='toggle-tab flex items-center justify-center' id='tab-register'>Archiwalne bilety</button></a>
      </div>
    <?php if (empty($tickets)): ?>

            <div class='flex items-center justify-center min-h-[70vh]'>
              <div class='flex flex-col items-center gap-4'>
                <p class='text-lg'>Nie posiadasz aktywnych biletów</p>
                <span class='font-display font-600 text-6xl tracking-tight text-gray-200'>
                    bilet<span class='font-light'>one</span>
                </span>
              </div>
            </div>
        <?php endif; ?>



  <div class='grid grid-cols-1 lg:grid-cols-2 gap-5'>
    <?php foreach ($tickets as $ticket): ?>
      <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-md transition-shadow">
      <div class="flex items-stretch">
        <!-- date strip -->
        <div class="bg-black text-white flex flex-col items-center justify-center px-3 sm:px-5 shrink-0 min-h-full py-5">
          <div class="font-display text-xl md:text-4xl font-semibold leading-tight"><?= e($ticket['event_date']) ?></div>
          <div class="text-xs text-gray-500 mt-0.5"><?= e($ticket['event_year']) ?></div>
        </div>
        <!-- content -->
        <div class="flex-1 p-2 sm:p-5 flex flex-row items-center gap-2 sm:gap-4">
          <div class="flex-1 min-w-0">
            <div class="font-display md:text-lg font-semibold text-black leading-snug mb-1"><?= e($ticket['event_name']) ?></div>
            <div class="flex items-center gap-1.5 text-xs text-gray-400"><?= e($ticket['place_name']) ?></div>
          </div>
          <div class="flex items-center gap-1 sm:gap-2 shrink-0 flex-wrap flex-col">
            <div class="text-center border border-gray-100 rounded-xl px-2 md:px-4 py-2.5 w-full">
              <div class="text-xs text-gray-400 leading-none mb-0.5">Godzina</div>
              <div class="text-md font-medium text-black"><?= e($ticket['event_hour']) ?></div>
            </div>
            <!-- <div class="text-center border border-gray-100 rounded-xl px-2 md:px-4 py-2.5 w-full">
              <div class="text-xs text-gray-400 leading-none mb-0.5">Miejsce</div>
              <div class="text-md font-medium text-black">Parket A4</div>
            </div> -->
            <a href='/account/ticket/<?= e($ticket['ticket_ID']) ?>'><button class="bg-black text-white text-xs px-2 md:px-4 py-2.5 rounded-xl font-medium hover:bg-gray-800 transition-colors flex items-center justify-center gap-2 w-full cursor-pointer">
              <svg width="13" height="13" viewBox="0 0 14 14" fill="none"><rect x="2" y="1" width="10" height="12" rx="1.5" stroke="white" stroke-width="1.2"/><path d="M5 5h4M5 7.5h4M5 10h2" stroke="white" stroke-width="1.2" stroke-linecap="round"/></svg>
              Pokaż bilet
            </button></a>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

    <!-- <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden opacity-70 hover:opacity-100 transition-opacity">
      <div class="flex items-stretch">
        <div class="bg-gray-200 text-gray-500 flex flex-col items-center justify-center px-5 shrink-0 py-5">
          <div class="text-xs text-gray-400 uppercase tracking-widest leading-none">kwi</div>
          <div class="font-display text-4xl font-semibold leading-tight">12</div>
          <div class="text-xs text-gray-400 mt-0.5">sb</div>
        </div>
        <div class="flex-1 p-5 flex flex-col sm:flex-row sm:items-center gap-4">
          <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1.5">
              <span class="text-xs bg-gray-100 text-gray-400 px-2 py-0.5 rounded-full">🎬 Kino</span>
              <span class="text-xs text-gray-400">godz. 20:30</span>
              <span class="text-xs bg-gray-100 text-gray-400 px-2 py-0.5 rounded-full">Zakończone</span>
            </div>
            <div class="font-display text-lg font-semibold text-gray-600 leading-snug mb-1">Dune: Część Druga</div>
            <div class="text-xs text-gray-400">Kino Luna · Miejsca: D7, D8</div>
          </div>
          <div class="flex items-center gap-3 shrink-0 flex-wrap">
            <div class="text-center border border-gray-100 rounded-xl px-4 py-2.5">
              <div class="text-xs text-gray-400 leading-none mb-0.5">Zapłacono</div>
              <div class="text-sm font-medium text-gray-600">56 zł</div>
            </div>
            <button class="border border-gray-200 text-gray-500 text-xs px-4 py-2.5 rounded-xl font-medium hover:border-black hover:text-black transition-colors">Pobierz PDF</button>
          </div>
        </div>
      </div> -->
    </div>
    </div>
</main>