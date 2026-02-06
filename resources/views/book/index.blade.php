@extends('layouts.main')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissble fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <h2 class="mb-3">Daftar Buku</h2>

    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-5">Tambah Buku Baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $book->judul}}</td>
                    <td>{{ $book->pengarang }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td>
                        <a href="{{ route('buku.show', $book->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('buku.destroy', $book->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Data buku tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection