<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\User;
use Illuminate\Http\Request;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kas = Kas::with('user')->latest()->get();
        $users = User::all(); // Ambil semua data user untuk dropdown
        return view('kas.index', compact('kas', 'users'));
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
        'user_id' => 'required|exists:users,id',
        'bulan' => 'required|array',
        'jumlah' => 'required|numeric|min:0',
    ]);

    $kas = new Kas();
    $kas->user_id = $validatedData['user_id'];
    $kas->bulan = json_encode($validatedData['bulan']); // Simpan sebagai JSON
    $kas->keterangan = array_sum($validatedData['bulan']) >= 50000 ? 'lunas' : 'belum_lunas';
    $kas->save();

    return redirect()->route('kas.index')->with('success', 'Pemasukan berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kas = Kas::findOrFail($id);
        return view('kas.show', compact('kas'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
