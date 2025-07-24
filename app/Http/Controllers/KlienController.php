<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klien;
use App\Models\PaketInternet;
use Illuminate\Support\Facades\Storage;

class KlienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kliens = Klien::with('paketInternet')->latest()->paginate(10);
        return view('klien.index', compact('kliens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pakets = PaketInternet::all();
        return view('klien.create', compact('pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_klien' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_whatsapp' => 'required|string|max:20',
            'paket_internet_id' => 'required|exists:paket_internets,id',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Simpan file ke folder 'ktp' di dalam disk 'public'
            $path = $request->file('foto_ktp')->store('ktp', 'public');

            Klien::create([
                'nama_klien' => $request->nama_klien,
                'alamat' => $request->alamat,
                'no_whatsapp' => $request->no_whatsapp,
                'paket_internet_id' => $request->paket_internet_id,
                'foto_ktp' => $path,
            ]);

            return redirect()->route('klien.index')->with('success', 'Klien berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data klien. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Klien $klien)
    {
        // Method ini jarang digunakan dalam CRUD sederhana, tapi bisa disiapkan
        // return view('klien.show', compact('klien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Klien $klien)
    {
        $pakets = PaketInternet::all();
        return view('klien.edit', compact('klien', 'pakets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Klien $klien)
    {
        $request->validate([
            'nama_klien' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_whatsapp' => 'required|string|max:20',
            'paket_internet_id' => 'required|exists:paket_internets,id',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $data = $request->except('foto_ktp');

            if ($request->hasFile('foto_ktp')) {
                if ($klien->foto_ktp) {
                    Storage::delete($klien->foto_ktp);
                }
                // PERBAIKAN: Menggunakan path yang benar agar konsisten dengan method store()
                $path = $request->file('foto_ktp')->store('ktp', 'public');
                $data['foto_ktp'] = $path;
            }

            $klien->update($data);

            return redirect()->route('klien.index')->with('success', 'Data klien berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data klien. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Klien $klien)
    {
        try {
            if ($klien->foto_ktp) {
                Storage::delete($klien->foto_ktp);
            }

            $klien->delete();

            return redirect()->route('klien.index')->with('success', 'Data klien berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('klien.index')->with('error', 'Terjadi kesalahan saat menghapus data klien. Silakan coba lagi.');
        }
    }
}
