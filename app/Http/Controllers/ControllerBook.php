<?php


namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControllerBook extends Controller
{
    //
    public function index(){
        $books = Book::all();

        return view('book.index',[
            'books' => $books,
            'title' => 'Daftar Buku'
        ]);
    }

    public function create(){
        return view('book.create', [
            'title' => 'Tambah Buku'
        ]);
    }

    public function store(Request $request) {
        $aturan = [
            'kode' => 'required|max:10',
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:50',
            'penerbit' => 'required|max:50',
            'tanggal_terbit' => 'required|date',
            'cover' => 'nullable|image|max:2048|mimes:jpg,jpeg,png'
        ];

        $pesan = [
            'required' => ':attribute wajib diisi.',
            'max' => ':attribute maksimal :max karakter.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'image' => ':attribute harus berupa file gambar.',
            'mimes' => ':attribute harus berformat :mimes.'
        ];

        $validatedData = $request->validate($aturan, $pesan);

        if($request->file('cover')) {
            $validatedData['cover'] = $request->file('cover')->store('gambar-cover', 'public');
        }

        Book::create($validatedData);

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function show(Book $buku) {
        return view('book.show', [
            'buku' => $buku,
            'title' => 'Detail Buku'
        ]);
    }

    public function edit(Book $buku) {
        return view('book.edit', [
            'buku' => $buku,
            'title' => 'Edit Buku'
        ]);
    }

    public function update(Request $request, Book $buku){
        $aturan = [
            'kode' => 'required|max:10',
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:50',
            'penerbit' => 'required|max:50',
            'tanggal_terbit' => 'required|date',
            'cover' => 'nullable|image|max:2048|mimes:jpg,jpeg,png'
        ];

        $pesan = [
            'required' => ':attribute wajib diisi.',
            'max' => ':attribute maksimal :max karakter.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'image' => ':attribute harus berupa file gambar.',
            'mimes' => ':attribute harus berformat :mimes.'
        ];

        $validatedData = $request->validate($aturan, $pesan);

        if($request->file('cover')) {
            if ($request->input('gambar_lama')) {
                Storage::delete($request->input('gambar_lama'));
            }
            $validatedData['cover'] = $request->file('cover')->store('gambar-cover', 'public');
        }

        $buku->update($validatedData);

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function destroy(Book $buku) {
        if ($buku->cover) {
            Storage::delete($buku->cover);
        }

        $buku->delete();

        return redirect('/buku')->with('success', 'Buku berhasil dihapus.');
    }
}
