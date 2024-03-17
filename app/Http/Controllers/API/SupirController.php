<?php

namespace App\Http\Controllers\API;

use App\Forms\SupirForm;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supir;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Facades\Storage; // Tambahkan penggunaan Fasade Storage
use Illuminate\Support\Facades\Hash; // Tambahkan penggunaan Fasade Hash

class SupirController extends Controller
{
    public function index()
    {
        $supirs = Supir::all();
        $supirsJson = $supirs->toJson();

        return view('supir.index', compact('supirs'))
            ->withHeaders([
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
            ])
            ->with('supirsJson', $supirsJson);
    }
    
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(SupirForm::class, [
            'method' => 'POST',
            'url' => route('supir.store')
        ]);

        return view('supir.create', compact('form'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_supir' => 'required',
            'nama_supir' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email', // Validasi email unik
            'password' => 'required|string|min:8|confirmed',
            'nota_pdf' => 'required|mimes:pdf|max:2048', // Validasi untuk file PDF
        ]);

        // Proses penyimpanan data supir
        $data = $request->only(['id_supir', 'nama_supir']);

        // Proses unggahan file nota
        if ($request->hasFile('nota_pdf')) {
            $file = $request->file('nota_pdf');
            $fileName = 'nota_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('nota', $fileName); // Simpan file ke dalam penyimpanan

            // Simpan lokasi file ke dalam database
            $data['nota_path'] = $filePath;
        }

        // Buat user supir baru
        $user = User::create([
            'name' => $request->nama_supir, // Ganti 'nama' menjadi 'nama_supir'
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Atur role user sebagai supir
        $user->assignRole('supir');

        // Simpan data supir dan user
        $supir = Supir::create($data);

        return redirect()->route('supir.index')->with('success', 'Data supir berhasil ditambahkan.');
    }

    // Sisipkan fungsi-fungsi lainnya seperti show, update, destroy, dan showRegistrationForm

    public function showRegistrationForm()
    {
        return view('supir.register');
    }

    public function register(Request $request)
    {
        // Validasi data registrasi
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat user supir baru
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Atur role user sebagai supir
        $user->assignRole('supir');

        $user->save();

        // Redirect ke halaman index atau halaman lain yang sesuai
        return redirect()->route('supir.index')->with('success', 'Driver registered successfully.');
    }

    public function destroy($id)
{
    $supir = Supir::findOrFail($id);
    $supir->delete();

    // Redirect kembali ke halaman indeks dengan pesan sukses
    return redirect()->route('supir.index')->with('success', 'Data supir berhasil dihapus.');
}

}
