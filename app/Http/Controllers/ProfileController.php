<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Mengatur file yang diterima hanya gambar
        ]);

        // Proses upload foto profil
        if ($request->hasFile('profile')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('public/profile/' . $user->foto);
            }

            // Simpan foto baru
            $fileName = time() . '.' . $request->file('profile')->getClientOriginalExtension();
            $request->file('profile')->storeAs('public/profile', $fileName);

            // Update nama file foto di database
            $user->foto = $fileName;
        }

        // Simpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('success', 'profile berhasil di update');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function negotiate($id)
    {
       
        // Mengambil data tambahan dari tabel users (dapat disesuaikan jika diperlukan)
        $komting = DB::table('users')
            ->where('id', $id)
            ->get(); // Jika hanya menginginkan satu data, gunakan first()
    
        // Kirim data user dan komting ke view
        return view('profile', compact( 'komting'));
    }
    
}
