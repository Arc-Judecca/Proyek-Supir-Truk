<?php

namespace App\Http\Controllers\API;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supir;
use Illuminate\Support\Facades\Hash; // Tambahkan penggunaan Fasade Hash
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class SupirController extends Controller
{
        public function index()
    {
        $supirs = Supir::all();
        return view('supir.index', compact('supirs'));
    }
    
        public function create()
    {
        return view('supir.create');
    }

        public function store(Request $request)
    {
        Supir::create([
            'nama' => $request->nama,
            'username' => $request->Username,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('supir.index')->with('success', 'Driver has been added successfully');
    }
        public function edit($id)
    {
        $supir = Supir::where('id', $id)->first();
        return view('supir.edit', ['supir' => $supir]);
    }
    
            public function update(Request $request, $id)
        {
            $supir = Supir::findOrFail($id);
            $supir->update([
                'nama' => $request->nama,
                'username' => $request->Username,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('supir.index')->with('success', 'Driver data successfully updated.');
        }

        

    public function destroy($id)
{
    $supir = Supir::findOrFail($id);
    $supir->delete();

    // Redirect kembali ke halaman indeks dengan pesan sukses
    return redirect()->route('supir.index')->with('success', 'Data supir berhasil dihapus.');
}

}
