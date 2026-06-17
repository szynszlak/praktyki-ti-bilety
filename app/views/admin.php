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

			<a href='/admin/scanner' id="nav-tickets"
				class="nav-btn w-full flex md:hidden items-center gap-3 px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 text-left transition-colors">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M1 6a2 2 0 000 4v2a1 1 0 001 1h12a1 1 0 001-1v-2a2 2 0 000-4V4a1 1 0 00-1-1H2a1 1 0 00-1 1v2z" stroke="currentColor" stroke-width="1.3"/><path d="M6 8h4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-dasharray="1.5 1.5"/></svg>
				Skaner
			</a>

			<button id="nav-dashboard"
				class="nav-btn w-full hidden md:flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-white bg-zinc-800 text-left">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.3"/><rect x="9" y="1" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.3"/><rect x="1" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.3"/><rect x="9" y="9" width="6" height="6" rx="1.5" stroke="currentColor" stroke-width="1.3"/></svg>
				Dashboard
			</button>

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

			<a href="/admin/addevent"><button id="nav-add-event"
				class="nav-btn w-full hidden md:flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 text-left transition-colors">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="1" y="3" width="14" height="11" rx="1.5" stroke="currentColor" stroke-width="1.3"/><path d="M5 3V1M11 3V1M1 7h14" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
				Dodaj wydarzenie
			</button></a>

			<!-- <div class="text-xs text-zinc-600 uppercase tracking-widest px-2 mb-2 mt-4 hidden md:flex">System</div> -->

			<!-- <button class="nav-btn w-full hidden md:flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 text-left transition-colors">
				<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M8 1v2M8 13v2M1 8h2M13 8h2M3.1 3.1l1.4 1.4M11.5 11.5l1.4 1.4M3.1 12.9l1.4-1.4M11.5 4.5l1.4-1.4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
				Ustawienia
			</button> -->
		</nav>

		<!-- User -->
		<div class="px-3 py-3 border-t border-zinc-800 flex flex-col gap-0.5">
			<a href="/account">
			<div class="flex items-center gap-3 px-2 py-2 rounded-lg hover:bg-zinc-800 cursor-pointer transition-colors">
				<div class="w-7 h-7 rounded-full bg-zinc-700 flex items-center justify-center text-xs font-medium text-white shrink-0"><?= e($user['user_name'][0] . $user['user_lastname'][0]) ?></div>
				<div class="flex-1 min-w-0">
					<div class="text-xs font-medium text-white truncate"><?= e($user['user_name'] .' '. $user['user_lastname']) ?></div>
					<div class="text-xs text-zinc-500 truncate">Admin</div>
				</div>
				<svg width="13" height="13" viewBox="0 0 14 14" fill="none" class="text-zinc-600 shrink-0"><path d="M5 3l4 4-4 4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</div>
			</a>

			<a href='/logout' class="nav-btn w-full flex items-center justify-center px-3 py-2 rounded-lg text-sm text-zinc-400 hover:text-white hover:bg-zinc-800 transition-colors">
				Wyloguj
			</a>
		</div>


	</aside>

	<!-- MAIN -->
	<div class="flex-1 hidden md:flex flex-col overflow-hidden ">

		<!-- PAGE CONTENT -->
		<main class="flex-1 overflow-y-auto scrollbar-hide p-6 bg-zinc-950">

			<!-- ===== DASHBOARD ===== -->
			<div id="page-dashboard">

				<div class="flex items-end justify-between mb-6">
					<div>
						<div class="text-xs text-zinc-600 uppercase tracking-widest mb-1">Panel główny</div>
						<h1 class="font-display text-2xl font-semibold text-white">Dzień dobry, <?= e($user['user_name']) ?>.</h1>
					</div>
					<div class="flex items-center gap-2">
						<button class="flex items-center gap-2 bg-zinc-800 border border-zinc-700 text-zinc-400 text-xs px-3 py-2 rounded-lg hover:text-white hover:border-zinc-600 transition-colors">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none"><rect x="1" y="2" width="10" height="9" rx="1" stroke="currentColor" stroke-width="1.2"/><path d="M4 2V1M8 2V1M1 5h10" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/></svg>
							Maj 2026
						</button>
						<button class="flex items-center gap-2 bg-white text-black text-xs px-3 py-2 rounded-lg font-medium hover:bg-zinc-200 transition-colors">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M6 2v8M2 6h8" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
							Dodaj wydarzenie
						</button>
					</div>
				</div>

				
				<!-- KPI cards -->
				<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
					<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
						<div class="flex items-center justify-between mb-3">
							<span class="text-xs text-zinc-500">Przychód (maj)</span>
							<div class="w-7 h-7 bg-zinc-800 rounded-lg flex items-center justify-center">
								<svg width="13" height="13" viewBox="0 0 14 14" fill="none" class="text-zinc-400"><path d="M2 10.5l3-3.5 2.5 2L10.5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
							</div>
						</div>
						<div class="font-display text-2xl font-semibold text-white">84 230 zł</div>
						<div class="flex items-center gap-1 mt-1.5 text-xs text-emerald-400">
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M5 8V2M2 5l3-3 3 3" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
							+12.4% vs kwiecień
						</div>
					</div>
					<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
						<div class="flex items-center justify-between mb-3">
							<span class="text-xs text-zinc-500">Sprzedane bilety</span>
							<div class="w-7 h-7 bg-zinc-800 rounded-lg flex items-center justify-center">
								<svg width="13" height="13" viewBox="0 0 14 14" fill="none" class="text-zinc-400"><path d="M1 7a3 3 0 003 3v1a1 1 0 001 1h6a1 1 0 001-1v-1a3 3 0 003-3V5a1 1 0 00-1-1H2a1 1 0 00-1 1v2z" stroke="currentColor" stroke-width="1.3"/></svg>
							</div>
						</div>
						<div class="font-display text-2xl font-semibold text-white">3 847</div>
						<div class="flex items-center gap-1 mt-1.5 text-xs text-emerald-400">
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M5 8V2M2 5l3-3 3 3" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
							+8.1% vs kwiecień
						</div>
					</div>
					<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
						<div class="flex items-center justify-between mb-3">
							<span class="text-xs text-zinc-500">Nowi użytkownicy</span>
							<div class="w-7 h-7 bg-zinc-800 rounded-lg flex items-center justify-center">
								<svg width="13" height="13" viewBox="0 0 14 14" fill="none" class="text-zinc-400"><circle cx="7" cy="5" r="2.5" stroke="currentColor" stroke-width="1.3"/><path d="M2 12c0-2.8 2.2-5 5-5s5 2.2 5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
							</div>
						</div>
						<div class="font-display text-2xl font-semibold text-white">612</div>
						<div class="flex items-center gap-1 mt-1.5 text-xs text-zinc-500">
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M5 2v6M8 5l-3 3-3-3" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
							−3.2% vs kwiecień
						</div>
					</div>
					<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4">
						<div class="flex items-center justify-between mb-3">
							<span class="text-xs text-zinc-500">Zwroty</span>
							<div class="w-7 h-7 bg-zinc-800 rounded-lg flex items-center justify-center">
								<svg width="13" height="13" viewBox="0 0 14 14" fill="none" class="text-zinc-400"><path d="M2 7a5 5 0 1010 0 5 5 0 00-10 0z" stroke="currentColor" stroke-width="1.3"/><path d="M8 7H5M6.5 5.5L5 7l1.5 1.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
							</div>
						</div>
						<div class="font-display text-2xl font-semibold text-white">38</div>
						<div class="flex items-center gap-1 mt-1.5 text-xs text-amber-400">
							<svg width="10" height="10" viewBox="0 0 10 10" fill="none"><path d="M5 8V2M2 5l3-3 3 3" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
							+2 oczekujące
						</div>
					</div>
				</div>

				<!-- Chart + side -->
				<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4">

					<!-- Mini chart (SVG) -->
					<div class="lg:col-span-2 bg-zinc-900 border border-zinc-800 rounded-xl p-5">
						<div class="flex items-center justify-between mb-5">
							<div>
								<div class="text-xs text-zinc-500 mb-0.5">Sprzedaż biletów — ostatnie 7 dni</div>
								<div class="font-display text-lg font-semibold text-white">1 284 bilety</div>
							</div>
							<div class="flex gap-1">
								<button class="text-xs bg-white text-black px-3 py-1.5 rounded-lg font-medium">Tydzień</button>
								<button class="text-xs text-zinc-500 px-3 py-1.5 rounded-lg hover:text-white transition-colors">Miesiąc</button>
							</div>
						</div>
						<!-- SVG bar chart -->
						<svg viewBox="0 0 480 120" xmlns="http://www.w3.org/2000/svg" class="w-full">
							<defs>
								<linearGradient id="barG" x1="0" y1="0" x2="0" y2="1">
									<stop offset="0%" stop-color="#fff" stop-opacity="0.15"/>
									<stop offset="100%" stop-color="#fff" stop-opacity="0.03"/>
								</linearGradient>
							</defs>
							<!-- grid lines -->
							<line x1="0" y1="20" x2="480" y2="20" stroke="#27272a" stroke-width="1"/>
							<line x1="0" y1="50" x2="480" y2="50" stroke="#27272a" stroke-width="1"/>
							<line x1="0" y1="80" x2="480" y2="80" stroke="#27272a" stroke-width="1"/>
							<line x1="0" y1="110" x2="480" y2="110" stroke="#27272a" stroke-width="1"/>
							<!-- bars: pon wt sr czw pt sb nd -->
							<rect x="10"  y="60" width="44" height="50" rx="4" fill="url(#barG)" stroke="#3f3f46" stroke-width="1"/>
							<rect x="78"  y="35" width="44" height="75" rx="4" fill="url(#barG)" stroke="#3f3f46" stroke-width="1"/>
							<rect x="146" y="45" width="44" height="65" rx="4" fill="url(#barG)" stroke="#3f3f46" stroke-width="1"/>
							<rect x="214" y="25" width="44" height="85" rx="4" fill="white" fill-opacity="0.12" stroke="white" stroke-width="1" stroke-opacity="0.3"/>
							<rect x="282" y="55" width="44" height="55" rx="4" fill="url(#barG)" stroke="#3f3f46" stroke-width="1"/>
							<rect x="350" y="30" width="44" height="80" rx="4" fill="url(#barG)" stroke="#3f3f46" stroke-width="1"/>
							<rect x="418" y="50" width="44" height="60" rx="4" fill="url(#barG)" stroke="#3f3f46" stroke-width="1"/>
							<!-- labels -->
							<text x="32"  y="118" text-anchor="middle" fill="#52525b" font-size="9" font-family="DM Sans">Pon</text>
							<text x="100" y="118" text-anchor="middle" fill="#52525b" font-size="9" font-family="DM Sans">Wt</text>
							<text x="168" y="118" text-anchor="middle" fill="#52525b" font-size="9" font-family="DM Sans">Śr</text>
							<text x="236" y="118" text-anchor="middle" fill="#fff"    font-size="9" font-family="DM Sans" font-weight="500">Czw</text>
							<text x="304" y="118" text-anchor="middle" fill="#52525b" font-size="9" font-family="DM Sans">Pt</text>
							<text x="372" y="118" text-anchor="middle" fill="#52525b" font-size="9" font-family="DM Sans">Sb</text>
							<text x="440" y="118" text-anchor="middle" fill="#52525b" font-size="9" font-family="DM Sans">Nd</text>
							<!-- tooltip czw -->
							<rect x="204" y="6" width="64" height="18" rx="4" fill="white"/>
							<text x="236" y="18" text-anchor="middle" fill="black" font-size="9" font-family="DM Sans" font-weight="500">247 biletów</text>
						</svg>
					</div>

					<!-- Top events -->
					<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5">
						<div class="text-xs text-zinc-500 uppercase tracking-widest mb-4">Top wydarzenia</div>
						<div class="space-y-4">
							<div class="flex items-center gap-3">
								<div class="text-xs text-zinc-600 w-4 text-right shrink-0">1</div>
								<div class="flex-1 min-w-0">
									<div class="text-sm text-white truncate font-medium">Brodka — Akustyczna</div>
									<div class="w-full bg-zinc-800 rounded-full h-1 mt-1.5">
										<div class="bg-white h-1 rounded-full" style="width:84%"></div>
									</div>
								</div>
								<div class="text-xs text-zinc-400 shrink-0">84%</div>
							</div>
							<div class="flex items-center gap-3">
								<div class="text-xs text-zinc-600 w-4 text-right shrink-0">2</div>
								<div class="flex-1 min-w-0">
									<div class="text-sm text-white truncate font-medium">Lech vs Legia</div>
									<div class="w-full bg-zinc-800 rounded-full h-1 mt-1.5">
										<div class="bg-zinc-400 h-1 rounded-full" style="width:71%"></div>
									</div>
								</div>
								<div class="text-xs text-zinc-400 shrink-0">71%</div>
							</div>
							<div class="flex items-center gap-3">
								<div class="text-xs text-zinc-600 w-4 text-right shrink-0">3</div>
								<div class="flex-1 min-w-0">
									<div class="text-sm text-white truncate font-medium">Hamlet — Teatr Polski</div>
									<div class="w-full bg-zinc-800 rounded-full h-1 mt-1.5">
										<div class="bg-zinc-500 h-1 rounded-full" style="width:58%"></div>
									</div>
								</div>
								<div class="text-xs text-zinc-400 shrink-0">58%</div>
							</div>
							<div class="flex items-center gap-3">
								<div class="text-xs text-zinc-600 w-4 text-right shrink-0">4</div>
								<div class="flex-1 min-w-0">
									<div class="text-sm text-white truncate font-medium">Ostatnia Podróż</div>
									<div class="w-full bg-zinc-800 rounded-full h-1 mt-1.5">
										<div class="bg-zinc-600 h-1 rounded-full" style="width:43%"></div>
									</div>
								</div>
								<div class="text-xs text-zinc-400 shrink-0">43%</div>
							</div>
							<div class="flex items-center gap-3">
								<div class="text-xs text-zinc-600 w-4 text-right shrink-0">5</div>
								<div class="flex-1 min-w-0">
									<div class="text-sm text-white truncate font-medium">Galeria Arsenał</div>
									<div class="w-full bg-zinc-800 rounded-full h-1 mt-1.5">
										<div class="bg-zinc-700 h-1 rounded-full" style="width:29%"></div>
									</div>
								</div>
								<div class="text-xs text-zinc-400 shrink-0">29%</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Recent transactions -->
				<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5">
					<div class="flex items-center justify-between mb-4">
						<div class="text-xs text-zinc-500 uppercase tracking-widest">Ostatnie transakcje</div>
						<button class="text-xs text-zinc-500 hover:text-white transition-colors flex items-center gap-1">
							Wszystkie
							<svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M2 6h8M7 3l3 3-3 3" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</button>
					</div>
					<div class="overflow-x-auto scrollbar-hide">
						<table class="w-full text-sm min-w-140">
							<thead>
								<tr class="border-b border-zinc-800">
									<th class="text-left text-xs text-zinc-600 font-medium pb-2.5 pr-4">Użytkownik</th>
									<th class="text-left text-xs text-zinc-600 font-medium pb-2.5 pr-4">Wydarzenie</th>
									<th class="text-left text-xs text-zinc-600 font-medium pb-2.5 pr-4">Data</th>
									<th class="text-left text-xs text-zinc-600 font-medium pb-2.5 pr-4">Kwota</th>
									<th class="text-left text-xs text-zinc-600 font-medium pb-2.5">Status</th>
								</tr>
							</thead>
							<tbody class="divide-y divide-zinc-800/60">
								<tr class="hover:bg-zinc-800/30 transition-colors">
									<td class="py-3 pr-4">
										<div class="flex items-center gap-2.5">
											<div class="w-6 h-6 rounded-full bg-zinc-700 flex items-center justify-center text-xs text-white shrink-0">MN</div>
											<span class="text-zinc-300 text-xs">Marek Nowak</span>
										</div>
									</td>
									<td class="py-3 pr-4 text-xs text-zinc-400">Brodka — Akustyczna</td>
									<td class="py-3 pr-4 text-xs text-zinc-500">26 maj, 11:42</td>
									<td class="py-3 pr-4 text-xs text-white font-medium">178 zł</td>
									<td class="py-3"><span class="text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded-full">Opłacone</span></td>
								</tr>
								<tr class="hover:bg-zinc-800/30 transition-colors">
									<td class="py-3 pr-4">
										<div class="flex items-center gap-2.5">
											<div class="w-6 h-6 rounded-full bg-zinc-700 flex items-center justify-center text-xs text-white shrink-0">AW</div>
											<span class="text-zinc-300 text-xs">Alicja Wiśniewska</span>
										</div>
									</td>
									<td class="py-3 pr-4 text-xs text-zinc-400">Lech vs Legia</td>
									<td class="py-3 pr-4 text-xs text-zinc-500">26 maj, 10:15</td>
									<td class="py-3 pr-4 text-xs text-white font-medium">240 zł</td>
									<td class="py-3"><span class="text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded-full">Opłacone</span></td>
								</tr>
								<tr class="hover:bg-zinc-800/30 transition-colors">
									<td class="py-3 pr-4">
										<div class="flex items-center gap-2.5">
											<div class="w-6 h-6 rounded-full bg-zinc-700 flex items-center justify-center text-xs text-white shrink-0">PK</div>
											<span class="text-zinc-300 text-xs">Paweł Kowalski</span>
										</div>
									</td>
									<td class="py-3 pr-4 text-xs text-zinc-400">Hamlet — Teatr Polski</td>
									<td class="py-3 pr-4 text-xs text-zinc-500">26 maj, 09:03</td>
									<td class="py-3 pr-4 text-xs text-white font-medium">90 zł</td>
									<td class="py-3"><span class="text-xs bg-amber-500/10 text-amber-400 border border-amber-500/20 px-2 py-0.5 rounded-full">Oczekuje</span></td>
								</tr>
								<tr class="hover:bg-zinc-800/30 transition-colors">
									<td class="py-3 pr-4">
										<div class="flex items-center gap-2.5">
											<div class="w-6 h-6 rounded-full bg-zinc-700 flex items-center justify-center text-xs text-white shrink-0">KZ</div>
											<span class="text-zinc-300 text-xs">Katarzyna Zając</span>
										</div>
									</td>
									<td class="py-3 pr-4 text-xs text-zinc-400">Ostatnia Podróż</td>
									<td class="py-3 pr-4 text-xs text-zinc-500">25 maj, 22:47</td>
									<td class="py-3 pr-4 text-xs text-white font-medium">56 zł</td>
									<td class="py-3"><span class="text-xs bg-red-500/10 text-red-500 border border-red-500/20 px-2 py-0.5 rounded-full">Zwrot</span></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div><!-- /dashboard -->

			<!-- ===== EVENTS PAGE ===== -->
			<div id="page-events" class="hidden">
				<div class="flex items-end justify-between mb-6">
					<div>
						<div class="text-xs text-zinc-600 uppercase tracking-widest mb-1">Zarządzanie</div>
						<h1 class="font-display text-2xl font-semibold text-white">Wydarzenia</h1>
					</div>
					<button class="flex items-center gap-2 bg-white text-black text-xs px-3 py-2 rounded-lg font-medium hover:bg-zinc-200 transition-colors">
						<svg width="11" height="11" viewBox="0 0 12 12" fill="none"><path d="M6 2v8M2 6h8" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
						Nowe wydarzenie
					</button>
				</div>
				<div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden">
					<div class="p-4 border-b border-zinc-800 flex items-center gap-3">
						<div class="flex items-center gap-2 bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 flex-1 max-w-xs">
							<svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="text-zinc-500"><circle cx="5.5" cy="5.5" r="4" stroke="currentColor" stroke-width="1.2"/><path d="M9 9l1.5 1.5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/></svg>
							<input type="text" placeholder="Filtruj wydarzenia…" class="bg-transparent text-xs text-zinc-300 placeholder-zinc-600 outline-none border-none flex-1"/>
						</div>
						<button class="text-xs bg-zinc-800 border border-zinc-700 text-zinc-400 px-3 py-2 rounded-lg hover:text-white transition-colors">Wszystkie kategorie</button>
					</div>
					<table class="w-full text-sm">
						<thead><tr class="border-b border-zinc-800">
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Nazwa</th>
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Kategoria</th>
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Data</th>
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Bilety</th>
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Status</th>
							<th class="p-4"></th>
						</tr></thead>
						<tbody class="divide-y divide-zinc-800/60">
							<tr class="hover:bg-zinc-800/30 transition-colors">
								<td class="p-4 text-zinc-200 text-xs font-medium">Brodka — Trasa Akustyczna</td>
								<td class="p-4 text-zinc-500 text-xs">Koncert</td>
								<td class="p-4 text-zinc-500 text-xs">28 maj 2026</td>
								<td class="p-4 text-xs"><span class="text-white">453</span><span class="text-zinc-600">/540</span></td>
								<td class="p-4"><span class="text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded-full">Aktywne</span></td>
								<td class="p-4 text-right"><button class="text-zinc-600 hover:text-white text-xs transition-colors">Edytuj →</button></td>
							</tr>
							<tr class="hover:bg-zinc-800/30 transition-colors">
								<td class="p-4 text-zinc-200 text-xs font-medium">Hamlet — Teatr Polski</td>
								<td class="p-4 text-zinc-500 text-xs">Teatr</td>
								<td class="p-4 text-zinc-500 text-xs">3 cze 2026</td>
								<td class="p-4 text-xs"><span class="text-white">89</span><span class="text-zinc-600">/200</span></td>
								<td class="p-4"><span class="text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded-full">Aktywne</span></td>
								<td class="p-4 text-right"><button class="text-zinc-600 hover:text-white text-xs transition-colors">Edytuj →</button></td>
							</tr>
							<tr class="hover:bg-zinc-800/30 transition-colors">
								<td class="p-4 text-zinc-200 text-xs font-medium">Lech Poznań vs Legia Warszawa</td>
								<td class="p-4 text-zinc-500 text-xs">Sport</td>
								<td class="p-4 text-zinc-500 text-xs">8 cze 2026</td>
								<td class="p-4 text-xs"><span class="text-white">12 410</span><span class="text-zinc-600">/18 000</span></td>
								<td class="p-4"><span class="text-xs bg-amber-500/10 text-amber-400 border border-amber-500/20 px-2 py-0.5 rounded-full">Wyprzedaż</span></td>
								<td class="p-4 text-right"><button class="text-zinc-600 hover:text-white text-xs transition-colors">Edytuj →</button></td>
							</tr>
							<tr class="hover:bg-zinc-800/30 transition-colors">
								<td class="p-4 text-zinc-200 text-xs font-medium">Galeria Arsenał — Wernisaż</td>
								<td class="p-4 text-zinc-500 text-xs">Wystawa</td>
								<td class="p-4 text-zinc-500 text-xs">15 cze 2026</td>
								<td class="p-4 text-xs"><span class="text-white">34</span><span class="text-zinc-600">/300</span></td>
								<td class="p-4"><span class="text-xs bg-zinc-700/60 text-zinc-400 border border-zinc-700 px-2 py-0.5 rounded-full">Projekt</span></td>
								<td class="p-4 text-right"><button class="text-zinc-600 hover:text-white text-xs transition-colors">Edytuj →</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- ===== USERS PAGE ===== -->
			<div id="page-users" class="hidden">
				<div class="flex items-end justify-between mb-6">
					<div>
						<div class="text-xs text-zinc-600 uppercase tracking-widest mb-1">Zarządzanie</div>
						<h1 class="font-display text-2xl font-semibold text-white">Użytkownicy</h1>
					</div>
					<button class="text-xs bg-white text-black px-3 py-2 rounded-lg font-medium hover:bg-zinc-200 transition-colors">+ Dodaj użytkownika</button>
				</div>
				<div class="grid grid-cols-3 gap-3 mb-5">
					<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4 text-center">
						<div class="font-display text-xl font-semibold text-white mb-0.5">14 832</div>
						<div class="text-xs text-zinc-500">Łączna liczba kont</div>
					</div>
					<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4 text-center">
						<div class="font-display text-xl font-semibold text-white mb-0.5">612</div>
						<div class="text-xs text-zinc-500">Nowi w maju</div>
					</div>
					<div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4 text-center">
						<div class="font-display text-xl font-semibold text-white mb-0.5">3</div>
						<div class="text-xs text-zinc-500">Zbanowani</div>
					</div>
				</div>
				<div class="bg-zinc-900 border border-zinc-800 rounded-xl overflow-hidden">
					<table class="w-full text-sm">
						<thead><tr class="border-b border-zinc-800">
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Użytkownik</th>
							<th class="text-left text-xs text-zinc-600 font-medium p-4">E-mail</th>
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Rola</th>
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Bilety</th>
							<th class="text-left text-xs text-zinc-600 font-medium p-4">Status</th>
						</tr></thead>
						<tbody class="divide-y divide-zinc-800/60">
							<tr class="hover:bg-zinc-800/30 transition-colors">
								<td class="p-4"><div class="flex items-center gap-2.5"><div class="w-7 h-7 rounded-full bg-zinc-700 flex items-center justify-center text-xs text-white">AK</div><span class="text-zinc-200 text-xs font-medium">Anna Kowalska</span></div></td>
								<td class="p-4 text-zinc-500 text-xs">anna@example.pl</td>
								<td class="p-4 text-xs"><span class="bg-white/10 text-white text-xs px-2 py-0.5 rounded-full">Superadmin</span></td>
								<td class="p-4 text-zinc-400 text-xs">—</td>
								<td class="p-4"><span class="text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded-full">Aktywny</span></td>
							</tr>
							<tr class="hover:bg-zinc-800/30 transition-colors">
								<td class="p-4"><div class="flex items-center gap-2.5"><div class="w-7 h-7 rounded-full bg-zinc-700 flex items-center justify-center text-xs text-white">MN</div><span class="text-zinc-200 text-xs font-medium">Marek Nowak</span></div></td>
								<td class="p-4 text-zinc-500 text-xs">marek@example.pl</td>
								<td class="p-4 text-xs"><span class="bg-zinc-800 text-zinc-400 text-xs px-2 py-0.5 rounded-full border border-zinc-700">Użytkownik</span></td>
								<td class="p-4 text-zinc-400 text-xs">14</td>
								<td class="p-4"><span class="text-xs bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2 py-0.5 rounded-full">Aktywny</span></td>
							</tr>
							<tr class="hover:bg-zinc-800/30 transition-colors">
								<td class="p-4"><div class="flex items-center gap-2.5"><div class="w-7 h-7 rounded-full bg-zinc-700 flex items-center justify-center text-xs text-white">KZ</div><span class="text-zinc-200 text-xs font-medium">Katarzyna Zając</span></div></td>
								<td class="p-4 text-zinc-500 text-xs">kasia@example.pl</td>
								<td class="p-4 text-xs"><span class="bg-zinc-800 text-zinc-400 text-xs px-2 py-0.5 rounded-full border border-zinc-700">Użytkownik</span></td>
								<td class="p-4 text-zinc-400 text-xs">3</td>
								<td class="p-4"><span class="text-xs bg-red-500/10 text-red-500 border border-red-500/20 px-2 py-0.5 rounded-full">Zbanowany</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- ===== ADD EVENT PAGE ===== -->
			<div id="page-add-event" class='hidden'>
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