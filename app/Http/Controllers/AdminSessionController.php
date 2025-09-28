<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\pesan;
use App\Models\Gedung;
use App\Models\Matkul;
use App\Models\Matkulganti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class AdminSessionController extends Controller
{
    // CRUD for Gedung
    public function indexGedung()
    {
        $gedung = Gedung::paginate(10);
        return view('admin.gedung', compact('gedung'));
    }

  

    
    public function storeGedung(Request $request)
    { try{
        $request->validate([
            'nomorgedung' => 'required',
            'jumlahkelas' => 'required|integer',
            'lokasi' => 'required',
            'Pengurusgedung' => 'required',
            'lantai' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi foto
        ]);
    
        // Mengupload foto
        $fotoPath = $request->file('foto')->store('images', 'public'); // Simpan foto di storage/app/public/images
    
        // Buat data gedung baru
        Gedung::create(array_merge($request->all(), ['foto' => $fotoPath])); // Tambahkan path foto
    
        return redirect()->route('admin.gedung.index')->with('success', 'Gedung berhasil ditambahkan.');
    }
    catch (QueryException $e) {
        if ($e->getCode() == 45000) {
            return redirect()->back()->withErrors(['error' => 'gedung sudah ada tolong lebih teliti']);
        }
        
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
    }
    
}
    public function updateGedung(Request $request, $id)
    {
      $gedung = Gedung::find($id);
  try{
      // Validasi input
      $request->validate([
          'nomorgedung' => 'required|string|max:255',
          'jumlahkelas' => 'required|integer',
          'lokasi' => 'required|string|max:255',
          'Pengurusgedung' => 'required|string|max:255',
          'lantai' => 'required|integer',
          'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur batasan ukuran dan tipe file
      ]);
  
      // Update informasi gedung
      $gedung->nomorgedung = $request->nomorgedung;
      $gedung->jumlahkelas = $request->jumlahkelas;
      $gedung->lokasi = $request->lokasi;
      $gedung->Pengurusgedung = $request->Pengurusgedung;
      $gedung->lantai = $request->lantai;
  
      // Cek jika ada foto baru
      if ($request->hasFile('foto')) {
          // Hapus foto lama jika ada
          if ($gedung->foto) {
              Storage::delete('public/' . $gedung->foto);
          }
          // Simpan foto baru
          $path = $request->file('foto')->store('images', 'public');
          $gedung->foto = $path;
      }
  
      $gedung->save();
  
      return redirect()->route('admin.gedung.index')->with('success', 'Gedung berhasil diupdate!');
  }  catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->back()->withErrors(['error' => 'data gedung yang di update sudah ada.']);
            }
            
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }
    

    public function destroyGedung($id)
    {
        $gedung = Gedung::findOrFail($id);
        $gedung->delete();

        return redirect()->route('admin.gedung.index')->with('success', 'Gedung berhasil dihapus.');
    }
    // CRUD for user
    public function indexuser()
    {
        $user = User::paginate(10);
        return view('admin.user', compact('user'));
    }

  

    
    public function storeuser(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'email' => 'required',
                'user_class' => 'required',
                'no_telp' => 'required',
                'password' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi foto
            ]);
    
            // Mengupload foto dan hanya menyimpan nama filenya saja di database
            $fotoName = $request->file('foto')->store('profile', 'public');
            $fotoName = basename($fotoName); // Mengambil hanya nama file, tanpa path
    
            // Buat data user baru
            User::create(array_merge($request->all(), [
                'foto' => $fotoName,
                'password' => Hash::make($request['password']),
            ]));
    
            return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
        } catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->back()->withErrors(['error' => 'User sudah ada tolong lebih teliti']);
            }
    
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }
    
    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        try {
            // Validasi input
            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required',
                'user_class' => 'required|string|max:255',
                'no_telp' => 'required',
                'password' => 'required',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur batasan ukuran dan tipe file
            ]);
    
            // Update informasi user
            $user->username = $request->username;
            $user->email = $request->email;
            $user->user_class = $request->user_class;
            $user->no_telp = $request->no_telp;
            $user->password = Hash::make($request['password']);
    
            // Cek jika ada foto baru
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($user->foto) {
                    Storage::disk('public')->delete('profile/' . $user->foto);
                }
    
                // Simpan foto baru
                $fotoName = $request->file('foto')->store('profile', 'public');
                $user->foto = basename($fotoName); // Menyimpan hanya nama file
            }
    
            $user->save();
    
            return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate!');
        } catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->back()->withErrors(['error' => 'Data user yang diupdate sudah ada.']);
            }
    
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }
    
    
    public function destroyuser($id)
    {
        $user = User::findOrFail($id);
    
        // Hapus foto jika ada
        if ($user->foto) {
            Storage::disk('public')->delete('profile/' . $user->foto);
        }
    
        // Hapus user dari database
        $user->delete();
    
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
    
    

 // CRUD for Kelas
public function indexKelas()
{  $kelas = DB::table('kelas')
    ->join('gedung', 'kelas.gedung_id', '=', 'gedung.id') // join dengan gedung
    ->select('kelas.*', 'gedung.nomorgedung') // pilih semua dari tabel kelas dan hanya nomorgedung dari gedung
    ->paginate(10); // paginasi 10 data per halaman
    $gedungs = DB::table('gedung')->select('nomorgedung','id')->get();

return view('admin.kelas', compact('kelas','gedungs'));
}



public function storeKelas(Request $request)
{
    // Mencari gedung berdasarkan nomorgedung
    $gedung = Gedung::where('nomorgedung', $request['nomorgedung'])->first();
    
    // Memeriksa apakah gedung ditemukan
    if (!$gedung) {
        return redirect()->back()->withErrors(['error' => 'Gedung tidak ditemukan.']);
    }
try{
    // Validasi input dari request
    $request->validate([
        'nomorkelas' => 'required',
        'kapasitas' => 'required',
        'status' => 'required',
        'ac' => 'required',
        'kipas' => 'required',
        'lampu' => 'required',
        'keterangan' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi foto
    ]);

    // Mengupload foto
    $fotoPath = $request->file('foto')->store('images', 'public'); // Simpan foto di storage/app/public/images

    // Buat data kelas baru dan simpan id gedung
   Kelas::create(array_merge($request->all(), [
        'gedung_id' => $gedung->id, // Ambil id gedung dari hasil query
        'foto' => $fotoPath
    ]));

    return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
   
}  catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->back()->withErrors(['error' => ' kelas yang ditambahkan sudah  ada.']);
            }
           
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }




public function updateKelas(Request $request, $id)
{   
    $kelas = Kelas::find($id);
try{
    // Validasi input
    $request->validate([
        'nomorgedung' => 'required',
        'nomorkelas' => 'required',
        'kapasitas' => 'required|integer',
        'status' => 'required',
        'ac' => 'required',
        'kipas' => 'required',
        'lampu' => 'required',
        'keterangan' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $gedung = gedung::where('nomorgedung', $request['nomorgedung'])->first();
    if (!$gedung) {
        return redirect()->back()->withErrors(['error' => 'gedung tidak ditemukan.']);
    }
    // Update informasi kelas
    $kelas->nomorkelas = $request->nomorkelas;
    $kelas->kapasitas = $request->kapasitas;
    $kelas->status = $request->status;
    $kelas->ac = $request->ac;
    $kelas->kipas = $request->kipas;
    $kelas->lampu = $request->lampu;

    $kelas->keterangan = $request->keterangan;
    $kelas->gedung_id = $gedung->id;

    // Cek jika ada foto baru
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($kelas->foto) {
            Storage::delete('public/' . $kelas->foto);
        }
        // Simpan foto baru
        $path = $request->file('foto')->store('images', 'public');
        $kelas->foto = $path;
    }

    $kelas->save();

    return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diupdate!');
} catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->back()->withErrors(['error' => 'kelas yang diupdate sudah ada.']);
            }
           
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

public function destroyKelas($id)
{
    $kelas = Kelas::findOrFail($id);

    // Hapus foto jika ada
    if ($kelas->foto) {
        Storage::delete('public/' . $kelas->foto);
    }

    $kelas->delete();

    return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil dihapus.');
}


   // CRUD for Matkul
public function indexMatkul()
{
   // Mengambil data dari tabel matkul, kelas, dan users
$matkul = DB::table('matkul')
->join('kelas', 'matkul.kelas_id', '=', 'kelas.id')
->join('users', 'matkul.user_id', '=', 'users.id') // Asumsikan ada kolom user_id di tabel matkul
->select(
    'matkul.*', // Mengambil semua kolom dari tabel matkul
    'kelas.nomorkelas', // Mengambil kolom nomorkelas dari tabel kelas
    'users.username' // Mengambil kolom username dari tabel users
)
->paginate(10);

    // Mengambil semua data kelas dan users (dosen)
    $kelas = Kelas::all();
    $users = User::all();

    // Mengirim data matkul, kelas, dan users ke view
    return view('admin.matkul', compact('matkul', 'kelas', 'users'));
}


    public function storeMatkul(Request $request)
    { try{
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nomorkelas' => 'required|exists:kelas,nomorkelas', // validasi kelas harus ada di tabel kelas
            'matakuliah' => 'required|string|max:255',
            'hari' => 'required|string',
            'jammulai' => 'required|date_format:H:i',
            'jamakhir' => 'required|date_format:H:i|after:jammulai', // jam selesai harus lebih dari jam mulai
            'dosen' => 'required', // validasi dosen harus ada di tabel users
            'status' => 'required',
            'user_class' => 'required',
            'username' => 'required',
        ]);

        // Cari kelas berdasarkan nomorkelas
        $kelas = \App\Models\Kelas::where('nomorkelas', $validatedData['nomorkelas'])->first();
        $user = \App\Models\User::where('username', $validatedData['username'])->first();

        // Simpan data matkul baru
        $matkul = new Matkul();
        $matkul->kelas_id = $kelas->id; // Menggunakan id kelas yang ditemukan
        $matkul->matakuliah = $validatedData['matakuliah'];
        $matkul->hari = $validatedData['hari'];
        $matkul->jammulai = $validatedData['jammulai'];
        $matkul->jamakhir = $validatedData['jamakhir'];
        $matkul->dosen = $validatedData['dosen']; // Menggunakan id user dosen
        $matkul->status = $validatedData['status'];
        $matkul->user_class = $validatedData['user_class'];
        $matkul->user_id = $user->id; // Menggunakan id user yang ditemukan
        $matkul->save(); // Simpan data ke database

        // Redirect kembali ke halaman matkul dengan pesan sukses
        return redirect()->route('admin.matkul.index')->with('success', 'Mata Kuliah berhasil ditambahkan');
    }  catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->back()->withErrors(['error' => 'Jadwal matkul bertabrakan dengan jadwal yang ada.']);
            }
          
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }

    }

   public function updateMatkul(Request $request, $id)
{ try{
    // Validasi data yang diterima dari form
    $validatedData = $request->validate([
        'nomorkelas' => 'required|exists:kelas,nomorkelas', // validasi kelas harus ada di tabel kelas
        'matakuliah' => 'required|string|max:255',
        'hari' => 'required|string',
        'jammulai' => 'required',
        'jamakhir' => 'required', // jam selesai harus lebih dari jam mulai
        'dosen' => 'required', // validasi dosen harus ada di tabel users
        'status' => 'required',
        'user_class' => 'required',
        'username' => 'required',
    ]);

    // Cari kelas berdasarkan nomorkelas
    $kelas = DB::table('kelas')->where('nomorkelas', $validatedData['nomorkelas'])->first();
    $user = DB::table('users')->where('username', $validatedData['username'])->first();

    // Update data matkul dengan data yang telah divalidasi
    DB::table('matkul')
        ->where('id', $id)
        ->update([
            'kelas_id' => $kelas->id, // Menggunakan id kelas yang ditemukan
            'matakuliah' => $validatedData['matakuliah'],
            'hari' => $validatedData['hari'],
            'jammulai' => $validatedData['jammulai'],
            'jamakhir' => $validatedData['jamakhir'],
            'dosen' => $validatedData['dosen'], // Menggunakan dosen yang divalidasi
            'status' => $validatedData['status'],
            'user_class' => $validatedData['user_class'],
            'user_id' => $user->id, // Menggunakan id user yang ditemukan
        ]);
        

    return redirect()->route('admin.matkul.index')->with('success', 'Matkul berhasil diupdate.');
}  catch (QueryException $e) {
    if ($e->getCode() == 45000) {
        return redirect()->route('admin.matkul.index')->withErrors(['error' => 'Jadwal matkul bertabrakan dengan jadwal yang ada.']);
    }
    
    return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
}
}



    public function destroyMatkul($id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();

        return redirect()->route('admin.matkul.index')->with('success', 'Matkul berhasil dihapus.');
    }

    // CRUD for Matkul Ganti
    public function indexMatkulGanti()
    {
       // Mengambil data dari tabel matkul, kelas, dan users
$matkulganti = DB::table('matkulganti')
->join('kelas', 'matkulganti.kelas_id', '=', 'kelas.id')
->join('users', 'matkulganti.user_id', '=', 'users.id') // Asumsikan ada kolom user_id di tabel matkul
->join('matkul', 'matkulganti.matkul_id', '=', 'matkul.id') // Asumsikan ada kolom user_id di tabel matkul
->select(
    'matkulganti.*', // Mengambil semua kolom dari tabel matkul
    'matkul.matakuliah', // Mengambil semua kolom dari tabel matkul
    'kelas.nomorkelas', // Mengambil kolom nomorkelas dari tabel kelas
    'users.username' // Mengambil kolom username dari tabel users
)
->paginate(10);

    // Mengambil semua data kelas dan users 
    $kelas = Kelas::all();
    $users = User::all();
    $matkul = Matkul::all();

    // Mengirim data matkul, kelas, dan users ke view
    return view('admin.matkulganti', compact('matkul', 'kelas', 'users','matkulganti'));
    }

   

    public function storeMatkulGanti(Request $request)
    {
        try{
            // Validasi data yang diterima dari form
            $validatedData = $request->validate([
                'matakuliah' => 'required', // validasi kelas harus ada di tabel kelas
                'nomorkelas' => 'required', // validasi kelas harus ada di tabel kelas
                'tanggalganti' => 'required',
                'hari' => 'required|string',
                'jammulai' => 'required|date_format:H:i',
                'jamakhir' => 'required|date_format:H:i', // jam selesai harus lebih dari jam mulai
                'status' => 'required',
                'user_class' => 'required',
                'username' => 'required',
            ]);
    
            // Cari kelas berdasarkan nomorkelas
            $matkul = \App\Models\Matkul::where('matakuliah', $validatedData['matakuliah'])->first();
            $kelas = \App\Models\Kelas::where('nomorkelas', $validatedData['nomorkelas'])->first();
            $user = \App\Models\User::where('username', $validatedData['username'])->first();
        

            // Simpan data matkul baru
            $matkulganti = new Matkulganti();
            $matkulganti->matkul_id = $matkul->id; // Menggunakan id kelas yang ditemukan
            $matkulganti->kelas_id = $kelas->id; // Menggunakan id kelas yang ditemukan
            $matkulganti->tanggalganti = Carbon::parse($validatedData['tanggalganti'])->format('Y-m-d');
            $matkulganti->hari = $validatedData['hari'];
            $matkulganti->jammulai = $validatedData['jammulai'];
            $matkulganti->jamakhir = $validatedData['jamakhir'];
            $matkulganti->status = $validatedData['status'];
            $matkulganti->user_class = $validatedData['user_class'];
            $matkulganti->user_id = $user->id; // Menggunakan id user yang ditemukan
            $matkulganti->save(); // Simpan data ke database
    
            // Redirect kembali ke halaman matkul dengan pesan sukses
            return redirect()->route('admin.matkulganti.index')->with('success', 'Mata Kuliah berhasil ditambahkan');
        }  catch (QueryException $e) {
                if ($e->getCode() == 45000) {
                    return redirect()->back()->withErrors(['error' => 'Jadwal matkul bertabrakan dengan jadwal yang ada.']);
                }
              
                return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
            }
    
    }

    

    public function updateMatkulGanti(Request $request, $id)
    {
        try{
            // Validasi data yang diterima dari form
            $validatedData = $request->validate([
                'matakuliah' => 'required', // validasi kelas harus ada di tabel kelas
                'nomorkelas' => 'required', // validasi kelas harus ada di tabel kelas
                'tanggalganti' => 'required',
                'hari' => 'required|string',
                'jammulai' => 'required',
                'jamakhir' => 'required', // jam selesai harus lebih dari jam mulai
                'status' => 'required',
                'user_class' => 'required',
                'username' => 'required',
            ]);
    
        
            // Cari kelas berdasarkan nomorkelas
            $kelas = DB::table('kelas')->where('nomorkelas', $validatedData['nomorkelas'])->first();
            $user = DB::table('users')->where('username', $validatedData['username'])->first();
            $matkul = \App\Models\Matkul::where('matakuliah', $validatedData['matakuliah'])->first();

            // Update data matkul dengan data yang telah divalidasi
            DB::table('matkulganti')
                ->where('id', $id)
                ->update([
                    'matkul_id' => $matkul->id, // Menggunakan id kelas yang ditemukan
                    'kelas_id' => $kelas->id, // Menggunakan id kelas yang ditemukan
                    'hari' => $validatedData['hari'],
                    'tanggalganti' => Carbon::parse($validatedData['tanggalganti'])->format('Y-m-d'),
                    'jammulai' => $validatedData['jammulai'],
                    'jamakhir' => $validatedData['jamakhir'],
                    'status' => $validatedData['status'],
                    'user_class' => $validatedData['user_class'],
                    'user_id' => $user->id, // Menggunakan id user yang ditemukan
                ]);
                
        
            return redirect()->route('admin.matkulganti.index')->with('success', 'matkulganti berhasil diupdate.');
        }  catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->route('admin.matkulganti.index')->withErrors(['error' => 'Jadwal matkulganti bertabrakan dengan jadwal yang ada.']);
            }
            
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

    public function destroyMatkulGanti($id)
    {
        $matkulganti = Matkulganti::findOrFail($id);
        $matkulganti->delete();

        return redirect()->route('admin.matkulganti.index')->with('success', 'Matkul Ganti berhasil dihapus.');
    }



    public function indexpesan()
    {
       // Mengambil data dari tabel matkul, kelas, dan users
$pesan = DB::table('pesan')
->join('kelas', 'pesan.kelas_id', '=', 'kelas.id')
->join('users', 'pesan.user_id', '=', 'users.id') // Asumsikan ada kolom user_id di tabel matkul
->select(
    'pesan.*', // Mengambil semua kolom dari tabel matkul
    'kelas.nomorkelas', // Mengambil kolom nomorkelas dari tabel kelas
    'users.username' // Mengambil kolom username dari tabel users
)
->paginate(10);

    // Mengambil semua data kelas dan users 
    $kelas = Kelas::all();
    $users = User::all();

    // Mengirim data matkul, kelas, dan users ke view
    return view('admin.pesan', compact('kelas', 'users','pesan'));
    }
    public function storepesan(Request $request)
    {
        try{
            // Validasi data yang diterima dari form
            $validatedData = $request->validate([
                'nomorkelas' => 'required', // validasi kelas harus ada di tabel kelas
                'username' => 'required',
                'tanggalpesan' => 'required',
                'hari' => 'required|string',
                'jammulai' => 'required|date_format:H:i',
                'jamakhir' => 'required|date_format:H:i', // jam selesai harus lebih dari jam mulai
                'kegiatan' => 'required',
                'status' => 'required',
                'user_class' => 'required',
            ]);
    
            // Cari kelas berdasarkan nomorkelas
            $kelas = \App\Models\Kelas::where('nomorkelas', $validatedData['nomorkelas'])->first();
            $user = \App\Models\User::where('username', $validatedData['username'])->first();
        

            // Simpan data matkul baru
            $pesan = new pesan();
            $pesan->kelas_id = $kelas->id; // Menggunakan id kelas yang ditemukan
            $pesan->user_id = $user->id; // Menggunakan id user yang ditemukan
            $pesan->tanggalpesan = Carbon::parse($validatedData['tanggalpesan'])->format('Y-m-d');
            $pesan->hari = $validatedData['hari'];
            $pesan->jammulai = $validatedData['jammulai'];
            $pesan->jamakhir = $validatedData['jamakhir'];
            $pesan->kegiatan = $validatedData['kegiatan'];
            $pesan->status = $validatedData['status'];
            $pesan->user_class = $validatedData['user_class'];
            $pesan->save(); // Simpan data ke database
    
            // Redirect kembali ke halaman matkul dengan pesan sukses
            return redirect()->route('admin.pesan.index')->with('success', 'berhasil memesan');
        }  catch (QueryException $e) {
                if ($e->getCode() == 45000) {
                    return redirect()->back()->withErrors(['error' => 'pesanan bertabrakan dengan pesan yang ada.']);
                }
              
                return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
            }

    
    }

    

    public function updatepesan(Request $request, $id)
    {
        try{
            // Validasi data yang diterima dari form
            $validatedData = $request->validate([
                'nomorkelas' => 'required', // validasi kelas harus ada di tabel kelas
                'username' => 'required',
                'tanggalpesan' => 'required',
                'hari' => 'required|string',
                'jammulai' => 'required',
                'jamakhir' => 'required', // jam selesai harus lebih dari jam mulai
                'kegiatan' => 'required', // jam selesai harus lebih dari jam mulai
                'status' => 'required',
                'user_class' => 'required',
            ]);
    
        
            // Cari kelas berdasarkan nomorkelas
            $kelas = DB::table('kelas')->where('nomorkelas', $validatedData['nomorkelas'])->first();
            $user = DB::table('users')->where('username', $validatedData['username'])->first();

            // Update data matkul dengan data yang telah divalidasi
            DB::table('pesan')
                ->where('id', $id)
                ->update([
                    'kelas_id' => $kelas->id, // Menggunakan id kelas yang ditemukan
                    'hari' => $validatedData['hari'],
                    'tanggalpesan' => Carbon::parse($validatedData['tanggalpesan'])->format('Y-m-d'),
                    'jammulai' => $validatedData['jammulai'],
                    'jamakhir' => $validatedData['jamakhir'],
                    'kegiatan' => $validatedData['kegiatan'],
                    'status' => $validatedData['status'],
                    'user_class' => $validatedData['user_class'],
                    'user_id' => $user->id, // Menggunakan id user yang ditemukan
                ]);
                
        
            return redirect()->route('admin.pesan.index')->with('success', 'pesan berhasil diupdate.');
        }  catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->route('admin.pesan.index')->withErrors(['error' => ' pesanan bertabrakan dengan jadwal yang ada.']);
            }
            
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

    public function destroypesan($id)
    {
        $pesan = pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->route('admin.pesan.index')->with('success', 'pesan  berhasil dihapus.');
    }
}
