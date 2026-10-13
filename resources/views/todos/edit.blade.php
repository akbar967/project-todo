@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight break-all">{{ $todo->title }}</h1>
        <p class="text-xs text-slate-400 mt-1">
            Dibuat pada {{ $todo->created_at->translatedFormat('d M Y, H:i') }}
        </p>
    </div>
    
    <!-- Status Badge -->
    <div>
        @if ($todo->is_completed)
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                Selesai
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                Belum selesai
            </span>
        @endif
    </div>
</div>

<!-- Deskripsi Box -->
<div class="bg-slate-50/60 rounded-xl border border-slate-100 p-5 mb-8">
    <h3 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Deskripsi Tugas</h3>
    @if ($todo->description)
        <div class="text-slate-700 text-sm whitespace-pre-line leading-relaxed">{{ $todo->description }}</div>
    @else
        <p class="text-sm text-slate-400 italic">Tidak ada deskripsi yang ditambahkan.</p>
    @endif
</div>

<!-- Tombol Aksi -->
<div class="flex items-center gap-3 pt-4 border-t border-slate-100">
    <a 
        href="{{ route('todos.edit', $todo) }}" 
        class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm transition shadow-sm shadow-indigo-100 flex items-center gap-2"
    >
        <span>Edit Tugas</span>
    </a>
    <a 
        href="{{ route('todos.index') }}" 
        class="px-5 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium text-sm transition"
    >
        Kembali
    </a>
</div>
@endsection