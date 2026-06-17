<!DOCTYPE html>
<html lang='pl'>
<head>
	<meta charset='UTF-8'/>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<link rel='stylesheet' href='/css/style.css'>
	<link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500&display=swap' rel='stylesheet'/>
	<title>biletone | Admin</title>
</head>
<style>
	.field { width:100%; background:#18181b; border:1px solid #3f3f46; border-radius:10px; padding:11px 14px; font-size:13px; color:#e4e4e7; outline:none; transition:border-color .15s, box-shadow .15s; font-family:'DM Sans',sans-serif; }
	.field::placeholder { color:#52525b; }
	.field:focus { border-color:#a1a1aa; box-shadow:0 0 0 3px rgba(161,161,170,.08); }
	.field:disabled { opacity:.4; cursor:not-allowed; }
	select.field { cursor:pointer; appearance:none; background-image:url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M2 4l4 4 4-4' stroke='%2371717a' stroke-width='1.3' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E"); background-repeat:no-repeat; background-position:right 14px center; padding-right:36px; }
	textarea.field { resize:vertical; min-height:90px; }
	.scrollbar-hide::-webkit-scrollbar { display:none; }
	.scrollbar-hide { scrollbar-width:none; }
	input[type=file] { display:none; }
	.step-done { background:#fff; border-color:#fff; color:#000; }
	.step-active { background:transparent; border-color:#fff; color:#fff; }
	.step-idle { background:transparent; border-color:#3f3f46; color:#52525b; }
	  .field {
    width: 100%; background: #18181b; border: 1px solid #3f3f46;
    border-radius: 10px; padding: 10px 14px; font-size: 13px; color: #e4e4e7;
    outline: none; transition: border-color .15s, box-shadow .15s;
    font-family: 'DM Sans', sans-serif;
  }
  .field::placeholder { color: #52525b; }
  .field:focus { border-color: #a1a1aa; box-shadow: 0 0 0 3px rgba(161,161,170,.08); }
  .field:disabled, .field[readonly] { opacity: .45; cursor: not-allowed; }
  select.field {
    cursor: pointer; appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M2 4l4 4 4-4' stroke='%2371717a' stroke-width='1.3' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 12px center; padding-right: 34px;
  }
  .scrollbar-hide::-webkit-scrollbar { display: none; }
  .scrollbar-hide { scrollbar-width: none; }
  input[type=file]::file-selector-button {
    background: #27272a; color: #a1a1aa; border: 1px solid #3f3f46;
    border-radius: 6px; padding: 4px 12px; font-size: 12px;
    cursor: pointer; font-family: 'DM Sans', sans-serif; margin-right: 10px;
    transition: background .15s;
  }
  input[type=file]::file-selector-button:hover { background: #3f3f46; }
  input[type=checkbox] { accent-color: white; width: 15px; height: 15px; cursor: pointer; }
</style>
<body class="bg-zinc-950 text-zinc-100">

<div class="flex h-dvh overflow-hidden">

	<!-- SIDEBAR -->
	<aside class="w-screen md:w-56 shrink-0 bg-zinc-900 border-r border-zinc-800 flex flex-col">

		<!-- Logo -->
		<div class="px-5 py-5 border-b border-zinc-800">
			<a href='/' class='flex items-center flex-row gap-2'><div class="w-6 h-6 bg-white rounded-sm flex items-center justify-center shrink-0">
				<svg width="13" height="13" viewBox="0 0 14 14" fill="none">
					<rect x="1" y="3" width="12" height="8" rx="1.5" stroke="black" stroke-width="1.3"/>
					<path d="M4 3V2M10 3V2M1 6h12" stroke="black" stroke-width="1.3" stroke-linecap="round"/>
				</svg>
			</div>
			<span class="font-display font-semibold text-lg text-white tracking-tight">bilet<span class="font-light">one</span></span></a>
		</div>

		<!-- Nav -->
		<nav class="flex-1 px-3 py-4 flex flex-col gap-0.5 overflow-y-auto scrollbar-hide">

			<div class="text-xs text-zinc-600 uppercase tracking-widest px-2 mb-2 mt-1">Główne</div>

			<a href='/admin/scanner'
				class="nav-btn w-full flex md:hidden items-center gap-3 px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 text-left transition-colors">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M1 6a2 2 0 000 4v2a1 1 0 001 1h12a1 1 0 001-1v-2a2 2 0 000-4V4a1 1 0 00-1-1H2a1 1 0 00-1 1v2z" stroke="currentColor" stroke-width="1.3"/><path d="M6 8h4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-dasharray="1.5 1.5"/></svg>
				Skaner
            </a>

            <a href="/admin"><button id="nav-add-event"
				class="nav-btn w-full hidden md:flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 text-left transition-colors">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.3"/><rect x="9" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.3"/><rect x="1" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.3"/><rect x="9" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.3"/></svg>
				Dashboard
			</button></a>

			<!-- <button onclick="setPage('events')" id="nav-events"
				class="nav-btn w-full hidden md:flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 text-left transition-colors">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="1" y="3" width="14" height="11" rx="1.5" stroke="currentColor" stroke-width="1.3"/><path d="M5 3V1M11 3V1M1 7h14" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
				Wydarzenia
			</button>

			<button onclick="setPage('users')" id="nav-users"
				class="nav-btn w-full hidden md:flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 text-left transition-colors">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5" r="3" stroke="currentColor" stroke-width="1.3"/><path d="M2 14c0-3.3 2.7-6 6-6s6 2.7 6 6" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
				Użytkownicy
			</button> -->

			<!-- <div class="text-xs text-zinc-600 uppercase tracking-widest px-2 mb-2 mt-4 hidden md:flex">Finanse</div> -->


            <button id="nav-dashboard"
				class="nav-btn w-full hidden md:flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-white bg-zinc-800 text-left">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="1" y="3" width="14" height="11" rx="1.5" stroke="currentColor" stroke-width="1.3"/><path d="M5 3V1M11 3V1M1 7h14" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
				Dodaj wydarzenie
			</button>

			<!-- <div class="text-xs text-zinc-600 uppercase tracking-widest px-2 mb-2 mt-4 hidden md:flex">System</div> -->

			<!-- <button class="nav-btn w-full hidden md:flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 text-left transition-colors">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M8 1v2M8 13v2M1 8h2M13 8h2M3.1 3.1l1.4 1.4M11.5 11.5l1.4 1.4M3.1 12.9l1.4-1.4M11.5 4.5l1.4-1.4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
				Ustawienia
			</button> -->
		</nav>

		<!-- User -->
		<div class="px-3 py-3 border-t border-zinc-800 flex flex-col gap-0.5">
			<div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-zinc-800 cursor-pointer transition-colors">
				<div class="w-7 h-7 rounded-full bg-zinc-700 flex items-center justify-center text-xs font-medium text-white shrink-0"><?= e($user['user_name'][0] . $user['user_lastname'][0]) ?></div>
				<div class="flex-1 min-w-0">
					<div class="text-xs font-medium text-white truncate"><?= e($user['user_name'] .' '. $user['user_lastname']) ?></div>
					<div class="text-xs text-zinc-500 truncate">Admin</div>
				</div>
				<svg width="13" height="13" viewBox="0 0 14 14" fill="none" class="text-zinc-600 shrink-0"><path d="M5 3l4 4-4 4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</div>

			<a href='/logout' class="nav-btn w-full flex items-center justify-center px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">
				Wyloguj
			</a>
		</div>


	</aside>

	<!-- MAIN -->
	<div class="flex-1 hidden md:flex flex-col overflow-hidden ">

		<!-- PAGE CONTENT -->
		<main class="flex-1 overflow-y-auto scrollbar-hide p-6 bg-zinc-950">



			<!-- ===== ADD EVENT PAGE ===== -->
	<div id="page-add-event">
				  <!-- Page header -->
      <div class="pb-4">
        <div class="text-xs text-zinc-600 uppercase tracking-widest mb-1">Wydarzenia</div>
        <h1 class="font-display text-2xl font-semibold text-white">Dodaj wydarzenie</h1>
      </div>

      <!-- Error box (PHP echo target) -->
    <div class="mb-5"> 


        <!-- DEMO: przykładowe error box -->
        <!-- <div class="bg-red-500/10 border border-red-500/20 rounded-xl px-5 py-4">
          <div class="flex items-center gap-2 mb-2">
            <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6.5" stroke="#f87171" stroke-width="1.3"/><path d="M8 5v3.5M8 10v.5" stroke="#f87171" stroke-width="1.4" stroke-linecap="round"/></svg>
            <span class="text-sm font-medium text-red-400">Nie udało się dodać wydarzenia</span>
          </div>
          <ul class="space-y-1 pl-1">
            <li class="text-xs text-red-400 flex items-start gap-1.5"><span class="shrink-0 mt-0.5">·</span>Pole 'Nazwa' jest wymagane i nie może być puste.</li>
            <li class="text-xs text-red-400 flex items-start gap-1.5"><span class="shrink-0 mt-0.5">·</span>Musisz przesłać poprawny plik graficzny (plakat/logo).</li>
          </ul>
        </div>
      </div> -->

        <!-- LEFT: presets + main form -->
        <div class="lg:col-span-2 space-y-4">

        <?php if (!empty($errors)): ?>
        <div class="bg-red-500/10 border border-red-500/30 rounded-xl px-5 py-4">
          <div class="flex items-center gap-2 mb-2">
            <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6.5" stroke="#f87171" stroke-width="1.3"/><path d="M8 5v3.5M8 10v.5" stroke="#f87171" stroke-width="1.4" stroke-linecap="round"/></svg>
            <span class="text-sm font-medium text-red-400">Nie udało się dodać wydarzenia</span>
          </div>
          <ul class="space-y-1 pl-1">
        <?php foreach ($errors as $error): ?>
            <li class="text-xs text-red-400 flex items-start gap-2">
                <span class="mt-0.5 shrink-0">·</span><?= e($error) ?>
            </li> 
        <?php endforeach; ?>
            </ul>
            </div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="bg-emerald-500/10 border border-emerald-500/30 rounded-xl px-5 py-4 flex items-center gap-3">
            <svg width="16" height="16" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="7" stroke="#34d399" stroke-width="1.4"/><path d="M5.5 9l2.5 2.5 4.5-5" stroke="#34d399" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="text-sm text-emerald-400 font-medium">Pomyślnie dodano wydarzenie do bazy!</span>
            </div>
        <?php endif; ?>


          <!-- Form -->
          <form method="post" enctype="multipart/form-data" class="space-y-4">
            <!-- Dane podstawowe -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5">
              <div class="text-xs text-zinc-500 uppercase tracking-widest mb-4">Dane podstawowe</div>
              <div class="space-y-3">

                <div>
                  <label for="nazwa" class="block text-xs text-zinc-400 mb-1.5">
                    Nazwa wydarzenia <span class="text-zinc-600">*</span>
                  </label>
                  <input type="text" name="nazwa" id="nazwa" required
                    placeholder="np. Koncert Dawida Podsiadło"
                    class="field"/>
                </div>

                <div class="grid grid-cols-2 gap-3">
                  <div>
                    <label for="data" class="block text-xs text-zinc-400 mb-1.5">
                      Data <span class="text-zinc-600">*</span>
                      <span class="text-zinc-700 ml-1">DD.MM.YYYY</span>
                    </label>
                    <input type="text" name="data" id="data" required
                      placeholder="np. 20.06.2026"
                      class="field"/>
                  </div>
                  <div>
                    <label for="godzina" class="block text-xs text-zinc-400 mb-1.5">
                      Godzina <span class="text-zinc-600">*</span>
                      <span class="text-zinc-700 ml-1">HH:MM</span>
                    </label>
                    <input type="text" name="godzina" id="godzina" required
                      placeholder="np. 19:00"
                      class="field"/>
                  </div>
                </div>

                <div>
                  <label for="kategoria" class="block text-xs text-zinc-400 mb-1.5">
                    Kategoria <span class="text-zinc-600">*</span>
                  </label>
                  <select name="kategoria" id="cat" required class="field">
                    <option value="1">Film</option>
                    <option value="2">Teatr</option>
                    <option value="3">Muzyka</option>
                    <option value="4">Sport</option>
                  </select>
                </div>

              </div>
            </div>

            <!-- Lokalizacja -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5">
              <div class="text-xs text-zinc-500 uppercase tracking-widest mb-4">Lokalizacja</div>
              <div class="space-y-3">

                <div>
                  <label for="loc" class="block text-xs text-zinc-400 mb-1.5">
                    Wybierz miejsce <span class="text-zinc-600">*</span>
                  </label>
                  <select name="miejsce" id="loc" required class="field"
                    onchange="document.getElementById('dodawanielokacji').style.display=this.value==='new'?'block':'none';
                              ['newLocationName','newLocationCity','newLocationAddress'].forEach(id=>{
                                const el=document.getElementById(id);
                                el.required=this.value==='new';
                              });">
                    <option value="" disabled selected>— Wybierz miejsce —</option>
                    <?php foreach ($places as $place): ?>
                        <option value="<?= e($place['place_ID']) ?>"><?= e($place['place_name'] . ', ' . $place['place_city']) ?></option>
                    <?php endforeach; ?>
                    <option value="new">+ Dodaj nową lokalizację</option>
                  </select>
                </div>

                <!-- Nowa lokalizacja (ukryta) -->
                <div id="dodawanielokacji" style="display:none"
                  class="border border-zinc-700 border-dashed rounded-xl p-4 space-y-3">
                  <div class="flex items-center gap-2 mb-1">
                    <svg width="13" height="13" viewBox="0 0 14 14" fill="none" class="text-zinc-500"><circle cx="7" cy="6" r="2.5" stroke="currentColor" stroke-width="1.2"/><path d="M7 1C4.2 1 2 3.2 2 6c0 3.5 5 7 5 7s5-3.5 5-7c0-2.8-2.2-5-5-5z" stroke="currentColor" stroke-width="1.2"/></svg>
                    <span class="text-xs text-zinc-400 font-medium">Nowa lokalizacja</span>
                  </div>
                  <div>
                    <label class="block text-xs text-zinc-500 mb-1.5">Nazwa lokacji <span class="text-zinc-600">*</span></label>
                    <input type="text" name="new_place_name" id="newLocationName"
                      placeholder="np. Filharmonia Poznańska" class="field"/>
                  </div>
                  <div class="grid grid-cols-2 gap-3">
                    <div>
                      <label class="block text-xs text-zinc-500 mb-1.5">Miasto <span class="text-zinc-600">*</span></label>
                      <input type="text" name="new_place_city" id="newLocationCity"
                        placeholder="np. Poznań" class="field"/>
                    </div>
                    <div>
                      <label class="block text-xs text-zinc-500 mb-1.5">Adres <span class="text-zinc-600">*</span></label>
                      <input type="text" name="new_place_address" id="newLocationAddress"
                        placeholder="ul. Fredry 12" class="field"/>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Bilety -->
            <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5">
              <div class="text-xs text-zinc-500 uppercase tracking-widest mb-4">Bilety i cena</div>
              <div class="space-y-3">

                <label class="flex items-center gap-3 p-3 rounded-xl border border-zinc-800 bg-zinc-800/40 cursor-pointer hover:border-zinc-600 transition-colors">
                  <input type="checkbox" id="is_free" name="is_free"
                    onchange="const c=document.getElementById('cena_input');c.value=this.checked?'0':'';c.readOnly=this.checked;c.style.opacity=this.checked?'.45':'1';"/>
                  <div>
                    <div class="text-sm text-white font-medium">Wydarzenie bezpłatne</div>
                    <div class="text-xs text-zinc-500 mt-0.5">Cena zostanie automatycznie ustawiona na 0 zł</div>
                  </div>
                </label>

                <div class="grid grid-cols-2 gap-3">
                  <div>
                    <label for="cena_input" class="block text-xs text-zinc-400 mb-1.5">
                      Cena biletu (zł) <span class="text-zinc-600">*</span>
                    </label>
                    <div class="relative">
                      <input type="number" step=".01" min="0" name="cena" id="cena_input" required
                        placeholder="0.00" class="field" style="padding-right: 36px;"/>
                      <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-zinc-600 pointer-events-none">zł</span>
                    </div>
                  </div>
                  <div>
                    <label for="ilosc" class="block text-xs text-zinc-400 mb-1.5">
                      Ilość biletów <span class="text-zinc-600">*</span>
                    </label>
                    <input type="number" min="1" name="ilosc" id="ilosc" required
                      placeholder="np. 200" class="field"/>
                  </div>
                </div>

              </div>
            </div>

            <!-- Grafika -->
			<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5">
              <div class="text-xs text-zinc-500 uppercase tracking-widest mb-4">Grafika (plakat / logo)</div>
              <label class="border border-dashed border-zinc-700 rounded-xl p-6 flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-zinc-500 hover:bg-zinc-800/30 transition-all">
                <div class="w-10 h-10 bg-zinc-800 rounded-xl flex items-center justify-center">
                  <svg width="18" height="18" viewBox="0 0 20 20" fill="none">
                    <path d="M10 3v10M6 7l4-4 4 4" stroke="#71717a" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M3 15h14" stroke="#71717a" stroke-width="1.4" stroke-linecap="round"></path>
                  </svg>
                </div>
                <div class="text-sm text-zinc-400 text-center">Kliknij, aby wybrać plik</div>
                <div class="text-xs text-zinc-600">JPG, PNG, GIF, WEBP · max 5 MB</div>
                <input type="file" name="grafika" id="grafika" accept="image/*" required="" class="field mt-1" style="width:auto; background:none; border:none; padding:0;">
              </label>
            </div>

            <!-- Submit -->
            <div class="flex items-center">
              <button type="submit"
                class="flex-1 bg-white text-black text-sm py-3 rounded-xl font-medium hover:bg-zinc-100 active:scale-95 transition-all">
                Potwierdź i dodaj wydarzenie
              </button>
            </div>

          </form>
        </div>


			</div>
		</main>
	</div>
</div>

<script>
	const pages = ['dashboard','events','users', 'add-event'];
	function setPage(name) {
		pages.forEach(p => {
			document.getElementById('page-' + p).classList.add('hidden');
			const nav = document.getElementById('nav-' + p);
			if (nav) { nav.classList.remove('bg-zinc-800','text-white'); nav.classList.add('text-zinc-400'); }
		});
		document.getElementById('page-' + name).classList.remove('hidden');
		const active = document.getElementById('nav-' + name);
		if (active) { active.classList.add('bg-zinc-800','text-white'); active.classList.remove('text-zinc-400'); }
	}
</script>
</body>
</html>