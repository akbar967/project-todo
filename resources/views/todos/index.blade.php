@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')
<!-- Header & Tombol Tambah -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Daftar Tugas</h1>
        <p class="text-sm text-slate-500 mt-0.5">Catat tugasmu, kerjakan, lalu tandai selesai.</p>
    </div>
    <a 
        href="{{ route('todos.create') }}" 
        class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm transition shadow-sm shadow-indigo-100 shrink-0"
    >
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        <span>Tambah Tugas</span>
    </a>
</div>

<!-- List Tugas -->
<div class="space-y-3">
    @forelse ($todos as $todo)
        <article class="p-4 sm:p-5 rounded-xl border border-slate-100 bg-slate-50/50 hover:bg-white hover:border-slate-200 transition group flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="space-y-1.5 min-w-0">
                <div class="flex items-center gap-2.5">
                    <!-- Status Indicator Badge -->
                    @if ($todo->is_completed)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Selesai
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200 shrink-0">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                            Belum selesai
                        </span>
                    @endif

                    <h2 class="text-base font-semibold text-slate-800 hover:text-indigo-600 transition truncate">
                        <a href="{{ route('todos.show', $todo) }}" class="{{ $todo->is_completed ? 'line-through text-slate-400' : '' }}">
                            {{ $todo->title }}
                        </a>
                    </h2>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-1 sm:gap-2 shrink-0 border-t sm:border-t-0 pt-3 sm:pt-0 border-slate-100">
                <a 
                    href="{{ route('todos.show', $todo) }}" 
                    class="px-3 py-1.5 text-xs font-medium text-slate-600 hover:text-indigo-600 hover:bg-slate-100 rounded-lg transition"
                >
                    Detail
                </a>
                <a 
                    href="{{ route('todos.edit', $todo) }}" 
                    class="px-3 py-1.5 text-xs font-medium text-slate-600 hover:text-indigo-600 hover:bg-slate-100 rounded-lg transition"
                >
                    Edit
                </a>
                <form action="{{ route('todos.destroy', $todo) }}" method="POST" onsubmit="return confirm('Hapus tugas ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        aria-label="Hapus tugas {{ $todo->title }}"
                        class="px-3 py-1.5 text-xs font-medium text-rose-600 hover:bg-rose-50 rounded-lg transition"
                    >
                        Hapus
                    </button>
                </form>
            </div>
        </article>
    @empty
        <!-- Empty State -->
        <div class="text-center py-12 px-4 rounded-xl border border-dashed border-slate-200 bg-slate-50/30">
            <div class="w-12 h-12 rounded-full bg-indigo-50 text-indigo-500 mx-auto flex items-center justify-center mb-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
            <h3 class="text-sm font-semibold text-slate-800">Belum ada tugas</h3>
            <p class="text-xs text-slate-400 mt-1 mb-4">Mulai dengan menambahkan tugas baru pertamamu.</p>
            <a 
                href="{{ route('todos.create') }}" 
                class="inline-flex items-center gap-1.5 text-xs font-semibold text-indigo-600 hover:text-indigo-700"
            >
                <span>+ Buat tugas baru</span>
            </a>
        </div>
    @endforelse
</div>
@endsection