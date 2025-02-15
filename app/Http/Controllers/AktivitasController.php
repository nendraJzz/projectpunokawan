<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktivitasController extends Controller
{
    public function kecelakaan(Request $request) {
        $request->validate([
            'text' => ['required']
        ]);

        Aktivitas::create([
            'user_id' => Auth::id(),
            'text' => $request->text
        ]);
        
        if(Auth::user()->level === "admin") 
            return redirect()->route('aktivitasadmin');
        return redirect()->route('aktivitasuser');
    }
}
