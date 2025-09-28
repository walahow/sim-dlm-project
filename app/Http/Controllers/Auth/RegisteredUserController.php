<?php 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Proses input user_class menjadi format yang diinginkan (huruf kapital semua dan tanpa spasi)
        $formattedUserClass = strtoupper(str_replace(' ', '', $request->user_class));
    
        // Validasi input termasuk unique check berdasarkan format yang akan disimpan di database
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'user_class' => [
                'required',
                'string',
                'max:255',
                Rule::unique(User::class)->where(function ($query) use ($formattedUserClass) {
                    return $query->whereRaw('UPPER(REPLACE(user_class, " ", "")) = ?', [$formattedUserClass]);
                }),
            ],
            'no_telp' => ['required', 'regex:/^[0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        try {
            // Buat user dengan user_class yang sudah diformat
            $user = User::create([
                'username' => $request->username,
                'user_class' => $formattedUserClass,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'password' => Hash::make($request->password),
            ]);
    
            event(new Registered($user));
    
            Auth::login($user);
    
            return redirect(route('dashboard', absolute: false));
        } catch (\Exception $e) {
            // Tangkap kesalahan dan periksa apakah itu pelanggaran integritas
            if ($e->getCode() === '23000') { // 23000 adalah kode untuk pelanggaran batasan integritas
                return redirect()->back()->withInput()->withErrors([
                    'user_class' => 'User class has been taken',
                ]);
            }
    
            // Jika bukan pelanggaran batasan, tangani kesalahan lainnya jika perlu
            return redirect()->back()->withInput()->withErrors([
                'general' => 'An error occurred. Please try again.',
            ]);
        }
    }
    
}
