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
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->role === 'bendum') {
            $pengeluarans = Pengeluaran::where('status', 'disetujui')->get();
        } 
        else 
        {
            $pengeluarans = Pengeluaran::all();
        }

        return view('pengeluaran.index', ['pengeluarans' => $pengeluarans]);
        
    }

    public function indexRiwayat(Request $request)
    {
        $pengeluarans = Pengeluaran::all();
      
        return view('pengeluaran.riwayat', compact('pengeluarans')); 
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
            'kategori' => 'required|string|max:255',
            'uraian' => 'required|string',
            'bidang' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('dokumen')) {
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen_pengeluaran', 'public');
        }

        $validatedData['status'] = 'diajukan'; // Default status
        Pengeluaran::create($validatedData);

        return redirect()->back()->with('success', 'Pengeluaran berhasil diajukan dan menunggu persetujuan.');
    }

    public function approve($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        if ($pengeluaran) {
            $pengeluaran->status = 'disetujui';
            $pengeluaran->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Pengeluaran tidak ditemukan.']);
    }

    public function reject($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        if ($pengeluaran) {
            $pengeluaran->status = 'ditolak';
            $pengeluaran->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Pengeluaran tidak ditemukan.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.edit', compact('pengeluaran'));
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
            'bidang' => 'required|string|max:255',
            'nominal' => 'required|numeric',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        // Handle file upload and deletion of the old file
        if ($request->hasFile('dokumen')) {
            if ($pengeluaran->dokumen) {
                Storage::disk('public')->delete($pengeluaran->dokumen);
            }
            $validated['dokumen'] = $request->file('dokumen')->store('dokumen_pengeluaran', 'public');
        }

        $pengeluaran->update($validated);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi permintaan
        $validated = $request->validate([
            'status' => 'required|in:diajukan,disetujui,ditolak',
        ]);

        // Cari pengeluaran berdasarkan ID
        $pengeluaran = Pengeluaran::find($id);

        if (!$pengeluaran) {
            return response()->json(['success' => false, 'message' => 'Data pengeluaran tidak ditemukan.'], 404);
        }

        try {
            // Update status
            $pengeluaran->status = $validated['status'];
            $pengeluaran->save();

            return response()->json(['success' => true, 'message' => 'Status pengeluaran berhasil diperbarui.']);
        } catch (\Exception $e) {
            // Tangani error
            return response()->json(['success' => false, 'message' => 'Gagal memperbarui status: ' . $e->getMessage()], 500);
        }
    }

    public function ajukanKembali(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'uraian' => 'required|string',
            'bidang' => 'required|string',
            'nominal' => 'required|numeric',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        $pengeluaran->update([
            'tanggal' => $validated['tanggal'],
            'kategori' => $validated['kategori'],
            'uraian' => $validated['uraian'],
            'bidang' => $validated['bidang'],
            'nominal' => $validated['nominal'],
            'status' => 'diajukan',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'pengeluaran berhasil diajukan kembali.',
            'data' => $pengeluaran,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Delete associated document if it exists
        if ($pengeluaran->dokumen) {
            Storage::disk('public')->delete($pengeluaran->dokumen);
        }

        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'pengeluaran berhasil dihapus.');
    }
}
