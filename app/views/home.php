<section class="h-screen flex items-center">
  <div class="max-w-6xl mx-auto px-6 pt-16 pb-14">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
      <div>
        <div class="inline-flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-full px-4 py-1.5 text-xs text-gray-500 mb-6">
          <span class="w-1.5 h-1.5 rounded-full bg-black badge-new inline-block"></span>
          Ponad 300 wydarzeń w tym tygodniu
        </div>
        <h1 class="font-display text-5xl md:text-6xl font-700 leading-tight text-black mb-5">
          Twoje bilety,<br/><span class="font-400 italic">jeden klik.</span>
        </h1>
        <p class="text-gray-400 text-base leading-relaxed mb-8 max-w-md">
          Kino, teatr, koncerty i sport - wszystkie bilety w jednym miejscu. Bez kolejek, bez kompromisów.
        </p>

        <div class="flex items-center gap-6 mt-8">
          <div>
            <div class="text-2xl font-display font-600">1.2M</div>
            <div class="text-xs text-gray-400 mt-0.5">Sprzedanych biletów</div>
          </div>
          <div class="w-px h-8 bg-gray-100"></div>
          <div>
            <div class="text-2xl font-display font-600">4.9★</div>
            <div class="text-xs text-gray-400 mt-0.5">Średnia ocen</div>
          </div>
          <div class="w-px h-8 bg-gray-100"></div>
          <div>
            <div class="text-2xl font-display font-600">48h</div>
            <div class="text-xs text-gray-400 mt-0.5">Wsparcie przez dobę</div>
          </div>
        </div>
      </div>
      
      <div class="w-full h-full overflow-hidden rounded-xl">
        <img src="img/hero.jpg" alt="" class="w-full h-full object-cover">
      </div>
    </div>
  </div>
</section>

<section class='border-t border-b border-gray-100 bg-gray-50 py-10'>
  <div class='max-w-6xl mx-auto px-6'>
    <div class='grid grid-cols-1 md:grid-cols-3 gap-8'>
      <div class='flex items-start gap-4'>
        <div class='w-10 h-10 bg-black rounded-xl flex items-center justify-center shrink-0'>
          <svg width='18' height='18' viewBox='0 0 18 18' fill='none'><rect x='2' y='4' width='14' height='10' rx='2' stroke='white' stroke-width='1.3'/><path d='M5 4V3M13 4V3M2 8h14' stroke='white' stroke-width='1.3' stroke-linecap='round'/></svg>
        </div>
        <div>
          <div class='font-medium text-sm text-black mb-1'>Wybierz miejsce</div>
          <div class='text-sm text-gray-400 leading-relaxed'>Interaktywna mapa sali — wybierz dokładnie gdzie chcesz siedzieć.</div>
        </div>
      </div>
      <div class='flex items-start gap-4'>
        <div class='w-10 h-10 bg-black rounded-xl flex items-center justify-center shrink-0'>
          <svg width='18' height='18' viewBox='0 0 18 18' fill='none'><rect x='3' y='5' width='12' height='8' rx='1.5' stroke='white' stroke-width='1.3'/><path d='M6 5V4a3 3 0 016 0v1' stroke='white' stroke-width='1.3'/><circle cx='9' cy='9' r='1' fill='white'/></svg>
        </div>
        <div>
          <div class='font-medium text-sm text-black mb-1'>Bezpieczna płatność</div>
          <div class='text-sm text-gray-400 leading-relaxed'>BLIK, karta, przelew. Twoje dane są zawsze chronione.</div>
        </div>
      </div>
      <div class='flex items-start gap-4'>
        <div class='w-10 h-10 bg-black rounded-xl flex items-center justify-center shrink-0'>
          <svg width='18' height='18' viewBox='0 0 18 18' fill='none'><path d='M9 2v4M9 12v4M4 9H2M16 9h-4' stroke='white' stroke-width='1.3' stroke-linecap='round'/><circle cx='9' cy='9' r='3' stroke='white' stroke-width='1.3'/></svg>
        </div>
        <div>
          <div class='font-medium text-sm text-black mb-1'>Bilet na telefon</div>
          <div class='text-sm text-gray-400 leading-relaxed'>Natychmiastowa dostawa e-biletu. Skanuj QR prosto z ekranu.</div>
        </div>
      </div>
    </div>
  </div></section>

<section class='py-14'>
  <div class='max-w-6xl mx-auto px-6'>
    <div class='flex items-end justify-between mb-8'>
      <div>
        <div class='text-xs text-gray-400 uppercase tracking-widest mb-1'>Nadchodzące</div>
        <h2 class='font-display text-2xl font-600'>Nie przegap</h2>
      </div>
      <a href='./events' class='text-sm text-gray-400 hover:text-black transition-colors flex items-center gap-1'>
        Wszystkie wydarzenia
        <svg width='14' height='14' viewBox='0 0 14 14' fill='none'><path d='M3 7h8M8 4l3 3-3 3' stroke='currentColor' stroke-width='1.3' stroke-linecap='round' stroke-linejoin='round'/></svg>
      </a>
    </div>
    <div class='flex flex-col gap-3'>
     

    <?php foreach ($events as $event): ?>
      <div class='card-hover flex items-center gap-5 border border-gray-100 rounded-xl p-4 bg-white'>
        <div class='shrink-0 text-center w-12'>
          <div class='font-display text-2xl font-600 leading-none'><?= e($event['event_date']) ?></div>
          <div class='text-xs text-gray-400 uppercase'><?= e($event['event_year']) ?></div>
        </div>
        <div class='w-px h-10 bg-gray-100 shrink-0'></div>
        <div class='flex-1 min-w-0'>
          <div class='font-medium text-sm text-black truncate'><?= e($event['event_name']) ?></div>
          <div class='text-xs text-gray-400 mt-0.5'><?= e($event['place_city']) ?> · <?= e($event['place_name']) ?> · <?= e($event['event_hour']) ?></div>
        </div>
        <div class='shrink-0 flex items-center gap-3'>
          <div class='text-right hidden sm:block'>
            <div class='text-sm font-medium'>od <?= e($event['tickets_price']) ?> zł</div>
            <div class='text-xs text-gray-400'><?= e($event['tickets_amount']) ?> miejsc</div>
          </div>
          <a href="buy.php?id=<?= e($event['event_ID']) ?>"><button class='ghost-btn border border-gray-200 text-xs px-3 py-1.5 rounded-full text-gray-600 cursor-pointer'>Kup</button></a>
        </div>
      </div>
    <?php endforeach; ?>

    </div>
  </div>
</section>