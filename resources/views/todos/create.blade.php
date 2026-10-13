@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Tambah Tugas</h1>
    <p class="text-sm text-slate-500 mt-1">Buat tugas baru untuk daftar kegiatan Anda.</p>
</div>

<form action="{{ route('todos.store') }}" method="POST" class="space-y-6">
    @csrf

    <!-- Input Judul -->
    <div>
        <label for="title" class="block text-sm font-medium text-slate-700 mb-1.5">
            Judul <span class="text-slate-400 font-normal">(wajib)</span>
        </label>
        <input 
            id="title" 
            name="title" 
            type="text" 
            maxlength="255" 
            value="{{ old('title') }}" 
            required
            placeholder="Contoh: Belajar Laravel Eloquent"
            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition shadow-sm placeholder:text-slate-400"
        >
    </div>

    <!-- Input Deskripsi -->
    <div>
        <label for="description" class="block text-sm font-medium text-slate-700 mb-1.5">
            Deskripsi <span class="text-slate-400 font-normal">(opsional)</span>
        </label>
        <textarea 
            id="description" 
            name="description" 
            rows="4" 
            maxlength="5000"
            placeholder="Tambahkan detail catatan atau langkah-langkah..."
            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition shadow-sm placeholder:text-slate-400 resize-y"
        >{{ old('description') }}</textarea>
    </div>

    <!-- Checkbox Status -->
    <div class="flex items-center gap-3 pt-1">
        <input 
            type="checkbox" 
            id="is_completed" 
            name="is_completed" 
            value="1" 
            @checked(old('is_completed', false))
            class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 transition cursor-pointer"
        >
        <label for="is_completed" class="text-sm font-medium text-slate-700 cursor-pointer select-none">
            Sudah selesai
        </label>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
        <button 
            type="submit" 
            class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm transition shadow-sm shadow-indigo-100 flex items-center gap-2"
        >
            <span>Simpan Tugas</span>
        </button>
        <a 
            href="{{ route('todos.index') }}" 
            class="px-5 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium text-sm transition"
        >
            Batal
        </a>
    </div>
</form>
@endsection