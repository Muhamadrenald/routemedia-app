<?php

namespace App\Http\Controllers;

use App\Models\PaketInternet;
use Illuminate\Http\Request;

class PaketInternetController extends Controller
{
    public function index()
    {
        $pakets = PaketInternet::latest()->paginate(10);
        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        // return view('paket.create');
        $pakets = PaketInternet::all();
        return view('paket.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'kecepatan' => 'required|string|max:255',
        ]);

        PaketInternet::create($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket internet berhasil ditambahkan.');
    }

    public function edit(PaketInternet $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, PaketInternet $paket)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'kecepatan' => 'required|string|max:255',
        ]);

        $paket->update($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket internet berhasil diperbarui.');
    }

    public function destroy(PaketInternet $paket)
    {
        // Pengecekan penting: jangan hapus paket jika masih ada klien yang menggunakannya
        if ($paket->kliens()->count() > 0) {
            return redirect()->route('paket.index')->with('error', 'Paket tidak dapat dihapus karena masih digunakan oleh klien.');
        }

        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Paket internet berhasil dihapus.');
    }
}
