<div class='pt-16 h-screen bg-white'>
        <div class='h-full max-w-sm mx-auto p-8'>
            <div class='w-full h-full rounded-2xl ticket-bg p-3'>
                <div class='bg-white w-full h-full p-4 flex flex-col gap-4 justify-between rounded-sm' >
                    <div class='flex justify-between items-center'>
                        <div class='flex items-center gap-2'>
                            <div class='w-6 h-6 bg-black rounded-sm flex items-center justify-center'>
                                <svg width='14' height='14' viewBox='0 0 14 14' fill='none'>
                                <rect x='1' y='3' width='12' height='8' rx='1.5' stroke='white' stroke-width='1.2'/>
                                <path d='M4 3V2M10 3V2M1 6h12' stroke='white' stroke-width='1.2' stroke-linecap='round'/>
                                </svg>
                            </div>
                            <span class='font-display font-600 text-xl tracking-tight'>bilet<span class='font-light'>one</span></span>
                        </div>

                        <div>
                            <span class='text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full'>Koncert</span>
                        </div>
                    </div>

                    <div>
                        <h1 class='font-bold text-2xl uppercase w full'><?= e($ticket['event_name']) ?></h1>
                        <h2 class='text-gray-400 text-sm'><?= e($ticket['event_date'].'.'.$ticket['event_year']) ?></h2>
                        <h2 class='text-gray-400 text-sm'><?= e($ticket['place_name'].', '.$ticket['place_city']) ?></h2>
                        <p class='text-lg font-semibold'><?= e($ticket['user_name'].' '.$ticket['user_lastname']) ?></p>
                    </div>

                    <div class='grid grid-cols-2 gap-2'>
                            <div class='*:text-center border border-gray-100 rounded-xl px-4 py-2.5'>
                                <div class='text-xs text-gray-400 leading-none mb-0.5'>Godzina</div>
                                <div class='text-md font-medium text-black'><?= e($ticket['event_hour']) ?></div>
                            </div>
<!-- 
                            <div class='*:text-center border border-gray-100 rounded-xl px-4 py-2.5'>
                                <div class='text-xs text-gray-400 leading-none mb-0.5'>Miejsce</div>
                                <div class='text-md font-medium text-black'>Parket A4</div>
                            </div> -->
                    </div>


                    <div class='w-full aspect-square'><img src="<?= $qr ?>" alt="QR" class='w-full h-full'></div>
                </div>
            </div>
        </div>
</div>