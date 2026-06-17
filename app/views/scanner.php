<!DOCTYPE html>
<html lang='pl'>
<head>
	<meta charset='UTF-8'/>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<link rel='stylesheet' href='/css/style.css'>
	<link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500&display=swap' rel='stylesheet'/>
    <script src="https://unpkg.com/html5-qrcode"></script>
	<title>biletone | Admin</title>
</head>
<body class="bg-zinc-950 text-zinc-100">
<div class="flex h-dvh overflow-hidden">
	<main class="w-screen shrink-0 bg-zinc-900 border-r border-zinc-800 flex flex-col">

		<div class="px-5 py-5 border-b border-zinc-800">
			<a href='/' class='flex items-center flex-row gap-2'><div class="w-6 h-6 bg-white rounded-sm flex items-center justify-center shrink-0">
				<svg width="13" height="13" viewBox="0 0 14 14" fill="none">
					<rect x="1" y="3" width="12" height="8" rx="1.5" stroke="black" stroke-width="1.3"/>
					<path d="M4 3V2M10 3V2M1 6h12" stroke="black" stroke-width="1.3" stroke-linecap="round"/>
				</svg>
			</div>
			<span class="font-display font-semibold text-lg text-white tracking-tight">bilet<span class="font-light">one</span></span></a>
		</div>

        <div class='flex flex-col items-center gap-4 mt-4'>
            <div id="reader" style="width:400px"></div>
            <p id="status">Gotowy do skanowania...</p>
        </div>




	
		<div class="px-3 py-3 border-t border-zinc-800 flex flex-col gap-0.5 fixed bottom-0 w-full">
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
    </main>
</div>
</body>
<script>

const status = document.getElementById("status");

const scanner = new Html5QrcodeScanner(
    "reader",
    {
        fps: 10,
        qrbox: 250
    },
    false
);

let processing = false;

function onScanSuccess(qrCode) {

    if (processing) return;

    processing = true;

    status.textContent = "Sprawdzanie biletu...";

    fetch("/admin/scanner/check", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "qr_code=" + encodeURIComponent(qrCode)
    })
    .then(response => response.text())
    .then(result => {

        status.textContent = result;

        switch(result) {

            case "WEJSCIE_OK":
                status.textContent = "✅ Bilet poprawny";
                break;

            case "BILET_JUZ_WYKORZYSTANY":
                status.textContent = "❌ Bilet już wykorzystany";
                break;

            default:
                status.textContent = "⚠️ Nieprawidłowy bilet";
        }

        setTimeout(() => {
            status.textContent = "Gotowy do skanowania...";
            processing = false;
        }, 2000);
    })
    .catch(() => {
        status.textContent = "Błąd połączenia";
        processing = false;
    });
}

scanner.render(onScanSuccess);

</script>
</html>