<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluarans = Pengeluaran::orderBy('tanggal', 'desc')->get();

        // Return data ke view dengan nama variabel `pemasukans`
        return view('pengeluaran.index', compact('pengeluarans'));
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
    
        Pengeluaran::create($validated);
    
        return redirect()->route('pengeluaran.index')->with('success', 'Pemasukan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengeluarans = Pengeluaran::findOrFail($id);
        return view('pengeluaran.show', compact('pengeluarans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengeluarans = Pengeluaran::findOrFail($id);
        return view('pengeluaran.edit', compact('pengeluarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
    
        $pengeluarans = Pengeluaran::findOrFail($id);
    
        if ($request->hasFile('dokumen')) {
            // Hapus dokumen lama
            if ($pengeluarans->dokumen) {
                Storage::disk('public')->delete($pengeluarans->dokumen);
            }
            // Simpan dokumen baru
            $validated['dokumen'] = $request->file('dokumen')->store('dokumen', 'public');
        }
    
        $pengeluarans->update($validated);
    
        return redirect()->route('pengeluaran.index')->with('success', 'Data pemasukan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengeluarans = Pengeluaran::findOrFail($id);
        $pengeluarans->delete();
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
