<?php

namespace App\Http\Controllers;

use App\Models\Kas;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'bendum') {
            $kas = Kas::all(); // Jika role bendum, tampilkan semua data
        } else {
            $kas = Kas::where('anggota_id', Auth::id())->get(); // Selain bendum, tampilkan hanya milik user login
        }

        $user = Auth::user(); // Ambil user yang login
        $kas = Kas::where('anggota_id', $user->id)->get(); // Ambil data kas berdasarkan user yang login
        return view('kas.index', compact('kas'));
    }

    public function indexRiwayat(Request $request)
    {
    
            $kas = Kas::all();
      

        // return view('pemasukan.index', ['pemasukans' => $pemasukans]);
        return view('kas.riwayat', compact('kas')); //['pemasukans' => $pemasukans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'anggota_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'bulan' => 'required|string',
            'bukti' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload file bukti pembayaran
        if ($request->hasFile('bukti')) {
            $path = $request->file('bukti')->store('bukti_kas', 'public');
            $validated['bukti'] = $path;
        }

        // Tambahkan `user_id` berdasarkan user login
        $validated['user_id'] = Auth::id();

        // Set status default sebagai 'diajukan'
        $validated['status'] = 'diajukan';

        // Simpan data ke database
        Kas::create($validated);

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
        ]);

        $kas = Kas::findOrFail($id);
        $kas->update([
            'status' => $request->status,
        ]);

        return redirect()->route('kas.index')->with('success', 'Status kas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
