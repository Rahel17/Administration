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


     public function index(Request $request)
     {
         $user = $request->user();
     
         if ($user->role === 'bendum') {
             $pemasukans = Pemasukan::where('penanggungjawab', $user->name)
                 ->whereIn('status_verifikasi', ['pending', 'approved'])
                 ->get();
         } else {
             $pemasukans = Pemasukan::all();
         }
     
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
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'uraian' => 'required|string',
            'bidang' => 'required|string',
            'nominal' => 'required|numeric',
            'penanggungjawab' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen_pemasukan', 'public');
        }

        $validatedData['status_verifikasi'] = 'pending'; // Set status pending
        Pemasukan::create($validatedData);

        return redirect()->back()->with('success', 'Pemasukan berhasil diajukan dan menunggu persetujuan.');
    }

    public function approve($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->update(['status_verifikasi' => 'approved']);

        return redirect()->back()->with('success', 'Pemasukan berhasil disetujui.');
    }

    public function reject($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->update(['status_verifikasi' => 'rejected']);

        return redirect()->back()->with('success', 'Pemasukan berhasil ditolak.');
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
        'penanggungjawab' => 'required|string',
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
