<section class='py-16'>
    <div class='max-w-6xl h-full mx-auto grid grid-cols-2 gap-6 px-6'>
        <div class='h-full w-full'>
            <div class="w-full overflow-hidden rounded-xl">
                <img src="/img/events/<?= e($event['img']) ?>" alt="" class="w-full h-full object-cover">
            </div>
        </div>

        <div class='h-full w-full flex flex-col gap-2'>
            <h1 class="font-display text-5xl font-700 leading-tight text-black mb-5">
                <?= e($event['event_name']) ?>
            </h1>


            <div class='flex items-center gap-1.5 text-xs text-gray-400'>
                <svg width='11' height='11' viewBox='0 0 12 12' fill='none'><rect x='1' y='2' width='10' height='9' rx='1.2' stroke='currentColor' stroke-width='1.2'/><path d='M4 2V1M8 2V1M1 5h10' stroke='currentColor' stroke-width='1.2' stroke-linecap='round'/></svg>
                <?= e($event['event_date']) ?>
                <span class='text-gray-200'>·</span>
                <?= e($event['event_hour']) ?>
                <span class='text-gray-200'>·</span>
                <?= e($event['place_city']) ?>
                <span class='text-gray-200'>·</span>
                <?= e($event['place_name']) ?>
            </div>

            <p class='text-justify'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium sunt hic repellendus pariatur, nisi fugiat facere tenetur perspiciatis magni ipsum veritatis neque exercitationem nihil, adipisci accusantium et dicta, doloremque sed.</p>

            <div class='grid grid-cols-2 gap-4'>
                <div class='*:text-center border border-gray-100 rounded-xl py-2.5'>
                    <div class='text-lg font-medium text-black'><?= e($event['tickets_amount']) ?></div>
                    <div class='text-xs text-gray-400 leading-none mb-0.5'>Miejsc</div>
               </div>

                <div class='*:text-center border border-gray-100 rounded-xl py-2.5'>
                    <div class='text-xs text-gray-400 leading-none mb-0.5'>Od</div>
                    <div class='text-lg font-medium text-black'><?= e($event['tickets_price']) ?> zł</div>
               </div>
            </div>
            <form action="/events/buy" method='post'>
                <input type="hidden" name="id" value='<?= e($event['event_ID']) ?>'>
                <button class='bg-black text-white text-lg px-4 py-2 rounded-full font-medium hover:bg-gray-800 transition-colors cursor-pointer w-full' type='submit'>Kup bilet</button>
            </form>
        </div>
    </div>
</section>