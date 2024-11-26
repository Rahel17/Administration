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
            $pemasukans = Pemasukan::where('status', 'disetujui')->get();
        } 
        else 
        {
            $pemasukans = Pemasukan::all();
        }

        return view('pemasukan.index', ['pemasukans' => $pemasukans]);
        // return view('pemasukan.riwayat', ['pemasukans' => $pemasukans]);
    }
    public function indexRiwayat(Request $request)
    {
    
            $pemasukans = Pemasukan::all();
      

        // return view('pemasukan.index', ['pemasukans' => $pemasukans]);
        return view('pemasukan.riwayat', compact('pemasukans')); //['pemasukans' => $pemasukans]);
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
            $validatedData['dokumen'] = $request->file('dokumen')->store('dokumen_pemasukan', 'public');
        }

        $validatedData['status'] = 'diajukan'; // Default status
        Pemasukan::create($validatedData);

        return redirect()->back()->with('success', 'Pemasukan berhasil diajukan dan menunggu persetujuan.');
    }

    /**
     * Approve pemasukan.
     */
    public function approve($id)
    {
        $pemasukan = Pemasukan::find($id);
        if ($pemasukan) {
            $pemasukan->status = 'disetujui';
            $pemasukan->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Pemasukan tidak ditemukan.']);
    }

    public function reject($id)
    {
        $pemasukan = Pemasukan::find($id);
        if ($pemasukan) {
            $pemasukan->status = 'ditolak';
            $pemasukan->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Pemasukan tidak ditemukan.']);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.show', compact('pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.edit', compact('pemasukan'));
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

        $pemasukan = Pemasukan::findOrFail($id);

        // Handle file upload and deletion of the old file
        if ($request->hasFile('dokumen')) {
            if ($pemasukan->dokumen) {
                Storage::disk('public')->delete($pemasukan->dokumen);
            }
            $validated['dokumen'] = $request->file('dokumen')->store('dokumen_pemasukan', 'public');
        }

        $pemasukan->update($validated);

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi permintaan
        $validated = $request->validate([
            'status' => 'required|in:diajukan,disetujui,ditolak',
        ]);

        // Cari pemasukan berdasarkan ID
        $pemasukan = Pemasukan::find($id);

        if (!$pemasukan) {
            return response()->json(['success' => false, 'message' => 'Data pemasukan tidak ditemukan.'], 404);
        }

        try {
            // Update status
            $pemasukan->status = $validated['status'];
            $pemasukan->save();

            return response()->json(['success' => true, 'message' => 'Status pemasukan berhasil diperbarui.']);
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

        $pemasukan = Pemasukan::findOrFail($id);

        $pemasukan->update([
            'tanggal' => $validated['tanggal'],
            'kategori' => $validated['kategori'],
            'uraian' => $validated['uraian'],
            'bidang' => $validated['bidang'],
            'nominal' => $validated['nominal'],
            'status' => 'diajukan',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pemasukan berhasil diajukan kembali.',
            'data' => $pemasukan,
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);

        // Delete associated document if it exists
        if ($pemasukan->dokumen) {
            Storage::disk('public')->delete($pemasukan->dokumen);
        }

        $pemasukan->delete();

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil dihapus.');
    }
}
