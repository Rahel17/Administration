<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PasswordResetLinkController extends Controller
{
    public function sendResetLinkViaWhatsApp(Request $request)
    {
        $request->validate([
            'no_hp' => 'required|numeric',
        ]);

        // Cari anggota berdasarkan nomor HP
        $user = DB::table('anggota')->where('no_hp', $request->no_hp)->first();

        if (!$user) {
            return back()->withErrors(['no_hp' => __('We couldn\'t find a user with that phone number.')]);
        }

        // Buat token reset password
        $token = Str::random(60);

        // Simpan token di tabel password_resets
        DB::table('password_resets')->updateOrInsert(
            ['npm' => $user->npm], // Gunakan npm sebagai identifier unik
            [
                'npm' => $user->npm,
                'token' => bcrypt($token),
                'created_at' => now(),
            ]
        );

        // Buat link reset password
        $resetLink = route('password.reset', ['token' => $token, 'email' => $user->email]);

        // Format pesan WhatsApp
        $message = 'Here is your password reset link: ' . $resetLink;

        // Redirect ke wa.me dengan pesan
        return redirect("https://wa.me/{$user->no_hp}?text=" . urlencode($message));
    }
}