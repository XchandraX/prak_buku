@extends('layouts.main')

@section('content')

    <a href="{{ route('buku.index') }}" class="btn btn-secondary mb-4">Kembali</a>

    <h2 class="mb3">Tambah Buku Baru</h2>

    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
    
        @csrf

        <div class="mb-3">
            <label for="kode" class="form-label"></label>
            <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode">
            @error('kode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul">
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang">
            @error('pengarang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit">
            @error('penerbit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
            <input type="date" class="form-control @error('tanggal_terbit') is-invalid @enderror" id="tanggal_terbit" name="tanggal_terbit">
            @error('tanggal_terbit')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="cover" class="form-label">Cover Buku</label>
            <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover">
            @error('cover')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
                   
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection