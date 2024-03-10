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
    ]);

    // Mendapatkan data dari request
    $data = $request->only(['id_supir', 'nama_supir']);

    // Generate URL API
    $data['url_api'] = 'http://example.com/api/' . $request->id_supir;

    // Simpan data ke dalam database
    $supir = Supir::create($data);

    return redirect()->route('supir.index')->with('success', 'Data supir berhasil ditambahkan.');
}


    public function show($id)
    {
        $supir = Supir::findOrFail($id);
        return response()->json($supir);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_supir' => 'required',
            'nama_supir' => 'required',
            'url_api' => 'required',
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

}
