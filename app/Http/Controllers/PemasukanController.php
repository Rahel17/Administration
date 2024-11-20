<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        // Ambil semua data pemasukan dari database
        $pemasukans = Pemasukan::orderBy('tanggal', 'desc')->get();

        // Return data ke view dengan nama variabel `pemasukans`
        return view('pemasukan.index', compact('pemasukans'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:255',
            'uraian' => 'required|string',
            'bidang' => 'required|string',
            'nominal' => 'required|numeric',
            'penganggungjawab' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,png',
        ]);
    
        if ($request->hasFile('dokumen')) {
            $path = $request->file('dokumen')->store('dokumen', 'public');
            if (!$path) {
                return redirect()->back()->withErrors(['dokumen' => 'Gagal menyimpan file dokumen.']);
            }
            $validated['dokumen'] = $path;
        }
    
        Pemasukan::create($validated);
    
        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemasukans = Pemasukan::findOrFail($id);
        return view('pemasukan.show', compact('pemasukans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemasukans = Pemasukan::findOrFail($id);
        return view('pemasukan.edit', compact('pemasukans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'tanggal' => 'required|date',
        'kategori' => 'required|string|max:255',
        'uraian' => 'required|string',
        'bidang' => 'required|string',
        'nominal' => 'required|numeric',
        'penganggungjawab' => 'required|string',
        'dokumen' => 'nullable|file|mimes:pdf,jpg,png',
    ]);

    $pemasukan = Pemasukan::findOrFail($id);

    if ($request->hasFile('dokumen')) {
        // Hapus dokumen lama
        if ($pemasukan->dokumen) {
            Storage::disk('public')->delete($pemasukan->dokumen);
        }
        // Simpan dokumen baru
        $validated['dokumen'] = $request->file('dokumen')->store('dokumen', 'public');
    }

    $pemasukan->update($validated);

    return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemasukans = Pemasukan::findOrFail($id);
        $pemasukans->delete();
        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil dihapus.');
    }
}
