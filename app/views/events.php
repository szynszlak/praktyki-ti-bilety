<!-- UPCOMING EVENTS -->
<section class='pt-16 min-h-screen'>
    <div class='max-w-6xl mx-auto p-6'>
      <div class='mb-6'>
        <?php if (!empty($events)): ?>
            <h1 class='font-display text-3xl font-semibold text-black'>
                Wszystkie <span class='font-light italic'>wydarzenia <?= e($categoryName) ?></span>
                
            </h1>
        <?php else: ?>
            <h1 class='font-display text-3xl font-semibold text-black'>
                Brak wydarzeń w tej kategorii<span class='font-light italic'></span>
            </h1>

            <div class='flex items-center justify-center min-h-[70vh]'>
                <span class='font-display font-600 text-6xl tracking-tight text-gray-200'>
                    bilet<span class='font-light'>one</span>
                </span>
            </div>
        <?php endif; ?>
      </div>     
        <!--<div class='bg-gray-950 rounded-2xl p-6 mb-6 flex items-center justify-between gap-6 overflow-hidden relative'>
            <div class='absolute inset-0 opacity-5' style='background:repeating-linear-gradient(-45deg,transparent,transparent 3px,white 3px,white 4px)'></div>
                <div class='relative z-10'>
                    <div class='flex items-center gap-2 mb-3'>
                    <span class='bg-white text-black text-xs font-medium px-2.5 py-1 rounded-full'>Wyróżnione</span>
                    <span class='text-gray-500 text-xs'>Koncert · 28 maja 2026</span>
                    </div>
                    <h2 class='font-display text-2xl font-semibold text-white mb-1'>Brodka — Trasa Akustyczna</h2>
                    <p class='text-gray-400 text-sm mb-4'>Filharmonia Poznańska · godz. 19:00 · 87 miejsc pozostało</p>
                    <div class='flex items-center gap-3'>
                    <button class='bg-white text-black text-sm px-5 py-2.5 rounded-full font-medium hover:bg-gray-100 transition-colors'>Kup bilet · od 89 zł</button>
                    <span class='text-gray-600 text-xs'>★ 9.4 / 10</span>
                    </div>
                </div>
                <div class='hidden md:flex shrink-0 flex-col items-end gap-2 relative z-10'>
                    <div class='text-gray-700 text-xs text-right uppercase tracking-widest mb-1'>Dostępność</div>
                    <div class='flex gap-1.5 flex-wrap justify-end max-w-45'>
                    <span class='bg-white/10 text-white text-xs px-2.5 py-1 rounded-full border border-white/10'>Pn 19:00</span>
                    <span class='bg-white text-black text-xs px-2.5 py-1 rounded-full font-medium'>Wt 19:00</span>
                    <span class='bg-white/10 text-white text-xs px-2.5 py-1 rounded-full border border-white/10'>Śr 19:00</span>
                    <span class='bg-white/10 text-white/40 text-xs px-2.5 py-1 rounded-full border border-white/5 line-through'>Czw — brak</span>
                </div>
            </div>
        </div>-->

    <div id='events-grid' class='grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4'>
    <?php foreach($events as $event): ?>

      <div class='border border-gray-100 rounded-2xl overflow-hidden group hover:-translate-y-1 hover:shadow-lg transition-all duration-200 bg-white'>
        <div class='bg-gray-900 aspect-video relative flex flex-col justify-between  bg-cover bg-center bg-no-repeat' style='background-image: url(/img/events/<?= e($event['img']) ?>)'>
          <div class='flex items-start justify-between p-4'>
            <?php if(!empty($event['tag'])): ?>
            <span class='bg-white text-black text-xs font-medium px-2.5 py-1 rounded-full'><?= e($event['tag']) ?></span>
            <?php endif;?>
          </div>
          <div>
            <div class='font-display text-white text-xl font-semibold leading-tight p-4' style='background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);'><?= e($event['event_name']) ?></div>
          </div>
        </div>
        <div class='p-4'>
          <div class='flex items-center gap-1.5 text-xs text-gray-400 mb-3'>
            <!-- <svg width='11' height='11' viewBox='0 0 12 12' fill='none'><circle cx='6' cy='5' r='2' stroke='currentColor' stroke-width='1.2'/><path d='M2 10c0-2.2 1.8-4 4-4s4 1.8 4 4' stroke='currentColor' stroke-width='1.2' stroke-linecap='round'/></svg>
            Reż. M. Kowalski -->
            <svg width='11' height='11' viewBox='0 0 12 12' fill='none'><rect x='1' y='2' width='10' height='9' rx='1.2' stroke='currentColor' stroke-width='1.2'/><path d='M4 2V1M8 2V1M1 5h10' stroke='currentColor' stroke-width='1.2' stroke-linecap='round'/></svg>
            <?= e($event['event_date']) ?>
            <span class='text-gray-200'>·</span>
            <?= e($event['place_city']) ?>
          </div>
          <div class='flex gap-1.5 mb-4'>
            <span class='bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded-full'><?= e($event['place_name']) ?></span>
            <span class='bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded-full'><?= e($event['event_hour']) ?></span>
            <span class='bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded-full'><?= e($event['tickets_amount']) ?> miejsc</span>
          </div>
          <div class='flex items-center justify-between'>
            <div>
              <div class='text-xs text-gray-400'>od</div>
              <div class='font-display text-xl font-semibold text-black'><?= e($event['tickets_price']) ?> zł</div>
            </div>
            <a href="/events/buy/<?= e($event['event_ID']) ?>"><button class='bg-black text-white text-xs px-4 py-2 rounded-full font-medium hover:bg-gray-800 transition-colors cursor-pointer'>Kup bilet</button></a>
          </div>
        </div>
      </div>
    
    <?php endforeach; ?> 
    </div>

  </div>
</section>
