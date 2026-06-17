<!DOCTYPE html>
<html lang='pl'>
<head>
  <meta charset='UTF-8'/>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel='stylesheet' href='/css/style.css'>
  <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500&display=swap' rel='stylesheet'/>
  <title><?= e($title ?? 'biletone') ?></title>
  </head>
  <body class='bg-white text-gray-900'>
<nav class='fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-100'>
  <div class='max-w-6xl mx-auto px-6 h-16 flex items-center justify-between'>
    <div class='flex items-center gap-2'>
      <div class='w-6 h-6 bg-black rounded-sm flex items-center justify-center'>
        <svg width='14' height='14' viewBox='0 0 14 14' fill='none'>
          <rect x='1' y='3' width='12' height='8' rx='1.5' stroke='white' stroke-width='1.2'/>
          <path d='M4 3V2M10 3V2M1 6h12' stroke='white' stroke-width='1.2' stroke-linecap='round'/>
        </svg>
      </div>
      <a href='/'><span class='font-display font-600 text-xl tracking-tight'>bilet<span class='font-light'>one</span></span></a>
    </div>
    <div class='hidden md:flex items-center gap-8 text-sm text-gray-500'>
      <a href='/events/1' class='nav-link'>Filmy</a>
      <a href='/events/2' class='nav-link'>Teatr</a>
      <a href='/events/3' class='nav-link'>Muzyka</a>
      <a href='/events/4' class='nav-link'>Sport</a>
    </div>

        <?php if (!empty($_SESSION['logged'])): ?>
            <?php 
                $db = get_db();
                $user = get_user_info($db, $_SESSION['user_ID']);
                $account_link = ($user && $user['user_role'] === 'admin') ? '/admin' : '/account';
                $text = ($user && $user['user_role'] === 'admin') ? 'Admin' : 'Konto';
            ?>
            <a href=<?= $account_link ?> class='btn-main bg-black text-white text-sm px-4 py-2 rounded-full font-medium'><?= $text ?></a>
        <?php else: ?>
            <a href='/login' class='btn-main bg-black text-white text-sm px-4 py-2 rounded-full font-medium'>Zaloguj</a>
        <?php endif; ?>

  </div>
</nav>