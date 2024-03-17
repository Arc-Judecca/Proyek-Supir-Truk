<?php

namespace App\Http\Controllers\API;

use App\Forms\SupirForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supir;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Facades\DB;
use App\Rules\TwoWords;

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
        'nota_pdf' => 'required|mimes:pdf|max:2048', // Validasi untuk file PDF
    ]);

    // Proses penyimpanan data supir
    $data = $request->only(['id_supir', 'nama_supir']);
    $supir = Supir::create($data);

    // Proses unggahan file nota
    if ($request->hasFile('nota_pdf')) {
        $file = $request->file('nota_pdf');
        $fileName = 'nota_' . time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('nota', $fileName); // Simpan file ke dalam penyimpanan

        // Simpan lokasi file ke dalam database
        $supir->nota_path = $filePath;
        $supir->save();
    }

    return redirect()->route('supir.index')->with('success', 'Data supir berhasil ditambahkan.');
}

    
public function show($id)
{
    
    $supir = Supir::findOrFail($id);

    
    $notaUrl = $supir->nota_path ? Storage::url('nota/' . $supir->nota_path) : null;

    
    $supir->nota_url = $notaUrl;

    
    return response()->json($supir);
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_supir' => 'required',
            'nama_supir' => 'required',
            'nota_path' => 'required',
        ]);

        $supir = Supir::findOrFail($id);
        $supir->update($request->all());

        return response()->json($supir, 200);
    }

    public function destroy($id)
{
    $supir = Supir::findOrFail($id);
    $supir->delete();

    return redirect()->route('supir.index')->with('success', 'Data supir berhasil dihapus.');
}

public function showRegistrationForm()
{
    return view('supir.register');
}

public function register(Request $request)
{
    // Validasi data registrasi
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
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

}
