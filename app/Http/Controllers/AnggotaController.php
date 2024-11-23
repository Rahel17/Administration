<?php

namespace App\Http\Controllers;


use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = DB::table('users')
            ->leftJoin('anggotas', 'users.id', '=', 'anggotas.user_id')
            ->select('users.id','users.name', 'users.npm', 'anggotas.bidang', 'anggotas.no_hp')
            ->where('users.role', '!=', 'admin')
            ->get();

        return view('anggota.index', compact('anggota'));
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
            'name' => 'nullable|string|max:255', // Hanya untuk pengguna baru
            'npm' => 'nullable|string|max:9|unique:users,npm', // Hanya untuk pengguna baru
            'bidang' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);
 
        if ($request->filled('name') && $request->filled('npm')) {
            // Buat pengguna baru jika data 'name' dan 'npm' disediakan
            $userId = DB::table('users')->insertGetId([
                'name' => $validated['name'],
                'npm' => $validated['npm'],
                'role' => 'anggota',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Anggota::create([
                'user_id' => $userId,
                'bidang' => $validated['bidang'],
                'no_hp' => $validated['no_hp'],
            ]);
        } else {
            // Tambahkan data ke anggota untuk pengguna yang sedang login
            Anggota::updateOrCreate(
                ['user_id' => auth::id()],
                [
                    'bidang' => $validated['bidang'],
                    'no_hp' => $validated['no_hp'],
                ]
            );
        }

        return back()->with('success', 'Data berhasil disimpan.');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'npm' => 'required|string|max:9|uppercase',
            'name' => 'required|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:20',
        ]);
    
        // Update tabel 'users'
        $user = DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
        ]);
    
        // Update tabel 'anggotas'
        DB::table('anggotas')->where('user_id', $id)->update([
            'bidang' => $request->bidang,
            'no_hp' => $request->no_hp,
        ]);
    
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data dari tabel 'anggotas'
        DB::table('anggotas')->where('user_id', $id)->delete();

        // Jika Anda juga ingin menghapus data pengguna di tabel 'users', tambahkan ini:
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
