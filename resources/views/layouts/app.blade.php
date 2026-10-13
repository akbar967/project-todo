<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Daftar Tugas') — Minecraft Todo</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Silkscreen & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen:wght@400;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .minecraft-font { font-family: 'Silkscreen', cursive; }
        
        /* Minecraft Blocky Pixel Grid Pattern */
        .bg-minecraft-grid {
            background-image: 
                linear-gradient(rgba(0, 0, 0, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.04) 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-[#6ca0ff] via-[#8cb8ff] to-[#b4d4ff] text-stone-900 min-h-screen flex flex-col antialiased selection:bg-emerald-500 selection:text-white relative overflow-x-hidden">
    
    <!-- Minecraft Overworld Clouds & Pixel Grid -->
    <div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden">
        <!-- Blok Awan Minecraft -->
        <div class="absolute top-12 left-16 w-80 h-28 bg-white/50 rounded-lg blur-sm"></div>
        <div class="absolute top-24 right-20 w-96 h-32 bg-white/40 rounded-lg blur-sm"></div>
        <!-- Grid Tekstur -->
        <div class="absolute inset-0 bg-minecraft-grid opacity-60"></div>
    </div>

    <!-- Header Style Kotak Inventory -->
    <header class="bg-[#c6c6c6] border-b-4 border-stone-800 sticky top-0 z-50 shadow-[0_4px_0_0_rgba(28,25,23,0.3)]">
        <div class="max-w-3xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="{{ route('todos.index') }}" class="minecraft-font font-bold text-stone-900 hover:text-emerald-700 transition flex items-center gap-2.5">
                <span class="w-8 h-8 rounded bg-[#55a022] text-white flex items-center justify-center font-bold text-sm border-2 border-stone-900 shadow-[2px_2px_0px_0px_#1c1917]">⛏</span>
                <span>Craft <span class="text-stone-600 text-xs font-normal">/ Todo</span></span>
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-3xl w-full mx-auto px-6 py-8 flex-grow relative">
        
        <!-- Flash Message Success -->
        @if (session('success'))
        <div role="status" class="mb-6 p-4 border-4 border-stone-800 bg-[#55a022] text-white text-sm flex items-center gap-3 shadow-[4px_4px_0px_0px_#1c1917]">
            <span class="font-bold">✓</span>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <!-- Error Validation Alert -->
        @if ($errors->any())
        <div role="alert" class="mb-6 p-4 border-4 border-stone-800 bg-[#e05b5b] text-white text-sm shadow-[4px_4px_0px_0px_#1c1917]">
            <div class="minecraft-font text-xs font-bold mb-2">Periksa kembali isianmu:</div>
            <ul class="list-disc list-inside space-y-1 pl-2 text-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Minecraft Inventory Box Container -->
        <div class="bg-[#c6c6c6] border-4 border-stone-800 shadow-[8px_8px_0px_0px_#1c1917] p-6 sm:p-10 relative">
            <!-- Inner Bevel Highlight (Efek kotak 3D khas Minecraft UI) -->
            <div class="absolute inset-0 border-t-2 border-l-2 border-white/60 pointer-events-none"></div>
            <div class="absolute inset-0 border-b-2 border-r-2 border-stone-900/40 pointer-events-none"></div>
            
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-6 text-center text-xs text-stone-700 border-t-4 border-stone-800 bg-[#b5b5b5] relative font-mono">
        <p>Minecraft Edition · Laravel · Blade · Tailwind CSS · SQLite</p>
    </footer>

</body>

</html>