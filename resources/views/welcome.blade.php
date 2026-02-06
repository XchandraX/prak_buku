@extends('layouts.main')
@section('content')

<h2 class="mb-3">Hai aku chandra</h2>

<p>klik link di bawah ini untuk ke halaman utama</p>

<a href="{{ route('buku.index') }}" class="btn btn-primary">klik disini</a>

@endsection