<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Supir;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage; 


class NotaController extends Controller
{
    public function showNota()
    {
      $nota = nota::all(); // lowercase 'nota'
      return view('nota.nota', compact('nota'));
    }

            public function uploadNota()
        {
            $nota = nota::all();
            return view('Nota.book', compact('nota'));
        }
}
