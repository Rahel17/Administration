<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $kas = Kas::with(['user', 'anggota'])->get(); // Ambil relasi user dan anggota
    //     foreach ($kas as $dt) {
    //     }
    //     $users = User::all(); // Ambil data pengguna untuk dropdown tambah pemasukan

    //     return view('kas.index', compact('kas', 'users'));
    // }
    public function index()
{
    // Ambil semua pengguna
    $users = User::with('anggota')->get();
    $kasuser= Kas::where ('user_id', Auth::user()->id)->get();
    $databulan = [];
    $databulan = $kasuser->pluck('bulan')->toArray();
    // dd($databulan); 
    // Ambil semua data kas dengan relasi user dan anggota
    $kasData = Kas::with(['user', 'anggota'])->get();

    // Gabungkan data kas per pengguna
    $kas = $users->map(function ($user) use ($kasData) {
        // Filter data kas berdasarkan user_id
        $userKas = $kasData->where('user_id', $user->id);

        // Hitung total kas untuk pengguna ini
        $total = $userKas->reduce(function ($carry, $kas) {
            $monthly = json_decode($kas->bulan, true) ?? [];
            return $carry + array_sum($monthly);
        }, 0);

        // Format data per pengguna
        return [
            'user' => $user,
            'kas' => $userKas,
            'total' => $total,
        ];
    });

    // Kirim data ke view
    return view('kas.index', compact('kas', 'users', 'databulan'));
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
        // dd($request->all());
        $request->validate([
            'bulan' => 'required',
            'bukti' => 'required|file|mimes:jpg,png,pdf|max:2048',
        ]);

        // $path = $request->file('bukti')->store('bukti_kas', 'public');
         // Mendapatkan file dari request
    $file = $request->file('bukti');

    // Menentukan lokasi penyimpanan
    $destinationPath = public_path('bukti_kas');
    
    // Membuat nama unik untuk file
    $fileName = 'bukti_kas/' . uniqid() . '_' . time() . '.' . $file->getClientOriginalName();

    // Memindahkan file ke lokasi yang ditentukan
    $file->move($destinationPath, $fileName);
        

        $bidang = Anggota::where('user_id', Auth::user()->id)->first();
        // dd($bidang);


        if (!$bidang) {
            $bidang='tidak diketahui';
        }
        else{
            $bidang = $bidang->bidang;  
        }

        Kas::create([
            'user_id' => Auth::user()->id,
            'bidang'=> $bidang,
            'bulan' => $request->bulan,
            'bukti' => $fileName,
            'status' => 'pending',
            'nominal' => 5000, // Contoh nominal default
            'keterangan'=> 'belum_lunas'
        ]);

        return redirect()->route('kas.index')->with('success', 'Bukti pembayaran berhasil diajukan!');
    }


    public function upload(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'required|string',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload file bukti pembayaran
        $fileName = time() . '_' . $request->file('bukti')->getClientOriginalName();
        $filePath = $request->file('bukti')->storeAs('uploads/bukti-pembayaran', $fileName, 'public');

        // Simpan data pembayaran ke database
        Kas::create([
            'user_id' => auth(),
            'bulan' => $validated['bulan'],
            'bukti' => $filePath,
            'status' => 'pending',
            'nominal' => 5000, // Jumlah nominal kas
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diajukan! Tunggu persetujuan admin.');
    }

    public function approve($id)
    {
        $kas = Kas::findOrFail($id);
        $kas->update(['status' => 'approved']);

        return redirect()->route('kas.index')->with('success', 'Pembayaran disetujui.');
    }

    public function reject($id)
    {
        $kas = Kas::findOrFail($id);
        $kas->update(['status' => 'rejected']);

        return redirect()->route('kas.index')->with('error', 'Pembayaran ditolak.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $kas = Kas::findOrFail($id);
        // return view('kas.show', compact('kas'));
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